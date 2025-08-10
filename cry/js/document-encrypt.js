document.addEventListener("DOMContentLoaded", () => {
  // PDF Elements
  const pdfForm = document.getElementById("pdfForm")
  const pdfAction = document.getElementById("pdfAction")
  const pdfFile = document.getElementById("pdfFile")
  const pdfPassword = document.getElementById("pdfPassword")
  const generatePdfPassword = document.getElementById("generatePdfPassword")
  const togglePdfPassword = document.getElementById("togglePdfPassword")
  const pdfProgress = document.getElementById("pdfProgress")
  const pdfProgressBar = pdfProgress.querySelector(".progress-bar")
  const pdfResult = document.getElementById("pdfResult")
  const pdfResultTitle = document.getElementById("pdfResultTitle")
  const pdfResultMessage = document.getElementById("pdfResultMessage")
  const downloadPdf = document.getElementById("downloadPdf")

  // Image Elements
  const imageForm = document.getElementById("imageForm")
  const imageAction = document.getElementById("imageAction")
  const imageFile = document.getElementById("imageFile")
  const imagePassword = document.getElementById("imagePassword")
  const generateImagePassword = document.getElementById("generateImagePassword")
  const toggleImagePassword = document.getElementById("toggleImagePassword")
  const imageWatermark = document.getElementById("imageWatermark")
  const imageProgress = document.getElementById("imageProgress")
  const imageProgressBar = imageProgress.querySelector(".progress-bar")
  const imageResult = document.getElementById("imageResult")
  const imageResultTitle = document.getElementById("imageResultTitle")
  const imageResultMessage = document.getElementById("imageResultMessage")
  const imagePreview = document.getElementById("imagePreview")
  const downloadImage = document.getElementById("downloadImage")

  // Office Elements
  const officeForm = document.getElementById("officeForm")
  const officeAction = document.getElementById("officeAction")
  const officeFile = document.getElementById("officeFile")
  const officePassword = document.getElementById("officePassword")
  const generateOfficePassword = document.getElementById("generateOfficePassword")
  const toggleOfficePassword = document.getElementById("toggleOfficePassword")
  const officeProgress = document.getElementById("officeProgress")
  const officeProgressBar = officeProgress.querySelector(".progress-bar")
  const officeResult = document.getElementById("officeResult")
  const officeResultTitle = document.getElementById("officeResultTitle")
  const officeResultMessage = document.getElementById("officeResultMessage")
  const downloadOffice = document.getElementById("downloadOffice")

  // PDF Functions
  if (pdfForm) {
    // Toggle password visibility
    togglePdfPassword.addEventListener("click", () => {
      togglePasswordVisibility(pdfPassword, togglePdfPassword)
    })

    // Generate random password
    generatePdfPassword.addEventListener("click", () => {
      pdfPassword.value = generateRandomPassword()
      pdfPassword.type = "text"
      togglePdfPassword.innerHTML = getEyeSlashIcon()
    })

    // Process PDF
    pdfForm.addEventListener("submit", async (e) => {
      e.preventDefault()

      const file = pdfFile.files[0]
      if (!file) {
        alert("Please select a PDF file")
        return
      }

      const password = pdfPassword.value
      if (!password) {
        alert("Please enter a password")
        return
      }

      const action = pdfAction.value

      try {
        // Show progress
        pdfProgress.style.display = "block"
        updateProgressBar(pdfProgressBar, 10)

        // Read file
        const fileData = await readFileAsArrayBuffer(file)
        updateProgressBar(pdfProgressBar, 30)

        let processedPdf
        let fileName

        if (action === "encrypt") {
          // Encrypt PDF
          processedPdf = await encryptPdf(fileData, password)
          fileName = file.name.replace(".pdf", "") + "_encrypted.pdf"
          downloadPdf.addEventListener("click", () => {
  pdfResult.style.display = "none"
})
          pdfResultMessage.textContent =
            "Your PDF has been encrypted with password protection. Click the button below to download it."
        } else {
          // Decrypt PDF
          processedPdf = await decryptPdf(fileData, password)
          fileName = file.name.replace("_encrypted.pdf", "") + "_decrypted.pdf"
          pdfResultTitle.textContent = "PDF Decrypted Successfully!"
          pdfResultMessage.textContent = "Your PDF has been decrypted. Click the button below to download it."
        }

        updateProgressBar(pdfProgressBar, 80)

        // Create download link
        const blob = new Blob([processedPdf], { type: "application/pdf" })
        downloadPdf.href = URL.createObjectURL(blob)
        downloadPdf.download = fileName

        updateProgressBar(pdfProgressBar, 100)

        // Show result
        setTimeout(() => {
          pdfProgress.style.display = "none"
          pdfResult.style.display = "block"
        }, 500)
      } catch (error) {
        pdfProgress.style.display = "none"
        alert("Error processing PDF: " + error.message)
        console.error(error)
      }
    })
  }

  // Image Functions
  if (imageForm) {
    // Toggle password visibility
    toggleImagePassword.addEventListener("click", () => {
      togglePasswordVisibility(imagePassword, toggleImagePassword)
    })

    // Generate random password
    generateImagePassword.addEventListener("click", () => {
      imagePassword.value = generateRandomPassword()
      imagePassword.type = "text"
      toggleImagePassword.innerHTML = getEyeSlashIcon()
    })

    // Process Image
    imageForm.addEventListener("submit", async (e) => {
      e.preventDefault()

      const file = imageFile.files[0]
      if (!file) {
        alert("Please select an image file")
        return
      }

      const password = imagePassword.value
      if (!password) {
        alert("Please enter a password")
        return
      }

      const action = imageAction.value
      const addWatermark = imageWatermark.checked

      try {
        // Show progress
        imageProgress.style.display = "block"
        updateProgressBar(imageProgressBar, 10)

        // Read file
        const fileData = await readFileAsArrayBuffer(file)
        updateProgressBar(imageProgressBar, 30)

        let processedImage
        let fileName
        let imageType = file.type

        if (action === "encrypt") {
          // Encrypt Image
          processedImage = await encryptImage(fileData, password, addWatermark)
          fileName = file.name.split(".")[0] + "_encrypted.png"
          imageType = "image/png"
          imageResultTitle.textContent = "Image Encrypted Successfully!"
          imageResultMessage.textContent = "Your image has been encrypted. Click the button below to download it."
        } else {
          // Decrypt Image
          processedImage = await decryptImage(fileData, password)
          fileName = file.name.replace("_encrypted.png", "") + "_decrypted.png"
          imageType = "image/png"
          imageResultTitle.textContent = "Image Decrypted Successfully!"
          imageResultMessage.textContent = "Your image has been decrypted. Click the button below to download it."
        }

        updateProgressBar(imageProgressBar, 80)

        // Create download link and preview
        const blob = new Blob([processedImage], { type: imageType })
        downloadImage.href = URL.createObjectURL(blob)
        downloadImage.download = fileName

        // Set preview image
        imagePreview.src = URL.createObjectURL(blob)

        updateProgressBar(imageProgressBar, 100)

        // Show result
        setTimeout(() => {
          imageProgress.style.display = "none"
          imageResult.style.display = "block"
        }, 500)
      } catch (error) {
        imageProgress.style.display = "none"
        alert("Error processing image: " + error.message)
        console.error(error)
      }
    })
   
  }

  // Office Functions
  if (officeForm) {
    // Toggle password visibility
    toggleOfficePassword.addEventListener("click", () => {
      togglePasswordVisibility(officePassword, toggleOfficePassword)
    })

    // Generate random password
    generateOfficePassword.addEventListener("click", () => {
      officePassword.value = generateRandomPassword()
      officePassword.type = "text"
      toggleOfficePassword.innerHTML = getEyeSlashIcon()
    })

    // Process Office Document
    officeForm.addEventListener("submit", async (e) => {
      e.preventDefault()

      const file = officeFile.files[0]
      if (!file) {
        alert("Please select an Office document")
        return
      }

      const password = officePassword.value
      if (!password) {
        alert("Please enter a password")
        return
      }

      const action = officeAction.value

      try {
        // Show progress
        officeProgress.style.display = "block"
        updateProgressBar(officeProgressBar, 10)

        // Read file
        const fileData = await readFileAsArrayBuffer(file)
        updateProgressBar(officeProgressBar, 30)

        let processedDocument
        let fileName

        if (action === "encrypt") {
          // Encrypt Document
          processedDocument = await encryptOfficeDocument(fileData, password, file.type)
          fileName = file.name.split(".")[0] + "_encrypted" + getFileExtension(file.name)
          officeResultTitle.textContent = "Document Encrypted Successfully!"
          officeResultMessage.textContent = "Your document has been encrypted. Click the button below to download it."
        } else {
          // Decrypt Document
          processedDocument = await decryptOfficeDocument(fileData, password, file.type)
          fileName = file.name.replace("_encrypted", "") + "_decrypted" + getFileExtension(file.name)
          officeResultTitle.textContent = "Document Decrypted Successfully!"
          officeResultMessage.textContent = "Your document has been decrypted. Click the button below to download it."
        }

        updateProgressBar(officeProgressBar, 80)

        // Create download link
        const blob = new Blob([processedDocument], { type: file.type })
        downloadOffice.href = URL.createObjectURL(blob)
        downloadOffice.download = fileName

        updateProgressBar(officeProgressBar, 100)

        // Show result
        setTimeout(() => {
          officeProgress.style.display = "none"
          officeResult.style.display = "block"
        }, 500)
      } catch (error) {
        officeProgress.style.display = "none"
        alert("Error processing document: " + error.message)
        console.error(error)
      }
    })
  }

  // Helper Functions

  // Toggle password visibility
  function togglePasswordVisibility(inputElement, buttonElement) {
    if (inputElement.type === "password") {
      inputElement.type = "text"
      buttonElement.innerHTML = getEyeSlashIcon()
    } else {
      inputElement.type = "password"
      buttonElement.innerHTML = getEyeIcon()
    }
  }

  // Generate random password
  function generateRandomPassword() {
    const length = 16
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=<>?"
    let result = ""
    for (let i = 0; i < length; i++) {
      result += charset.charAt(Math.floor(Math.random() * charset.length))
    }
    return result
  }

  // Read file as ArrayBuffer
  function readFileAsArrayBuffer(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader()
      reader.onload = (event) => resolve(event.target.result)
      reader.onerror = (error) => reject(error)
      reader.readAsArrayBuffer(file)
    })
  }

  // Update progress bar
  function updateProgressBar(progressBar, value) {
    progressBar.style.width = value + "%"
    progressBar.setAttribute("aria-valuenow", value)
  }

  // Get file extension
  function getFileExtension(filename) {
    return filename.substring(filename.lastIndexOf("."))
  }

  // Get eye icon HTML
  function getEyeIcon() {
    return `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>
        `
  }

  // Get eye-slash icon HTML
  function getEyeSlashIcon() {
    return `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
            </svg>
        `
  }

  // PDF Encryption/Decryption Functions
  async function encryptPdf(pdfData, password) {
    try {
      const { PDFDocument } = PDFLib

      // Load the PDF
      const pdfDoc = await PDFDocument.load(pdfData)

      // Encrypt the PDF with the password
      const encryptedPdf = await pdfDoc.save({
        userPassword: password,
        ownerPassword: password,
        permissions: {
          printing: "highResolution",
          modifying: false,
          copying: false,
          annotating: false,
          fillingForms: true,
          contentAccessibility: true,
          documentAssembly: false,
        },
      })

      return encryptedPdf
    } catch (error) {
      throw new Error("PDF encryption failed: " + error.message)
    }
  }

  async function decryptPdf(pdfData, password) {
    try {
      const { PDFDocument } = PDFLib

      // Load the PDF with the password
      const pdfDoc = await PDFDocument.load(pdfData, {
        password: password,
      })

      // Save the PDF without encryption
      const decryptedPdf = await pdfDoc.save()

      return decryptedPdf
    } catch (error) {
      throw new Error("PDF decryption failed. Check your password and try again.")
    }
  }

  // Image Encryption/Decryption Functions
  async function encryptImage(imageData, password, addWatermark) {
    return new Promise((resolve, reject) => {
      try {
        // Create a blob from the array buffer
        const blob = new Blob([imageData], { type: "image/png" })
        const url = URL.createObjectURL(blob)

        // Create an image element
        const img = new Image()
        img.onload = () => {
          // Create a canvas
          const canvas = document.createElement("canvas")
          const ctx = canvas.getContext("2d")
          canvas.width = img.width
          canvas.height = img.height

          // Draw the image on the canvas
          ctx.drawImage(img, 0, 0)

          // Get image data
          const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height)
          const data = imageData.data

          // Generate encryption key from password
          const key = CryptoJS.SHA256(password).toString()

          // Encrypt pixel data
          for (let i = 0; i < data.length; i += 4) {
            // Use the key to modify RGB values (simple XOR encryption)
            const keyIndex = (i / 4) % key.length
            const keyChar = key.charCodeAt(keyIndex)

            // Encrypt RGB values (leave alpha channel unchanged)
            data[i] = data[i] ^ keyChar
            data[i + 1] = data[i + 1] ^ keyChar
            data[i + 2] = data[i + 2] ^ keyChar
          }

          // Put the modified image data back on the canvas
          ctx.putImageData(imageData, 0, 0)

          // Add watermark if requested
          if (addWatermark) {
            ctx.font = "bold 24px Arial"
            ctx.fillStyle = "rgba(255, 255, 255, 0.5)"
            ctx.textAlign = "center"
            ctx.fillText("ENCRYPTED", canvas.width / 2, canvas.height / 2)
          }

          // Convert canvas to blob
          canvas.toBlob((blob) => {
            // Convert blob to array buffer
            const reader = new FileReader()
            reader.onload = () => {
              resolve(reader.result)
            }
            reader.onerror = (error) => {
              reject(error)
            }
            reader.readAsArrayBuffer(blob)
          }, "image/png")
        }

        img.onerror = (error) => {
          reject(error)
        }

        img.src = url
      } catch (error) {
        reject(error)
      }
    })
  }

  async function decryptImage(imageData, password) {
    return new Promise((resolve, reject) => {
      try {
        // Create a blob from the array buffer
        const blob = new Blob([imageData], { type: "image/png" })
        const url = URL.createObjectURL(blob)

        // Create an image element
        const img = new Image()
        img.onload = () => {
          // Create a canvas
          const canvas = document.createElement("canvas")
          const ctx = canvas.getContext("2d")
          canvas.width = img.width
          canvas.height = img.height

          // Draw the image on the canvas
          ctx.drawImage(img, 0, 0)

          // Get image data
          const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height)
          const data = imageData.data

          // Generate decryption key from password
          const key = CryptoJS.SHA256(password).toString()

          // Decrypt pixel data
          for (let i = 0; i < data.length; i += 4) {
            // Use the key to modify RGB values (simple XOR decryption)
            const keyIndex = (i / 4) % key.length
            const keyChar = key.charCodeAt(keyIndex)

            // Decrypt RGB values (leave alpha channel unchanged)
            data[i] = data[i] ^ keyChar
            data[i + 1] = data[i + 1] ^ keyChar
            data[i + 2] = data[i + 2] ^ keyChar
          }

          // Put the modified image data back on the canvas
          ctx.putImageData(imageData, 0, 0)

          // Convert canvas to blob
          canvas.toBlob((blob) => {
            // Convert blob to array buffer
            const reader = new FileReader()
            reader.onload = () => {
              resolve(reader.result)
            }
            reader.onerror = (error) => {
              reject(error)
            }
            reader.readAsArrayBuffer(blob)
          }, "image/png")
        }

        img.onerror = (error) => {
          reject(error)
        }

        img.src = url
      } catch (error) {
        reject(error)
      }
    })
  }

  // Office Document Encryption/Decryption Functions
  async function encryptOfficeDocument(documentData, password, mimeType) {
    try {
      // Convert document data to base64
      const base64Data = arrayBufferToBase64(documentData)

      // Create metadata object
      const metadata = {
        type: mimeType,
        name: "document",
        timestamp: new Date().toISOString(),
      }

      // Combine metadata and document data
      const dataToEncrypt = JSON.stringify({
        metadata: metadata,
        content: base64Data,
      })

      // Encrypt data
      const encryptedData = CryptoJS.AES.encrypt(dataToEncrypt, password).toString()

      // Convert encrypted string to ArrayBuffer
      const textEncoder = new TextEncoder()
      const encryptedBuffer = textEncoder.encode(encryptedData).buffer

      return encryptedBuffer
    } catch (error) {
      throw new Error("Document encryption failed: " + error.message)
    }
  }

  async function decryptOfficeDocument(documentData, password, mimeType) {
    try {
      // Convert ArrayBuffer to string
      const textDecoder = new TextDecoder()
      const encryptedString = textDecoder.decode(documentData)

      // Decrypt data
      const decryptedString = CryptoJS.AES.decrypt(encryptedString, password).toString(CryptoJS.enc.Utf8)

      if (!decryptedString) {
        throw new Error("Decryption failed. Check your password.")
      }

      // Parse the decrypted data
      const parsedData = JSON.parse(decryptedString)
      const content = parsedData.content

      // Convert Base64 back to ArrayBuffer
      const binaryData = base64ToArrayBuffer(content)

      return binaryData
    } catch (error) {
      throw new Error("Document decryption failed: " + error.message)
    }
  }

  // Helper function to convert ArrayBuffer to Base64
  function arrayBufferToBase64(buffer) {
    let binary = ""
    const bytes = new Uint8Array(buffer)
    const len = bytes.byteLength
    for (let i = 0; i < len; i++) {
      binary += String.fromCharCode(bytes[i])
    }
    return window.btoa(binary)
  }

  // Helper function to convert Base64 to ArrayBuffer
  function base64ToArrayBuffer(base64) {
    const binaryString = window.atob(base64)
    const len = binaryString.length
    const bytes = new Uint8Array(len)
    for (let i = 0; i < len; i++) {
      bytes[i] = binaryString.charCodeAt(i)
    }
    return bytes.buffer
  }
})
