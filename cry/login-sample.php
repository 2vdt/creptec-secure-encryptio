
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Cryptec Secure Encryptor</title>
  <meta name="description" content="Log in to your Cryptec account to access your encrypted files and settings">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="icon" type="image/svg+xml" href="favicon.svg">
</head>
<body>
  
    <main class="main-content">
      <!-- Login Section -->
      <section class="login-section">
        <div class="container">
          <div class="login-container">
            <div class="login-card">
              <div class="login-header">
                <div class="login-logo">
                  <span class="login-logo-text">Cryptec Secure Encryption </span>
                </div>
                <a href="index.php" class="text-white me-3">Back to Home</a>
                <p class="login-subtitle">Log in to access your secure encryption dashboard</p>
              </div>

              <div class="login-tabs">
                <button class="login-tab active" data-tab="login">Login</button>
                <button class="login-tab" data-tab="register">Register</button>
              </div>

              <div class="login-content">
                <!-- Login Form -->
                <div class="login-tab-content active" id="login-content">
                  <form class="login-form" id="login-form">
                    <div class="form-group">
                      <label for="login-email">Email</label>
                      <div class="input-with-icon">
                        <span class="input-icon">✉️</span>
                        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="login-password">Password</label>
                      <div class="input-with-icon">
                        <span class="input-icon">🔑</span>
                        <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
                      </div>
                      <div class="form-help">
                        <a href="#" class="forgot-password">Forgot password?</a>
                      </div>
                    </div>

                    <div class="form-group remember-me">
                      <label class="checkbox-container">
                        <input type="checkbox" id="remember-me" name="remember">
                        <span class="checkmark"></span>
                        Remember me
                      </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>

                    <div class="login-divider">
                      <span>or continue with</span>
                    </div>

                    <div class="social-login">
                      <button type="button" class="social-login-btn google">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                        </svg>
                        Google
                      </button>
                      <button type="button" class="social-login-btn github">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        GitHub
                      </button>
                    </div>
                  </form>
                </div>

                <!-- Register Form -->
                <div class="login-tab-content" id="register-content">
                  <form class="login-form" id="register-form">
                    <div class="form-group">
                      <label for="register-name">Full Name</label>
                      <div class="input-with-icon">
                        <span class="input-icon">👤</span>
                        <input type="text" id="register-name" name="name" placeholder="Enter your full name" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="register-email">Email</label>
                      <div class="input-with-icon">
                        <span class="input-icon">✉️</span>
                        <input type="email" id="register-email" name="email" placeholder="Enter your email" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="register-password">Password</label>
                      <div class="input-with-icon">
                        <span class="input-icon">🔑</span>
                        <input type="password" id="register-password" name="password" placeholder="Create a password" required>
                      </div>
                      <div class="password-strength">
                        <div class="strength-meter">
                          <div class="strength-meter-fill" data-strength="0"></div>
                        </div>
                        <div class="strength-text">Password strength: <span>Weak</span></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="register-confirm-password">Confirm Password</label>
                      <div class="input-with-icon">
                        <span class="input-icon">🔑</span>
                        <input type="password" id="register-confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                      </div>
                    </div>

                    <div class="form-group terms-checkbox">
                      <label class="checkbox-container">
                        <input type="checkbox" id="terms" name="terms" required>
                        <span class="checkmark"></span>
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                      </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>

                    <div class="login-divider">
                      <span>or register with</span>
                    </div>

                    <div class="social-login">
                      <button type="button" class="social-login-btn google">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                        </svg>
                        Google
                      </button>
                      <button type="button" class="social-login-btn github">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                          <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        GitHub
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="login-features">
              <div class="login-features-header">
                <h2>Why Choose Cryptec?</h2>
                <p>Secure your sensitive information with military-grade encryption</p>
              </div>
              <div class="login-features-list">
                <div class="login-feature-item">
                  <div class="login-feature-icon">🔒</div>
                  <div class="login-feature-content">
                    <h3>Military-Grade Encryption</h3>
                    <p>AES-256 encryption, the gold standard trusted by governments worldwide</p>
                  </div>
                </div>
                <div class="login-feature-item">
                  <div class="login-feature-icon">📱</div>
                  <div class="login-feature-content">
                    <h3>File Encryption</h3>
                    <p>Secure your PDFs, documents, images, and more with powerful encryption</p>
                  </div>
                </div>
                <div class="login-feature-item">
                  <div class="login-feature-icon">🔐</div>
                  <div class="login-feature-content">
                    <h3>Client-Side Security</h3>
                    <p>All encryption happens locally in your browser for maximum privacy</p>
                  </div>
                </div>
                <div class="login-feature-item">
                  <div class="login-feature-icon">💾</div>
                  <div class="login-feature-content">
                    <h3>Secure Cloud Storage</h3>
                    <p>Store your encrypted files safely in the cloud with end-to-end encryption</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-brand">
            <a href="index.html" class="footer-logo">
              <span class="footer-logo-icon">🔒</span>
              <span class="footer-logo-text">Cryptec</span>
            </a>
            <p class="footer-tagline">Secure encryption for everyone. Protect your data with confidence.</p>
            <div class="footer-social">
              <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </a>
              <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
              </a>
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="LinkedIn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                </svg>
              </a>
              <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="GitHub">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
              </a>
            </div>
          </div>

          <div class="footer-links">
            <div class="footer-links-column">
              <h3 class="footer-links-title">Product</h3>
              <ul class="footer-links-list">
                <li><a href="features.html">Features</a></li>
                <li><a href="tool.html">Encryption Tool</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Pricing</a></li>
              </ul>
            </div>

            <div class="footer-links-column">
              <h3 class="footer-links-title">Company</h3>
              <ul class="footer-links-list">
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Blog</a></li>
              </ul>
            </div>

            <div class="footer-links-column">
              <h3 class="footer-links-title">Resources</h3>
              <ul class="footer-links-list">
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Tutorials</a></li>
                <li><a href="#">Support</a></li>
              </ul>
            </div>

            <div class="footer-links-column">
              <h3 class="footer-links-title">Legal</h3>
              <ul class="footer-links-list">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Cookie Policy</a></li>
                <li><a href="#">GDPR</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p class="footer-copyright">&copy; <span id="current-year"></span> Cryptec Secure Encryptor. All rights reserved.</p>
          <div class="footer-bottom-links">
            <a href="privacy.html">Privacy</a>
            <a href="terms.html">Terms</a>
            <a href="#">Cookies</a>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="js/main.js"></script>
  <script src="js/login.js"></script>
</body>
</html>





registerForm.addEventListener("submit", (e) => {
    e.preventDefault()

    // Get form data
    const name = document.getElementById("register-name").value
    const email = document.getElementById("register-email").value
    const password = document.getElementById("register-password").value
    const confirmPassword = document.getElementById("register-confirm-password").value
    const terms = document.getElementById("terms").checked

    // Basic validation
    if (password !== confirmPassword) {
      alert("Passwords do not match!")
      return
    }

    // Here you would typically send this data to your server for registration
    console.log("Register form submitted:", { name, email, password, terms })

    // For demo purposes, simulate a successful registration
    

    // Switch to login tab
    loginTab.click()
  })