document.addEventListener("DOMContentLoaded", () => {
  const contactForm = document.getElementById("contactForm")
  const successMessage = document.getElementById("successMessage")

  if (contactForm) {
    contactForm.addEventListener("submit", (e) => {
      e.preventDefault()

      // Get form values
      const name = document.getElementById("name").value
      const email = document.getElementById("email").value
      const subject = document.getElementById("subject").value
      const message = document.getElementById("message").value

      // In a real application, you would send this data to a server
      // For this demo, we'll just simulate a successful submission

      // Show loading state
      const submitButton = contactForm.querySelector('button[type="submit"]')
      const originalButtonText = submitButton.innerHTML
      submitButton.disabled = true
      submitButton.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Sending...
            `

      // Simulate server request
      setTimeout(() => {
        // Hide the form and show success message
        contactForm.reset()
        contactForm.parentElement.parentElement.style.display = "none"
        successMessage.style.display = "block"

        // Reset button state
        submitButton.disabled = false
        submitButton.innerHTML = originalButtonText

        // Scroll to success message
        successMessage.scrollIntoView({ behavior: "smooth" })
      }, 1500)
    })
  }
})
