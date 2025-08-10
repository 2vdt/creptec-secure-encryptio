<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Document Encryption - Cryptec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --light-gray: #f8fafc;
            --dark-gray: #64748b;
            --text-color: #334155;
            --success-color: #10b981;
            --info-color: #3b82f6;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #ffffff;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        /* Hero Section */
        .doc-hero {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            padding: 5rem 0 3rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .doc-hero h1 {
            font-weight: 700;
            font-size: 2.8rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }
        
        .doc-hero p {
            color: var(--dark-gray);
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.2rem;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-bottom: 2rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid #e2e8f0;
            border-radius: 12px 12px 0 0 !important;
            padding: 1.5rem;
        }
        
        .card-header h2 {
            font-weight: 600;
            margin: 0;
            color: var(--primary-color);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        /* Tabs */
        .nav-tabs {
            border-bottom: 1px solid #e2e8f0;
        }
        
        .nav-link {
            color: var(--primary-color);
            background-color: black;
            font-weight: 600;
            border: none;
            padding: 1rem 1.5rem;
            position: relative;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-color);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-link.active {
            color: var(--primary-color);
            background: transparent;
        }
        
        .nav-link.active::before {
            transform: scaleX(1);
        }
        
        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
        }
        
        .btn-primary:hover {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
        
        .btn-outline-secondary {
            border-color: #e2e8f0;
            color: var(--dark-gray);
        }
        
        .btn-outline-secondary:hover {
            background-color: #f1f5f9;
        }
        
        /* Password Strength */
        .password-strength {
            height: 6px;
            background: #e2e8f0;
            margin-top: 0.5rem;
            border-radius: 3px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            background: var(--primary-color);
        }
        
        /* Progress Bar */
        .progress {
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            margin: 1.5rem 0;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: width 0.5s ease;
        }
        
        /* Result Section */
        .result-card {
            display: none;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .result-card h4 {
            color: var(--success-color);
            margin-bottom: 1rem;
        }
        
        /* Preview Section */
        .preview-container {
            border: 2px dashed #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            margin: 1.5rem 0;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8fafc;
        }
        
        .preview-container img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 4px;
        }
        
        /* Tips Card */
        .tips-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .tips-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            background-color: #f8fafc;
            border-radius: 12px 12px 0 0;
        }
        
        .tips-header h3 {
            font-weight: 600;
            margin: 0;
            color: var(--primary-color);
        }
        
        .tips-body {
            padding: 1.5rem;
        }
        
        .tip-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .tip-item:last-child {
            border-bottom: none;
        }
        
        /* FAQ Accordion */
        .accordion-item {
            border: 1px solid #e2e8f0;
            margin-bottom: 0.75rem;
            border-radius: 8px !important;
        }
        
        .accordion-button {
            background-color: #f8fafc;
            color: var(--text-color);
            font-weight: 600;
        }
        
        .accordion-button:not(.collapsed) {
            background-color: #f1f5f9;
            color: var(--primary-color);
        }
        
        .accordion-body {
            background-color: white;
        }
        
        
        /* Footer */
        footer {
            background-color: #f1f5f9;
            padding: 3rem 0;
            margin-top: 5rem;
            border-top: 1px solid #e2e8f0;
        }
        
        footer a {
            color: var(--dark-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: var(--primary-color);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .doc-hero {
                padding: 3rem 0 2rem;
            }
            
            .doc-hero h1 {
                font-size: 2.2rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .nav-link {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>

    <!-- Document Hero -->
    <section class="doc-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1>Document Encryption</h1>
                    <p class="lead">Secure your sensitive files with military-grade encryption. All processing happens in your browser - your documents never leave your device.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Document Encryption -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fas fa-file-shield me-2"></i> Secure Document Processing</h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="documentTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pdf-tab" data-bs-toggle="tab" data-bs-target="#pdf-tab-pane" type="button" role="tab" aria-controls="pdf-tab-pane" aria-selected="true">
                                    <i class="fas fa-file-pdf me-2"></i> PDF
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                    <i class="fas fa-image me-2"></i> Images
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="office-tab" data-bs-toggle="tab" data-bs-target="#office-tab-pane" type="button" role="tab" aria-controls="office-tab-pane" aria-selected="false">
                                    <i class="fas fa-file-word me-2"></i> Office
                                </button>
                            </li>
                        </ul>
                        
                        <div class="tab-content pt-4" id="documentTabsContent">
                            <!-- PDF Tab -->
                            <div class="tab-pane fade show active" id="pdf-tab-pane" role="tabpanel" aria-labelledby="pdf-tab" tabindex="0">
                                <form id="pdfForm">
                                    <div class="mb-4">
                                        <label for="pdfAction" class="form-label">Action</label>
                                        <select class="form-select" id="pdfAction">
                                            <option value="encrypt">Encrypt PDF</option>
                                            <option value="decrypt">Decrypt PDF</option>
                                            <option value="compress">Compress & Encrypt</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="pdfFile" class="form-label">Select PDF File</label>
                                        <input class="form-control" type="file" id="pdfFile" accept=".pdf" required>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="pdfPassword" class="form-label">Encryption Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="pdfPassword" placeholder="Enter strong password" required>
                                            <button class="btn btn-outline-secondary" type="button" id="generatePdfPassword">
                                                <i class="fas fa-key"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary" type="button" id="togglePdfPassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="password-strength">
                                            <div class="password-strength-bar" id="pdfStrengthBar"></div>
                                        </div>
                                        <div class="form-text">Use at least 12 characters with mixed case, numbers, and symbols</div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="pdfSecurity" class="form-label">Security Level</label>
                                        <select class="form-select" id="pdfSecurity">
                                            <option value="aes128">AES-128 (Fast)</option>
                                            <option value="aes256" selected>AES-256 (Recommended)</option>
                                            <option value="aes512">AES-512 (Maximum)</option>
                                        </select>
                                    </div>
                                    
                                    <div class="progress d-none" id="pdfProgress">
                                        <div class="progress-bar" id="pdfProgressBar" style="width: 0%"></div>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" id="processPdfBtn">
                                            <i class="fas fa-lock me-2"></i> Process PDF
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="result-card" id="pdfResult">
                                    <h4><i class="fas fa-check-circle me-2"></i> PDF Processed Securely</h4>
                                    <p class="mb-0" id="pdfResultMessage">Your PDF document has been encrypted with AES-256 encryption. Download your secure file below.</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-2">
                                            <button class="btn btn-success w-100" id="downloadPdf">
                                                <i class="fas fa-download me-2"></i> Download PDF
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-primary w-100" id="copyPdfLink">
                                                <i class="fas fa-copy me-2"></i> Copy Secure Link
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Image Tab -->
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <form id="imageForm">
                                    <div class="mb-4">
                                        <label for="imageAction" class="form-label">Action</label>
                                        <select class="form-select" id="imageAction">
                                            <option value="encrypt">Encrypt Image</option>
                                            <option value="decrypt">Decrypt Image</option>
                                            <option value="steganography">Hide in Image</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="imageFile" class="form-label">Select Image File</label>
                                        <input class="form-control" type="file" id="imageFile" accept="image/*" required>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="imagePassword" class="form-label">Encryption Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="imagePassword" placeholder="Enter strong password" required>
                                            <button class="btn btn-outline-secondary" type="button" id="generateImagePassword">
                                                <i class="fas fa-key"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary" type="button" id="toggleImagePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="password-strength">
                                            <div class="password-strength-bar" id="imageStrengthBar"></div>
                                        </div>
                                    </div>
                                    
                                    <div id="stegOptions" class="mb-4" style="display: none;">
                                        <label for="stegText" class="form-label">Text to Hide</label>
                                        <textarea class="form-control" id="stegText" rows="3" placeholder="Enter secret message to hide in image"></textarea>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="imageWatermark">
                                            <label class="form-check-label" for="imageWatermark">
                                                Add "Encrypted" watermark (visual indicator)
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="progress d-none" id="imageProgress">
                                        <div class="progress-bar" id="imageProgressBar" style="width: 0%"></div>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" id="processImageBtn">
                                            <i class="fas fa-lock me-2"></i> Process Image
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="preview-container" id="imagePreviewContainer">
                                    <p class="text-muted mb-0"><i class="fas fa-image me-2"></i> Encrypted image preview will appear here</p>
                                </div>
                                
                                <div class="result-card" id="imageResult">
                                    <h4><i class="fas fa-check-circle me-2"></i> Image Processed Securely</h4>
                                    <p class="mb-0" id="imageResultMessage">Your image has been encrypted with military-grade algorithms. Download your secure file below.</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-2">
                                            <button class="btn btn-success w-100" id="downloadImage">
                                                <i class="fas fa-download me-2"></i> Download Image
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-primary w-100" id="copyImageLink">
                                                <i class="fas fa-copy me-2"></i> Copy Secure Link
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Office Tab -->
                            <div class="tab-pane fade" id="office-tab-pane" role="tabpanel" aria-labelledby="office-tab" tabindex="0">
                                <form id="officeForm">
                                    <div class="mb-4">
                                        <label for="officeAction" class="form-label">Action</label>
                                        <select class="form-select" id="officeAction">
                                            <option value="encrypt">Encrypt Document</option>
                                            <option value="decrypt">Decrypt Document</option>
                                            <option value="redact">Redact & Encrypt</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="officeFile" class="form-label">Select Office Document</label>
                                        <input class="form-control" type="file" id="officeFile" accept=".doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" required>
                                        <div class="form-text mt-2">Supported formats: Word, Excel, PowerPoint, OpenOffice</div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="officePassword" class="form-label">Encryption Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="officePassword" placeholder="Enter strong password" required>
                                            <button class="btn btn-outline-secondary" type="button" id="generateOfficePassword">
                                                <i class="fas fa-key"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary" type="button" id="toggleOfficePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="password-strength">
                                            <div class="password-strength-bar" id="officeStrengthBar"></div>
                                        </div>
                                    </div>
                                    
                                    <div id="redactOptions" class="mb-4" style="display: none;">
                                        <label for="redactWords" class="form-label">Words to Redact</label>
                                        <textarea class="form-control" id="redactWords" rows="3" placeholder="Enter sensitive words to redact (comma separated)"></textarea>
                                    </div>
                                    
                                    <div class="progress d-none" id="officeProgress">
                                        <div class="progress-bar" id="officeProgressBar" style="width: 0%"></div>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" id="processOfficeBtn">
                                            <i class="fas fa-lock me-2"></i> Process Document
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="result-card" id="officeResult">
                                    <h4><i class="fas fa-check-circle me-2"></i> Document Processed Securely</h4>
                                    <p class="mb-0" id="officeResultMessage">Your document has been encrypted with AES-256 encryption. Download your secure file below.</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-2">
                                            <button class="btn btn-success w-100" id="downloadOffice">
                                                <i class="fas fa-download me-2"></i> Download Document
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-primary w-100" id="copyOfficeLink">
                                                <i class="fas fa-copy me-2"></i> Copy Secure Link
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Security Tips Card -->
                <div class="tips-card">
                    <div class="tips-header">
                        <h3><i class="fas fa-shield-alt me-2"></i> Security Best Practices</h3>
                    </div>
                    <div class="tips-body">
                        <div class="tip-item">
                            <strong>Local Processing:</strong> All encryption/decryption happens in your browser - files never leave your device
                        </div>
                        <div class="tip-item">
                            <strong>Password Management:</strong> Use a password manager to store your encryption keys securely
                        </div>
                        <div class="tip-item">
                            <strong>Layered Security:</strong> Combine encryption with file compression for maximum protection
                        </div>
                        <div class="tip-item">
                            <strong>Key Rotation:</strong> Regularly update your encryption passwords for sensitive documents
                        </div>
                        <div class="tip-item">
                            <strong>Visual Indicators:</strong> Watermark encrypted images for easy identification
                        </div>
                        <div class="tip-item">
                            <strong>Verification:</strong> Always verify file integrity after decryption
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Card -->
                <div class="tips-card">
                    <div class="tips-header">
                        <h3><i class="fas fa-question-circle me-2"></i> Document Security FAQ</h3>
                    </div>
                    <div class="tips-body">
                        <div class="accordion" id="documentSecurityAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        <i class="fas fa-lock me-2"></i> How secure is this encryption?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#documentSecurityAccordion">
                                    <div class="accordion-body">
                                        We use AES-256 encryption, the same standard adopted by the U.S. government for classified information. All processing happens locally in your browser for maximum security.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        <i class="fas fa-key me-2"></i> What if I lose my password?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#documentSecurityAccordion">
                                    <div class="accordion-body">
                                        For security reasons, we cannot recover lost passwords. This is by design to ensure maximum protection. We recommend using a password manager to store your encryption keys securely.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        <i class="fas fa-file-alt me-2"></i> Are there file size limits?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#documentSecurityAccordion">
                                    <div class="accordion-body">
                                        Since all processing happens in your browser, very large files may cause performance issues. For optimal performance, we recommend files under 100MB.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">&copy; 2025 Cryptec. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="privacy.php" class="me-3">Privacy Policy</a>
                    <a href="terms.php" class="me-3">Terms of Service</a>
                    <a href="security.php">Security Center</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script>
        // Password strength indicator
        function updatePasswordStrength(password, strengthBarId) {
            const strengthBar = document.getElementById(strengthBarId);
            let strength = 0;
            
            // Length check
            if (password.length > 12) strength += 30;
            else if (password.length > 8) strength += 20;
            else if (password.length > 5) strength += 10;
            
            // Complexity checks
            if (/[A-Z]/.test(password)) strength += 15;
            if (/[a-z]/.test(password)) strength += 15;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            strength = Math.min(strength, 100);
            strengthBar.style.width = strength + '%';
            
            // Color coding
            if (strength < 40) {
                strengthBar.style.background = '#ef4444';
            } else if (strength < 70) {
                strengthBar.style.background = '#f59e0b';
            } else {
                strengthBar.style.background = '#10b981';
            }
        }
        
        // Password event listeners
        document.getElementById('pdfPassword').addEventListener('input', function() {
            updatePasswordStrength(this.value, 'pdfStrengthBar');
        });
        
        document.getElementById('imagePassword').addEventListener('input', function() {
            updatePasswordStrength(this.value, 'imageStrengthBar');
        });
        
        document.getElementById('officePassword').addEventListener('input', function() {
            updatePasswordStrength(this.value, 'officeStrengthBar');
        });
        
        // Generate random passwords
        function generatePassword() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
            let password = '';
            for (let i = 0; i < 16; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return password;
        }
        
        // Toggle password visibility
        function togglePasswordVisibility(inputId, buttonId) {
            const input = document.getElementById(inputId);
            const button = document.getElementById(buttonId);
            
            if (input.type === 'password') {
                input.type = 'text';
                button.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                button.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
        
        // Toggle steganography options
        document.getElementById('imageAction').addEventListener('change', function() {
            const stegOptions = document.getElementById('stegOptions');
            if (this.value === 'steganography') {
                stegOptions.style.display = 'block';
            } else {
                stegOptions.style.display = 'none';
            }
        });
        
        // Toggle redaction options
        document.getElementById('officeAction').addEventListener('change', function() {
            const redactOptions = document.getElementById('redactOptions');
            if (this.value === 'redact') {
                redactOptions.style.display = 'block';
            } else {
                redactOptions.style.display = 'none';
            }
        });
        
        // Set up event listeners
        document.getElementById('generatePdfPassword').addEventListener('click', function() {
            const password = generatePassword();
            document.getElementById('pdfPassword').value = password;
            updatePasswordStrength(password, 'pdfStrengthBar');
        });
        
        document.getElementById('generateImagePassword').addEventListener('click', function() {
            const password = generatePassword();
            document.getElementById('imagePassword').value = password;
            updatePasswordStrength(password, 'imageStrengthBar');
        });
        
        document.getElementById('generateOfficePassword').addEventListener('click', function() {
            const password = generatePassword();
            document.getElementById('officePassword').value = password;
            updatePasswordStrength(password, 'officeStrengthBar');
        });
        
        document.getElementById('togglePdfPassword').addEventListener('click', function() {
            togglePasswordVisibility('pdfPassword', 'togglePdfPassword');
        });
        
        document.getElementById('toggleImagePassword').addEventListener('click', function() {
            togglePasswordVisibility('imagePassword', 'toggleImagePassword');
        });
        
        document.getElementById('toggleOfficePassword').addEventListener('click', function() {
            togglePasswordVisibility('officePassword', 'toggleOfficePassword');
        });
        
        // Simulate form processing (replace with actual encryption logic)
        document.getElementById('pdfForm').addEventListener('submit', function(e) {
            e.preventDefault();
            processForm('pdf');
        });
        
        document.getElementById('imageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            processForm('image');
        });
        
        document.getElementById('officeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            processForm('office');
        });
        
        function processForm(type) {
            const progressBar = document.getElementById(`${type}ProgressBar`);
            const progressContainer = document.getElementById(`${type}Progress`);
            const resultContainer = document.getElementById(`${type}Result`);
            const action = document.getElementById(`${type}Action`).value;
            
            // Show progress bar
            progressContainer.classList.remove('d-none');
            
            // Simulate processing
            let progress = 0;
            const interval = setInterval(() => {
                progress += 2 + Math.random() * 3;
                if (progress > 100) progress = 100;
                progressBar.style.width = progress + '%';
                
                if (progress >= 100) {
                    clearInterval(interval);
                    progressContainer.classList.add('d-none');
                    resultContainer.style.display = 'block';
                    
                    // Update result message based on action
                    const actionText = action === 'encrypt' ? 'encrypted' : 
                                      action === 'decrypt' ? 'decrypted' : 
                                      action === 'compress' ? 'compressed and encrypted' :
                                      action === 'steganography' ? 'hidden in image' :
                                      action === 'redact' ? 'redacted and encrypted' : 'processed';
                    
                    document.getElementById(`${type}ResultMessage`).textContent = 
                        `Your ${type === 'office' ? 'document' : type} has been ${actionText} successfully. Download your secure file below.`;
                    
                    // Scroll to result
                    resultContainer.scrollIntoView({ behavior: 'smooth' });
                    
                    // For image preview
                    if (type === 'image') {
                        const fileInput = document.getElementById(`${type}File`);
                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const previewContainer = document.getElementById('imagePreviewContainer');
                                previewContainer.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" alt="Preview">`;
                            };
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }
                }
            }, 100);
        }

        let processedBlob = null;   // common variable to store result

function processForm(type) {
    const progressBar = document.getElementById(`${type}ProgressBar`);
    const progressContainer = document.getElementById(`${type}Progress`);
    const resultContainer = document.getElementById(`${type}Result`);
    const action = document.getElementById(`${type}Action`).value;
    
    progressContainer.classList.remove('d-none');

    let progress = 0;
    const interval = setInterval(() => {
        progress += 2 + Math.random() * 3;
        if (progress > 100) progress = 100;
        progressBar.style.width = progress + '%';
        
        if (progress >= 100) {
            clearInterval(interval);
            progressContainer.classList.add('d-none');
            resultContainer.style.display = 'block';

            // create a fake blob for download
            const text = `Dummy ${type} file for ${action}`;
            processedBlob = new Blob([text], { type: "application/octet-stream" });

            // update result message...
        }
    }, 100);
}
document.getElementById('downloadPdf').addEventListener('click', () => {
  if (!processedBlob) return alert("Please process file first.");
  const url = URL.createObjectURL(processedBlob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'processed.pdf';
  document.body.appendChild(a);
  a.click();
  URL.revokeObjectURL(url);
  a.remove();
});

document.getElementById('downloadImage').addEventListener('click', () => {
  if (!processedBlob) return alert("Process image first.");
  const url = URL.createObjectURL(processedBlob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'processed.png';
  document.body.appendChild(a);
  a.click();
  URL.revokeObjectURL(url);
  a.remove();
});

document.getElementById('downloadOffice').addEventListener('click', () => {
  if (!processedBlob) return alert("Process document first.");
  const url = URL.createObjectURL(processedBlob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'processed.docx';
  document.body.appendChild(a);
  a.click();
  URL.revokeObjectURL(url);
  a.remove();
});

    </script>
</body>
</html>