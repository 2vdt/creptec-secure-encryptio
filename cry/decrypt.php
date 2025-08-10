<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decrypt - Cryptec</title>
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
        
        .hidden {
            display: none;
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
        
        .list-group-item {
            border-left: 0;
            border-right: 0;
            padding: 1rem 1.25rem;
        }
        
        .list-group-item:first-child {
            border-top: 0;
        }
        
        .list-group-item:last-child {
            border-bottom: 0;
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
        
        textarea {
            min-height: 150px;
            resize: vertical;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-3">Decrypt Your Data</h1>
            <p class="lead text-muted">Securely unlock your encrypted information</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header gradient-bg text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-lock-open me-2"></i>Decryption Tool</h5>
                    </div>
                    <div class="card-body">
                        <form id="decryptForm">
                            <div class="mb-4">
                                <label for="algorithm" class="form-label fw-bold">Decryption Algorithm</label>
                                <select class="form-select" id="algorithm" required>
                                    <option value="aes">AES-256 (Recommended)</option>
                                    <option value="des">Triple DES</option>
                                    <option value="rc4">RC4</option>
                                    <option value="rabbit">Rabbit</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="secretKey" class="form-label fw-bold">Secret Key</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="secretKey" placeholder="Enter the encryption key" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleKey" title="Show or hide the secret key">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="form-text text-muted">Enter the same key that was used for encryption.</div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="inputText" class="form-label fw-bold">Encrypted Text</label>
                                <textarea class="form-control" id="inputText" placeholder="Paste your encrypted text here" required></textarea>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary py-2">
                                    <i class="fas fa-unlock me-2"></i>Decrypt Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card hidden" id="resultCard">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-check-circle me-2"></i>Decryption Successful</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="outputText" class="form-label fw-bold">Decrypted Text</label>
                            <textarea class="form-control" id="outputText" readonly></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-outline-primary px-4 py-2" id="copyButton">
                                <i class="fas fa-copy me-2"></i>Copy to Clipboard
                            </button>
                            <a href="encrypt.html" class="btn btn-outline-secondary px-4 py-2">
                                <i class="fas fa-lock me-2"></i>Go to Encrypt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-lightbulb me-2"></i>Decryption Guide</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Algorithm Matching</h6>
                                <p class="text-muted small">You must use the same algorithm that was used for encryption.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Exact Key Required</h6>
                                <p class="text-muted small">The secret key must match exactly what was used to encrypt.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Troubleshooting</h6>
                                <p class="text-muted small">If decryption fails, check for typos in your key or encrypted text.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Case Sensitivity</h6>
                                <p class="text-muted small">Encrypted text is case-sensitive and includes all characters.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="feature-icon">
                                <i class="fas fa-skull-crossbones"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Key Loss Warning</h6>
                                <p class="text-muted small">If you've lost your key, the data cannot be recovered.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="js/decrypt.js"></script>
    
    <script>
        // Floating action button functionality
        document.getElementById('floatingActionBtn').addEventListener('click', function() {
            // Scroll to decrypt form
            document.getElementById('decryptForm').scrollIntoView({ behavior: 'smooth' });
        });
        
        // Toggle key visibility
        document.getElementById('toggleKey').addEventListener('click', function() {
            const keyInput = document.getElementById('secretKey');
            const icon = this.querySelector('i');
            if (keyInput.type === 'password') {
                keyInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                keyInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>