document.addEventListener("DOMContentLoaded", () => {
  // Elements
  const qrForm = document.getElementById("qrForm")
  const inputText = document.getElementById("inputText")
  const secretKey = document.getElementById("secretKey")
  const qrSize = document.getElementById("qrSize")
  const errorCorrection = document.getElementById("errorCorrection")
  const generateKeyBtn = document.getElementById("generateKey")
  const toggleKeyBtn = document.getElementById("toggleKey")
  const clearQRBtn = document.getElementById("clearQR")
  const scanQRBtn = document.getElementById("scanQR")
  const qrResult = document.getElementById("qrResult")
  const qrcodeDiv = document.getElementById("qrcode")
  const downloadQRBtn = document.getElementById("downloadQR")
  const printQRBtn = document.getElementById("printQR")
  const scanResult = document.getElementById("scanResult")
  const scannerDiv = document.getElementById("scanner")
  const previewVideo = document.getElementById("preview")
  const scanOutput = document.getElementById("scanOutput")
  const decryptSection = document.getElementById("decryptSection")
  const decryptKey = document.getElementById("decryptKey")
  const toggleDecryptKeyBtn = document.getElementById("toggleDecryptKey")
  const decryptButton = document.getElementById("decryptButton")
  const closeScanBtn = document.getElementById("closeScan")

  let scanner = null
  let currentQRCode = null

  // Toggle password visibility for encryption key
  toggleKeyBtn.addEventListener("click", () => {
    togglePasswordVisibility(secretKey, toggleKeyBtn)
  })

  // Toggle password visibility for decryption key
  toggleDecryptKeyBtn.addEventListener("click", () => {
    togglePasswordVisibility(decryptKey, toggleDecryptKeyBtn)
  })

  // Generate random key
  generateKeyBtn.addEventListener("click", () => {
    const length = 16
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=<>?"
    let result = ""
    for (let i = 0; i < length; i++) {
      result += charset.charAt(Math.floor(Math.random() * charset.length))
    }
    secretKey.value = result
    secretKey.type = "text"
    toggleKeyBtn.innerHTML = getEyeSlashIcon()
  })

  // Clear QR code
  clearQRBtn.addEventListener("click", () => {
    inputText.value = ""
    secretKey.value = ""
    qrResult.style.display = "none"
    qrcodeDiv.innerHTML = ""
    currentQRCode = null
  })

  // Download QR code
  downloadQRBtn.addEventListener("click", () => {
    if (!currentQRCode) return

    const canvas = qrcodeDiv.querySelector("canvas")
    if (canvas) {
      const link = document.createElement("a")
      link.download = "cryptec-qrcode.png"
      link.href = canvas.toDataURL("image/png")
      link.click()
    }
  })

  // Print QR code
  printQRBtn.addEventListener("click", () => {
    if (!currentQRCode) return

    const canvas = qrcodeDiv.querySelector("canvas")
    if (canvas) {
      const dataUrl = canvas.toDataURL("image/png")
      const windowContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print QR Code</title>
                    <style>
                        body { 
                            text-align: center;
                            font-family: Arial, sans-serif;
                        }
                        img { 
                            max-width: 100%; 
                            height: auto; 
                        }
                        .container {
                            margin: 20px auto;
                            max-width: 500px;
                        }
                        h2 {
                            margin-bottom: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>Cryptec QR Code</h2>
                        <img src="${dataUrl}" alt="QR Code">
                        <p>Scan this QR code with a compatible scanner</p>
                    </div>
                </body>
                </html>
            `

      const printWindow = window.open("", "_blank")
      printWindow.document.open()
      printWindow.document.write(windowContent)
      printWindow.document.close()

      printWindow.onload = () => {
        printWindow.print()
        printWindow.close()
        document.getElementById("qrResult").classList.remove("hidden");
      }
    }
  })

  // Scan QR code
  scanQRBtn.addEventListener("click", () => {
    scanResult.style.display = "block"
    scannerDiv.style.display = "block"
    scanOutput.value = ""
    decryptSection.style.display = "none"

    // Scroll to scan result
    scanResult.scrollIntoView({ behavior: "smooth" })

    // Initialize scanner
    if (!scanner) {
      scanner = new Instascan.Scanner({ video: previewVideo, mirror: false })

      scanner.addListener("scan", (content) => {
        scannerDiv.style.display = "none"
        scanner.stop()

        // Check if content is encrypted
        try {
          // Try to parse as JSON to check if it's encrypted
          const parsed = JSON.parse(content)
          if (parsed && parsed.encrypted) {
            scanOutput.value = "Encrypted content detected. Please enter the decryption key."
            decryptSection.style.display = "block"
            decryptKey.value = ""

            // Store encrypted content for later decryption
            scanOutput.dataset.encryptedContent = parsed.data
            scanOutput.dataset.algorithm = parsed.algorithm || "aes"
          } else {
            scanOutput.value = content
          }
        } catch (e) {
          // Not JSON, so it's plain text
          scanOutput.value = content
        }
      })

      Instascan.Camera.getCameras()
        .then((cameras) => {
          if (cameras.length > 0) {
            scanner.start(cameras[0])
          } else {
            alert("No cameras found on your device.")
            scannerDiv.style.display = "none"
          }
        })
        .catch((e) => {
          console.error(e)
          alert("Error accessing camera: " + e.message)
          scannerDiv.style.display = "none"
        })
    } else {
      scanner.start()
    }
  })

  // Close scanner
  closeScanBtn.addEventListener("click", () => {
    if (scanner) {
      scanner.stop()
    }
    scanResult.style.display = "none"
    scannerDiv.style.display = "none"
  })

  // Decrypt button
  decryptButton.addEventListener("click", () => {
    const encryptedContent = scanOutput.dataset.encryptedContent
    const algorithm = scanOutput.dataset.algorithm || "aes"
    const key = decryptKey.value

    if (!encryptedContent || !key) {
      alert("Missing encrypted content or decryption key.")
      return
    }

    try {
      let decryptedText

      // Perform decryption based on algorithm
      switch (algorithm) {
        case "aes":
          decryptedText = CryptoJS.AES.decrypt(encryptedContent, key).toString(CryptoJS.enc.Utf8)
          break
        case "des":
          decryptedText = CryptoJS.TripleDES.decrypt(encryptedContent, key).toString(CryptoJS.enc.Utf8)
          break
        case "rc4":
          decryptedText = CryptoJS.RC4.decrypt(encryptedContent, key).toString(CryptoJS.enc.Utf8)
          break
        case "rabbit":
          decryptedText = CryptoJS.Rabbit.decrypt(encryptedContent, key).toString(CryptoJS.enc.Utf8)
          break
        default:
          decryptedText = CryptoJS.AES.decrypt(encryptedContent, key).toString(CryptoJS.enc.Utf8)
      }

      if (!decryptedText) {
        throw new Error("Decryption failed. Check your key.")
      }

      scanOutput.value = decryptedText
      decryptSection.style.display = "none"
    } catch (error) {
      alert("Decryption failed: " + error.message)
    }
  })

  // Form submission for QR code generation
  qrForm.addEventListener("submit", (e) => {
    e.preventDefault()

    const text = document.getElementById("inputText").value.trim();
    const encryptionKey = document.getElementById("secretKey").value.trim();
    const size = Number.parseInt(document.getElementById("qrSize").value.trim());
    const ecLevel = document.getElementById("errorCorrection").value.trim();

    if (!text) {
      alert("Please enter text to generate a QR code.")
      return
    }

    // Clear previous QR code
    qrcodeDiv.innerHTML = ""

    let qrContent = text
    const key = document.getElementById("secretKey").value.trim();
    // Encrypt content if key is provided
    if (key) {
  try {
    const encrypted = CryptoJS.AES.encrypt(text, key).toString()
    qrContent = JSON.stringify({
      encrypted: true,
      algorithm: "aes",
      data: encrypted,
    })
  } catch (error) {
    alert("Error encrypting content: " + error.message);
    return;
  }
    }

    // Generate QR code
    QRCode.toCanvas(
      document.getElementById("qrcode"),
      qrContent,
      {
        width: size,
        height: size,
        errorCorrectionLevel: ecLevel,
        margin: 1,
        color: {
          dark: "#000000",
          light: "#ffffff",
        },
      },
      (error) => {
        if (error) {
          alert("Error generating QR code: " + error)
        } else {
          qrResult.style.display = "block"
          currentQRCode = qrContent

          // Scroll to QR code
          qrResult.scrollIntoView({ behavior: "smooth" })
        }
      },
    )
  })

  // Helper function to toggle password visibility
  function togglePasswordVisibility(inputElement, buttonElement) {
    if (inputElement.type === "password") {
      inputElement.type = "text"
      buttonElement.innerHTML = getEyeSlashIcon()
    } else {
      inputElement.type = "password"
      buttonElement.innerHTML = getEyeIcon()
    }
  }

  // Helper function to get eye icon HTML
  function getEyeIcon() {
    return `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
        `
  }

  document.getElementById("qrForm").addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent form submission
  generateQRCode(); // Call the QR code generation function
});

  // Helper function to get eye-slash icon HTML
  function getEyeSlashIcon() {
    return `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
            </svg>
        `
  }

  // Declare Instascan, CryptoJS, and QRCode
  const Instascan = window.Instascan
  const CryptoJS = window.CryptoJS
  const QRCode = window.QRCode
})
// ...existing code...

document.getElementById('shareQR').addEventListener('click', function() {
    var shareModal = new bootstrap.Modal(document.getElementById('shareModal'));
    document.getElementById('shareStatus').textContent = '';
    shareModal.show();
});
 //....................share code....................//
// ...existing code...

document.getElementById('shareForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var email = document.getElementById('recipientEmail').value;
    var option = document.getElementById('shareOption').value;
    var shareStatus = document.getElementById('shareStatus');
    shareStatus.textContent = 'Sending...';

    if (option === 'key') {
        var keyInput = document.getElementById('secretKey');
        var key = keyInput.value;
        if (!key) {
            shareStatus.textContent = 'No encryption key to share.';
            return;
        }
        // Send email with expiry notice
        emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', {
            to_email: email,
            message: 'Encryption Key: ' + key + '\n\nNote: This key will expire in 30 seconds.'
        }).then(function() {
            shareStatus.textContent = 'Encryption key sent! The key will be removed from this page in 30 seconds.';
            // Start timer to remove key from page
            var seconds = 30;
            var timer = setInterval(function() {
                if (seconds > 0) {
                    shareStatus.textContent = `Encryption key sent! The key will be removed from this page in ${seconds} seconds.`;
                    seconds--;
                } else {
                    clearInterval(timer);
                    keyInput.value = '';
                    shareStatus.textContent = 'Encryption key removed from this page for your security.';
                    alert('Encryption key has been removed from this page.');
                }
            }, 1000);
        }, function(error) {
            shareStatus.textContent = 'Failed to send: ' + error.text;
        });
    } else if (option === 'qr') {
        var canvas = document.getElementById('qrcode');
        if (!canvas || !canvas.toDataURL) {
            shareStatus.textContent = 'No QR code to share.';
            return;
        }
        var qrDataUrl = canvas.toDataURL();
        emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', {
            to_email: email,
            message: 'See attached QR code.'
            // You may need to adjust your template to handle qr_image if you want to send it as an attachment
        }).then(function() {
            shareStatus.textContent = 'QR code sent!';
        }, function(error) {
            shareStatus.textContent = 'Failed to send: ' + error.text;
        });
    }
});

// ...existing code...