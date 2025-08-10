<?php
include "DB_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Cryptec Secure Encryptor</title>
  <meta name="description" content="Log in to your Cryptec account to access your encrypted files and settings">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="icon" type="image/svg+xml" href="favicon.svg">
  <style>
    :root {
      --primary: #4361ee;
      --primary-light: #e0e7ff;
      --secondary: #3f37c9;
      --accent: #7209b7;
      --success: #10b981;
      --error: #ef4444;
      --warning: #f59e0b;
      --text: #1e293b;
      --text-light: #64748b;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --border: #e2e8f0;
      --shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Login Section */
    .login-section {
      padding: 60px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-grow: 1;
      background: linear-gradient(135deg, #f9fafb 0%, #f1f5f9 100%);
    }

    .login-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      width: 100%;
      max-width: 1000px;
    }

    @media (max-width: 768px) {
      .login-container {
        grid-template-columns: 1fr;
      }
    }

    /* Login Card */
    .login-card {
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: var(--shadow);
      padding: 40px;
      transition: var(--transition);
      transform: translateY(0);
      border: 1px solid var(--border);
    }

    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(67, 97, 238, 0.1);
    }

    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
    }

    .login-logo-text {
      font-size: 22px;
      font-weight: 700;
      color: var(--primary);
      background: linear-gradient(90deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .login-subtitle {
      color: var(--text-light);
      font-size: 15px;
      margin-top: 10px;
    }

    .back-to-home {
      display: inline-flex;
      align-items: center;
      color: var(--text-light);
      font-size: 14px;
      margin-bottom: 20px;
      transition: var(--transition);
    }

    .back-to-home:hover {
      color: var(--primary);
    }

    .back-to-home i {
      margin-right: 5px;
    }

    /* Tabs */
    .login-tabs {
      display: flex;
      border-bottom: 1px solid var(--border);
      margin-bottom: 25px;
    }

    .login-tab {
      padding: 12px 20px;
      font-weight: 600;
      color: var(--text-light);
      background: none;
      border: none;
      cursor: pointer;
      position: relative;
      transition: var(--transition);
      font-size: 15px;
    }

    .login-tab:after {
      content: '';
      position: absolute;
      bottom: -1px;
      left: 0;
      width: 100%;
      height: 2px;
      background: var(--primary);
      transform: scaleX(0);
      transition: var(--transition);
    }

    .login-tab.active {
      color: var(--primary);
    }

    .login-tab.active:after {
      transform: scaleX(1);
    }

    .login-tab-content {
      display: none;
      animation: fadeIn 0.4s ease-out;
    }

    .login-tab-content.active {
      display: block;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Forms */
    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: 500;
      margin-bottom: 8px;
      font-size: 14px;
      color: var(--text);
    }

    .input-with-icon {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      font-size: 16px;
    }

    .form-group input {
      width: 100%;
      padding: 12px 15px 12px 45px;
      border: 1px solid var(--border);
      border-radius: 8px;
      font-size: 15px;
      transition: var(--transition);
      background-color: #f8fafc;
    }

    .form-group input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px var(--primary-light);
    }

    .form-help {
      display: flex;
      justify-content: flex-end;
      margin-top: 8px;
    }

    .forgot-password {
      font-size: 13px;
      color: var(--text-light);
      transition: var(--transition);
    }

    .forgot-password:hover {
      color: var(--primary);
      text-decoration: none;
    }

    .checkbox-container {
      display: flex;
      align-items: center;
      cursor: pointer;
      user-select: none;
      font-size: 14px;
      color: var(--text-light);
    }

    .checkbox-container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    .checkmark {
      height: 18px;
      width: 18px;
      background-color: white;
      border: 1px solid var(--border);
      border-radius: 4px;
      margin-right: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }

    .checkbox-container:hover input ~ .checkmark {
      border-color: var(--primary);
    }

    .checkbox-container input:checked ~ .checkmark {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .checkmark:after {
      content: "";
      display: none;
      color: white;
    }

    .checkbox-container input:checked ~ .checkmark:after {
      display: block;
    }

    .checkbox-container .checkmark:after {
      content: "\f00c";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      font-size: 10px;
      color: white;
    }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 20px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
      transition: var(--transition);
      border: none;
    }

    .btn-primary {
      background: linear-gradient(90deg, var(--primary), var(--accent));
      color: white;
      width: 100%;
      margin-top: 10px;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
    }

    /* Divider */
    .login-divider {
      display: flex;
      align-items: center;
      margin: 25px 0;
      color: var(--text-light);
      font-size: 13px;
    }

    .login-divider:before,
    .login-divider:after {
      content: "";
      flex: 1;
      border-bottom: 1px solid var(--border);
    }

    .login-divider:before {
      margin-right: 15px;
    }

    .login-divider:after {
      margin-left: 15px;
    }

    /* Social Login */
    .social-login {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .social-login-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid var(--border);
      background: white;
      color: var(--text);
      font-weight: 500;
      font-size: 14px;
      transition: var(--transition);
    }

    .social-login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .social-login-btn svg {
      margin-right: 8px;
      width: 16px;
      height: 16px;
    }

    .google {
      color: #ea4335;
    }

    .github {
      color: var(--text);
    }

    /* Password Strength */
    .password-strength {
      margin-top: 10px;
    }

    .strength-meter {
      height: 4px;
      background: var(--border);
      border-radius: 2px;
      overflow: hidden;
      margin-bottom: 5px;
    }

    .strength-meter-fill {
      height: 100%;
      width: 0;
      background: var(--error);
      transition: width 0.3s ease;
    }

    .strength-text {
      font-size: 12px;
      color: var(--text-light);
    }

    .strength-text span {
      font-weight: 600;
    }

    /* Terms Checkbox */
    .terms-checkbox {
      margin: 20px 0;
    }

    .terms-checkbox a {
      color: var(--primary);
      text-decoration: none;
    }

    .terms-checkbox a:hover {
      text-decoration: underline;
    }

    /* Error Message */
    .error-message {
      background: rgba(239, 68, 68, 0.1);
      color: var(--error);
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 14px;
      border-left: 3px solid var(--error);
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-5px); }
      40%, 80% { transform: translateX(5px); }
    }

    /* Features Section */
    .login-features {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-features-header {
      margin-bottom: 30px;
      text-align: center;
    }

    .login-features-header h2 {
      font-size: 24px;
      color: var(--text);
      margin-bottom: 10px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .login-features-header p {
      color: var(--text-light);
      font-size: 15px;
    }

    .login-features-list {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .login-feature-item {
      display: flex;
      align-items: flex-start;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: var(--shadow);
      transition: var(--transition);
      border: 1px solid var(--border);
    }

    .login-feature-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(67, 97, 238, 0.1);
    }

    .login-feature-icon {
      font-size: 20px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--primary-light);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      flex-shrink: 0;
    }

    .login-feature-content h3 {
      font-size: 16px;
      color: var(--text);
      margin-bottom: 5px;
    }

    .login-feature-content p {
      font-size: 14px;
      color: var(--text-light);
      line-height: 1.5;
    }

    /* Footer */
    .footer {
      background: white;
      padding: 40px 0 20px;
      border-top: 1px solid var(--border);
    }

    .footer-content {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 40px;
      margin-bottom: 30px;
    }

    @media (max-width: 768px) {
      .footer-content {
        grid-template-columns: 1fr;
      }
    }

    .footer-brand {
      display: flex;
      flex-direction: column;
    }

    .footer-logo {
      display: flex;
      align-items: center;
      text-decoration: none;
      margin-bottom: 15px;
    }

    .footer-logo-icon {
      font-size: 24px;
      margin-right: 10px;
      color: var(--primary);
    }

    .footer-logo-text {
      font-size: 20px;
      font-weight: 700;
      color: var(--text);
    }

    .footer-tagline {
      color: var(--text-light);
      font-size: 14px;
      margin-bottom: 20px;
    }

    .footer-social {
      display: flex;
      gap: 15px;
    }

    .footer-social-link {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--bg);
      color: var(--text-light);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }

    .footer-social-link:hover {
      background: var(--primary);
      color: white;
      transform: translateY(-3px);
    }

    .footer-links {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
    }

    @media (max-width: 768px) {
      .footer-links {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .footer-links-column h3 {
      font-size: 16px;
      color: var(--text);
      margin-bottom: 15px;
    }

    .footer-links-list {
      list-style: none;
    }

    .footer-links-list li {
      margin-bottom: 10px;
    }

    .footer-links-list a {
      color: var(--text-light);
      font-size: 14px;
      text-decoration: none;
      transition: var(--transition);
    }

    .footer-links-list a:hover {
      color: var(--primary);
    }

    .footer-bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 20px;
      border-top: 1px solid var(--border);
    }

    .footer-copyright {
      color: var(--text-light);
      font-size: 13px;
    }

    .footer-bottom-links {
      display: flex;
      gap: 15px;
    }

    .footer-bottom-links a {
      color: var(--text-light);
      font-size: 13px;
      text-decoration: none;
      transition: var(--transition);
    }

    .footer-bottom-links a:hover {
      color: var(--primary);
    }

    /* Animations */
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .floating {
      animation: float 6s ease-in-out infinite;
    }

    /* Responsive */
    @media (max-width: 576px) {
      .login-card {
        padding: 30px 20px;
      }
      
      .social-login {
        grid-template-columns: 1fr;
      }
      
      .footer-links {
        grid-template-columns: 1fr;
      }
      
      .footer-bottom {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  
    <main class="main-content">
      <!-- Login Section -->
      <section class="login-section">
        <div class="container">
          <div class="login-container">
            <div class="login-card floating">
              <div class="login-header">
                <a href="index.php" class="back-to-home">
                  <i class="fas fa-arrow-left"></i> Back to Home
                </a>
                <div class="login-logo">
                  <span class="login-logo-text">Cryptec Secure Encryption</span>
                </div>
                <p class="login-subtitle">Log in to access your secure encryption dashboard</p>
              </div>

              <div class="login-tabs">
                <button class="login-tab active" data-tab="login">Login</button>
                <button class="login-tab" data-tab="register">Register</button>
              </div>

              <div class="login-content">
                <!-- Login Form -->
                <div class="login-tab-content active" id="login-content">
                  <?php if (isset($_GET['error'])): ?>
                    <div class="error-message">
                      <?php
                        if ($_GET['error'] == 'empty_fields') {
                          echo "Please fill in all fields.";
                        } elseif ($_GET['error'] == 'invalid_credentials') {
                          echo "Incorrect email or password.";
                        }
                      ?>
                    </div>
                  <?php endif; ?>

                  <form class="login-form" id="login-form" action="login-process.php" method="post">
                    <div class="form-group">
                      <label for="login-email">Email</label>
                      <div class="input-with-icon">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="login-password">Password</label>
                      <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
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

                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i> Login
                    </button>

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
                  <form class="login-form" id="register-form" action="process.php" method="post">
                    <div class="form-group">
                      <label for="register-name">Full Name</label>
                      <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="register-name" name="name" placeholder="Enter your full name" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="register-email">Email</label>
                      <div class="input-with-icon">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="register-email" name="email" placeholder="Enter your email" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="register-password">Password</label>
                      <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
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
                        <i class="fas fa-lock input-icon"></i>
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

                    <button type="submit" class="btn btn-primary" name="register">
                      <i class="fas fa-user-plus" style="margin-right: 8px;"></i> Create Account
                    </button>

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
                  <div class="login-feature-icon">
                    <i class="fas fa-lock"></i>
                  </div>
                  <div class="login-feature-content">
                    <h3>Military-Grade Encryption</h3>
                    <p>AES-256 encryption, the gold standard trusted by governments worldwide</p>
                  </div>
                </div>
                <div class="login-feature-item">
                  <div class="login-feature-icon">
                    <i class="fas fa-file-alt"></i>
                  </div>
                  <div class="login-feature-content">
                    <h3>File Encryption</h3>
                    <p>Secure your PDFs, documents, images, and more with powerful encryption</p>
                  </div>
                </div>
                <div class="login-feature-item">
                  <div class="login-feature-icon">
                    <i class="fas fa-shield-alt"></i>
                  </div>
                  <div class="login-feature-content">
                    <h3>Client-Side Security</h3>
                    <p>All encryption happens locally in your browser for maximum privacy</p>
                  </div>
                </div>
                <div class="login-feature-item">
                  <div class="login-feature-icon">
                    <i class="fas fa-cloud"></i>
                  </div>
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
            <a href="index.php" class="footer-logo">
              <span class="footer-logo-icon">
                <i class="fas fa-lock"></i>
              </span>
              <span class="footer-logo-text">Cryptec</span>
            </a>
            <p class="footer-tagline">Secure encryption for everyone. Protect your data with confidence.</p>
            <div class="footer-social">
              <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="GitHub">
                <i class="fab fa-github"></i>
              </a>
            </div>
          </div>

          <div class="footer-links">
            <div class="footer-links-column">
              <h3>Product</h3>
              <ul class="footer-links-list">
                <li><a href="features.php">Features</a></li>
                <li><a href="tool.php">Encryption Tool</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Pricing</a></li>
              </ul>
            </div>

            <div class="footer-links-column">
              <h3>Company</h3>
              <ul class="footer-links-list">
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Blog</a></li>
              </ul>
            </div>

            <div class="footer-links-column">
              <h3>Resources</h3>
              <ul class="footer-links-list">
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Tutorials</a></li>
                <li><a href="#">Support</a></li>
              </ul>
            </div>

            <div class="footer-links-column">
              <h3>Legal</h3>
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
          <p class="footer-copyright">&copy; <span id="current-year">2025</span> Cryptec Secure Encryptor. All rights reserved.</p>
          <div class="footer-bottom-links">
            <a href="privacy.php">Privacy</a>
            <a href="terms.php">Terms</a>
            <a href="#">Cookies</a>
          </div>
        </div>
      </div>
    </footer>

  <script>
    // Tab switching functionality
    document.querySelectorAll('.login-tab').forEach(tab => {
      tab.addEventListener('click', () => {
        // Remove active class from all tabs and content
        document.querySelectorAll('.login-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.login-tab-content').forEach(c => c.classList.remove('active'));
        
        // Add active class to clicked tab and corresponding content
        tab.classList.add('active');
        const tabId = tab.getAttribute('data-tab');
        document.getElementById(`${tabId}-content`).classList.add('active');
      });
    });

    // Password strength indicator
    const passwordInput = document.getElementById('register-password');
    if (passwordInput) {
      passwordInput.addEventListener('input', function() {
        const strengthMeter = document.querySelector('.strength-meter-fill');
        const strengthText = document.querySelector('.strength-text span');
        const password = this.value;
        let strength = 0;
        
        // Check password length
        if (password.length >= 8) strength += 1;
        if (password.length >= 12) strength += 1;
        
        // Check for mixed case
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
        
        // Check for numbers
        if (password.match(/([0-9])/)) strength += 1;
        
        // Check for special chars
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
        
        // Update UI
        const width = strength * 20;
        strengthMeter.style.width = `${width}%`;
        
        // Update colors and text
        if (strength <= 1) {
          strengthMeter.style.background = '#ef4444';
          strengthText.textContent = 'Weak';
        } else if (strength <= 3) {
          strengthMeter.style.background = '#f59e0b';
          strengthText.textContent = 'Medium';
        } else {
          strengthMeter.style.background = '#10b981';
          strengthText.textContent = 'Strong';
        }
      });
    }

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Add floating animation to feature items
    document.querySelectorAll('.login-feature-item').forEach((item, index) => {
      item.style.animationDelay = `${index * 0.1}s`;
      item.classList.add('floating');
    });

    // Form validation for register form
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
      registerForm.addEventListener('submit', function(e) {
        const password = document.getElementById('register-password').value;
        const confirmPassword = document.getElementById('register-confirm-password').value;
        const terms = document.getElementById('terms').checked;
        
        if (password !== confirmPassword) {
          e.preventDefault();
          alert('Passwords do not match!');
          return false;
        }
        
        if (!terms) {
          e.preventDefault();
          alert('You must agree to the terms and conditions!');
          return false;
        }
        
        return true;
      });
    }
  </script>
</body>
</html>