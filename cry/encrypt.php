<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypt - Cryptec</title>
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
        
        .key-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .strength-weak {
            background-color: var(--danger-color);
            width: 25%;
        }
        
        .strength-medium {
            background-color: var(--warning-color);
            width: 50%;
        }
        
        .strength-strong {
            background-color: var(--success-color);
            width: 75%;
        }
        
        .strength-very-strong {
            background-color: var(--success-color);
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-3">Secure Data Encryption</h1>
            <p class="lead text-muted">Protect your sensitive information with military-grade encryption</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header gradient-bg text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-lock me-2"></i>Encryption Tool</h5>
                    </div>
                    <div class="card-body">
                        <form id="encryptForm">
                            <div class="mb-4">
                                <label for="algorithm" class="form-label fw-bold">Encryption Algorithm</label>
                                <select class="form-select" id="algorithm" required>
                                    <option value="aes">AES-256 (Recommended)</option>
                                    <option value="des">Triple DES</option>
                                    <option value="rc4">RC4</option>
                                    <option value="rabbit">Rabbit</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="secretKey" class="form-label fw-bold">Secret Key</label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" id="secretKey" placeholder="Enter or generate a strong key" required>
                                    <button class="btn btn-outline-secondary" type="button" id="generateKey">
                                        <i class="fas fa-key me-1"></i>Generate
                                    </button>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleKey" title="Toggle visibility">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div id="keyStrength" class="key-strength"></div>
                                <div class="form-text text-muted">Keep this key safe - you'll need it to decrypt your data.</div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="inputText" class="form-label fw-bold">Text to Encrypt</label>
                                <textarea class="form-control" id="inputText" placeholder="Enter the text you want to encrypt securely" required></textarea>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary py-2">
                                    <i class="fas fa-lock me-2"></i>Encrypt Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card hidden" id="resultCard">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-check-circle me-2"></i>Encryption Successful</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Important:</strong> Save your encryption key before closing this page. Without it, your data cannot be recovered.
                        </div>
                        <div class="mb-4">
                            <label for="outputText" class="form-label fw-bold">Encrypted Text</label>
                            <textarea class="form-control" id="outputText" readonly></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-outline-primary px-4 py-2" id="copyButton">
                                <i class="fas fa-copy me-2"></i>Copy to Clipboard
                            </button>
                            <a href="decrypt.php" class="btn btn-outline-secondary px-4 py-2">
                                <i class="fas fa-lock-open me-2"></i>Go to Decrypt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="fas fa-lightbulb me-2"></i>Security Best Practices</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Strong Keys</h6>
                                <p class="text-muted small">Use long, complex keys with a mix of letters, numbers, and symbols.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Key Management</h6>
                                <p class="text-muted small">Store your encryption keys securely using a password manager.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Algorithm Choice</h6>
                                <p class="text-muted small">AES-256 is the gold standard for most encryption needs.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="feature-icon">
                                <i class="fas fa-user-secret"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Secure Sharing</h6>
                                <p class="text-muted small">Never share keys over email or unencrypted channels.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="feature-icon">
                                <i class="fas fa-random"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-bold">Unique Keys</h6>
                                <p class="text-muted small">Use different keys for different data sets.</p>
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
                    <a href="privacy.php" class="text-white me-3 text-decoration-none">Privacy Policy</a>
                    <a href="terms.php" class="text-white text-decoration-none">Terms of Service</a>
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
    <script src="js/encrypt.js"></script>
    
    <script>
        // Floating action button functionality
        document.getElementById('floatingActionBtn').addEventListener('click', function() {
            document.getElementById('encryptForm').scrollIntoView({ behavior: 'smooth' });
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
        
        // Key strength indicator
        document.getElementById('secretKey').addEventListener('input', function() {
            const strengthBar = document.getElementById('keyStrength');
            const key = this.value;
            let strength = 0;
            
            // Length check
            if (key.length > 12) strength += 1;
            if (key.length > 16) strength += 1;
            
            // Complexity checks
            if (/[A-Z]/.test(key)) strength += 1;
            if (/[a-z]/.test(key)) strength += 1;
            if (/[0-9]/.test(key)) strength += 1;
            if (/[^A-Za-z0-9]/.test(key)) strength += 1;
            
            // Update strength bar
            strengthBar.className = 'key-strength';
            if (key.length === 0) {
                strengthBar.style.width = '0';
            } else if (strength < 2) {
                strengthBar.classList.add('strength-weak');
            } else if (strength < 4) {
                strengthBar.classList.add('strength-medium');
            } else if (strength < 6) {
                strengthBar.classList.add('strength-strong');
            } else {
                strengthBar.classList.add('strength-very-strong');
            }
        });
        
        // Generate random key
        document.getElementById('generateKey').addEventListener('click', function() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
            let key = '';
            for (let i = 0; i < 24; i++) {
                key += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            document.getElementById('secretKey').value = key;
            document.getElementById('secretKey').dispatchEvent(new Event('input'));
        });
    </script>
</body>
</html>