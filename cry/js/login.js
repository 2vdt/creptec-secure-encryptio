document.addEventListener("DOMContentLoaded", () => {
  // Tab switching functionality
  const loginTab = document.querySelector('.login-tab[data-tab="login"]')
  const registerTab = document.querySelector('.login-tab[data-tab="register"]')
  const loginContent = document.getElementById("login-content")
  const registerContent = document.getElementById("register-content")

  loginTab.addEventListener("click", () => {
    loginTab.classList.add("active")
    registerTab.classList.remove("active")
    loginContent.classList.add("active")
    registerContent.classList.remove("active")
  })

  registerTab.addEventListener("click", () => {
    registerTab.classList.add("active")
    loginTab.classList.remove("active")
    registerContent.classList.add("active")
    loginContent.classList.remove("active")
  })

  // Password strength meter
  const passwordInput = document.getElementById("register-password")
  const strengthMeter = document.querySelector(".strength-meter-fill")
  const strengthText = document.querySelector(".strength-text span")

  passwordInput.addEventListener("input", () => {
    const password = passwordInput.value
    const strength = calculatePasswordStrength(password)

    strengthMeter.setAttribute("data-strength", strength)

    switch (strength) {
      case 0:
        strengthText.textContent = "Weak"
        strengthText.style.color = "#ef4444"
        break
      case 1:
        strengthText.textContent = "Weak"
        strengthText.style.color = "#ef4444"
        break
      case 2:
        strengthText.textContent = "Medium"
        strengthText.style.color = "#f59e0b"
        break
      case 3:
        strengthText.textContent = "Strong"
        strengthText.style.color = "#10b981"
        break
      case 4:
        strengthText.textContent = "Very Strong"
        strengthText.style.color = "#10b981"
        break
    }
  })

  // Calculate password strength
  function calculatePasswordStrength(password) {
    let strength = 0

    // Length check
    if (password.length >= 8) {
      strength += 1
    }

    // Contains lowercase letters
    if (/[a-z]/.test(password)) {
      strength += 1
    }

    // Contains uppercase letters and numbers
    if (/[A-Z]/.test(password) && /[0-9]/.test(password)) {
      strength += 1
    }

    // Contains special characters
    if (/[^A-Za-z0-9]/.test(password)) {
      strength += 1
    }

    return strength
  }

  // Form submission
  const loginForm = document.getElementById("login-form")
  // const registerForm = document.getElementById("register-form")

  // loginForm.addEventListener("submit", (e) => {
  //   e.preventDefault()

  //   // Get form data
  //   const email = document.getElementById("login-email").value
  //   const password = document.getElementById("login-password").value
  //   const rememberMe = document.getElementById("remember-me").checked

  //   // Here you would typically send this data to your server for authentication
  //   console.log("Login form submitted:", { email, password, rememberMe })

  //   // For demo purposes, simulate a successful login
  //   alert("Login successful! Redirecting to dashboard...")
  //   // window.location.href = "dashboard.html"
  // })

  
})
