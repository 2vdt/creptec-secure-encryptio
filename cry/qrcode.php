<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code - Cryptec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --success-color: #10b981;
            --info-color: #3b82f6;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f1f5f9;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .card-header {
            border-radius: 12px 12px 0 0 !important;
            padding: 1.25rem 1.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
        
        .btn-secondary {
            background-color: #64748b;
            border-color: #64748b;
        }
        
        .btn-info {
            background-color: var(--info-color);
            border-color: var(--info-color);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        }
        
        .input-group-text {
            background-color: #f8fafc;
        }
        
        #preview {
            border-radius: 8px;
            overflow: hidden;
            background: #000;
        }
        
        #qrcode {
            margin: 0 auto;
            background: white;
            padding: 12px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-size: 1.5rem;
        }
        
        .hidden {
            display: none;
        }
        
        .hidden-scanner {
            display: none;
        }
        
        .hidden-section {
            display: none;
        }
        
        .accordion-button:not(.collapsed) {
            background-color: rgba(99, 102, 241, 0.1);
            color: var(--primary-color);
        }
        
        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
            border-color: var(--primary-color);
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .section-title:after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 3px;
        }
        
        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        @media (max-width: 768px) {
            .floating-btn {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-3">QR Code Generator & Scanner</h1>
            <p class="lead text-muted">Create custom QR codes or scan existing ones with our powerful tool</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header gradient-bg text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-qrcode me-2"></i>QR Code Generator</h5>
                    </div>
                    <div class="card-body">
                        <form id="qrForm">
                            <div class="mb-4">
                                <label for="inputText" class="form-label fw-bold">Text or URL to encode</label>
                                <textarea class="form-control" id="inputText" rows="3" placeholder="Enter text, URL, or other content to encode in QR code" required></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <label for="secretKey" class="form-label fw-bold">Encryption Key (Optional)</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="secretKey" placeholder="Leave empty for unencrypted QR code">
                                    <button class="btn btn-outline-secondary" type="button" id="generateKey">
                                        <i class="fas fa-key me-1"></i>Generate
                                    </button>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleKey" title="Toggle visibility">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="form-text text-muted">If you provide a key, the content will be encrypted before generating the QR code.</div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="qrSize" class="form-label fw-bold">QR Code Size</label>
                                    <select class="form-select" id="qrSize">
                                        <option value="128">Small (128×128)</option>
                                        <option value="200" selected>Medium (200×200)</option>
                                        <option value="300">Large (300×300)</option>
                                        <option value="400">Extra Large (400×400)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="errorCorrection" class="form-label fw-bold">Error Correction</label>
                                    <select class="form-select" id="errorCorrection">
                                        <option value="L">Low (7%)</option>
                                        <option value="M" selected>Medium (15%)</option>
                                        <option value="Q">Quartile (25%)</option>
                                        <option value="H">High (30%)</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="fas fa-bolt me-2"></i>Generate QR Code
                                </button>
                                <button type="button" class="btn btn-outline-secondary px-4 py-2" id="clearQR">
                                    <i class="fas fa-eraser me-2"></i>Clear
                                </button>
                                <button type="button" class="btn btn-info text-white px-4 py-2" id="scanQR">
                                    <i class="fas fa-camera me-2"></i>Scan QR Code
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4 hidden" id="qrResult">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-check-circle me-2"></i>Generated QR Code</h5>
                    </div>
                    <div class="card-body text-center">
                        <canvas id="qrcode" class="mb-4"></canvas>
                        <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                            <button type="button" class="btn btn-outline-primary px-4 py-2" id="downloadQR">
                                <i class="fas fa-download me-2"></i>Download
                            </button>
                            <button type="button" class="btn btn-outline-secondary px-4 py-2" id="printQR">
                                <i class="fas fa-print me-2"></i>Print
                            </button>
                            <button type="button" class="btn btn-outline-success px-4 py-2" id="shareQR">
                                <i class="fas fa-share-alt me-2"></i>Share
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card hidden" id="scanResult">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-camera-retro me-2"></i>Scan Result</h5>
                    </div>
                    <div class="card-body">
                        <div id="scanner" class="mb-4 hidden-scanner">
                            <video id="preview" class="w-100 rounded"></video>
                        </div>
                        <div class="mb-4">
                            <label for="scanOutput" class="form-label fw-bold">Scanned Content</label>
                            <textarea class="form-control" id="scanOutput" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-4 hidden-section" id="decryptSection">
                            <label for="decryptKey" class="form-label fw-bold">Decryption Key</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="decryptKey" placeholder="Enter key to decrypt content">
                                <button class="btn btn-outline-secondary" type="button" id="toggleDecryptKey" title="Toggle visibility">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-primary" type="button" id="decryptButton">
                                    <i class="fas fa-lock-open me-1"></i>Decrypt
                                </button>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-secondary px-4 py-2" id="closeScan">
                                <i class="fas fa-times me-2"></i>Close Scanner
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-lightbulb me-2"></i>QR Code Tips</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-link"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">URL Storage</h6>
                                <p class="text-muted small">QR codes can store URLs, text, contact information, and more.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Error Correction</h6>
                                <p class="text-muted small">Higher error correction levels make QR codes more reliable but larger.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Encryption</h6>
                                <p class="text-muted small">Encrypted QR codes require the same key for decryption.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Scanning Tips</h6>
                                <p class="text-muted small">For best results, ensure good lighting and a steady camera.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="feature-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Compatibility</h6>
                                <p class="text-muted small">Test your QR code with multiple devices to ensure compatibility.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0"><i class="fas fa-rocket me-2"></i>Popular Uses</h5>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="qrUsesAccordion">
                            <div class="accordion-item border-0 mb-2">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="fas fa-id-card me-2 text-primary"></i> Business Cards
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#qrUsesAccordion">
                                    <div class="accordion-body">
                                        Add a QR code to your business card that links to your website, portfolio, or contact information.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-lock me-2 text-primary"></i> Secure Sharing
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#qrUsesAccordion">
                                    <div class="accordion-body">
                                        Share sensitive information securely by encrypting it in a QR code that only the recipient can decrypt.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-wifi me-2 text-primary"></i> Wi-Fi Access
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#qrUsesAccordion">
                                    <div class="accordion-body">
                                        Create a QR code that automatically connects devices to your Wi-Fi network without typing the password.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="shareForm" class="modal-content">
          <div class="modal-header gradient-bg text-white">
            <h5 class="modal-title" id="shareModalLabel"><i class="fas fa-share-alt me-2"></i>Share QR Code</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="recipientEmail" class="form-label fw-bold">Recipient Email</label>
              <input type="email" class="form-control" id="recipientEmail" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">What to Share?</label>
              <select class="form-select" id="shareOption">
                <option value="key">Encryption Key</option>
                <option value="qr">QR Code Image</option>
                <option value="both">Both QR Code and Key</option>
              </select>
            </div>
            <div id="shareStatus" class="text-success small"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane me-2"></i>Send
            </button>
          </div>
        </form>
      </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">&copy; 2025 Cryptec. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="privacy.html" class="text-white me-3 text-decoration-none">Privacy Policy</a>
                    <a href="terms.html" class="text-white text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating action button -->
    <button class="floating-btn gradient-bg text-white border-0" id="floatingActionBtn" title="Quick Actions">
        <i class="fas fa-bolt"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instascan@2.0.1/dist/instascan.min.js"></script>
    <script src="js/qrcode.js"></script>
    
    <script>
        // Floating action button functionality
        document.getElementById('floatingActionBtn').addEventListener('click', function() {
            // Scroll to generator form
            document.getElementById('qrForm').scrollIntoView({ behavior: 'smooth' });
        });
    </script>
</body>
</html>