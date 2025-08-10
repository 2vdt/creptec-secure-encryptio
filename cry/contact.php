<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Cryptec Secure Encryption</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cyber-blue: #00f0ff;
            --matrix-green: #00ff41;
            --dark-space: #ffffffff;
            --neon-purple: #bd00ff;
            --electric-pink: #ff00a0;
        }
        
        body {
            font-family: 'Rajdhani', 'Segoe UI', sans-serif;
            background-color: var(--dark-space);
            color: #e0e0e0;
            line-height: 1.8;
            overflow-x: hidden;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap');
        
        /* Cyber Glow Effects */
        .cyber-glow {
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.7);
        }
        
        /* Hero Section */
        .contact-hero {
            background: lightgray;
            padding: 6rem 0 4rem;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 240, 255, 0.2);
            margin-bottom: 3rem;
        }
        
        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(0, 240, 255, 0.15) 0%, transparent 20%),
                radial-gradient(circle at 80% 70%, rgba(189, 0, 255, 0.15) 0%, transparent 20%);
        }
        
        .contact-hero h1 {
            font-weight: 700;
            font-size: 3rem;
            background: linear-gradient(90deg, var(--cyber-blue), var(--neon-purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
        }
        
        /* Contact Form */
        .cyber-form-card {
            background: lightgray;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 240, 255, 0.1);
            border-radius: 8px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(231, 228, 228, 0.3);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 3rem;
        }
        
        .cyber-form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 240, 255, 0.2);
            border-color: rgba(0, 240, 255, 0.3);
        }
        
        .cyber-form-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 240, 255, 0.1);
            background: linear-gradient(90deg, rgba(0, 240, 255, 0.1), rgba(189, 0, 255, 0.1));
        }
        
        .cyber-form-header h2 {
            font-weight: 600;
            margin: 0;
            color: white;
        }
        
        .cyber-form-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--cyber-blue);
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            background-color: rgba(25, 30, 45, 0.7);
            border: 1px solid rgba(0, 240, 255, 0.2);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: rgba(35, 40, 55, 0.7);
            border-color: var(--cyber-blue);
            box-shadow: 0 0 0 0.25rem rgba(0, 240, 255, 0.25);
            color: white;
        }
        
        .form-control::placeholder {
            color: #6c757d;
        }
        
        textarea.form-control {
            min-height: 150px;
        }
        
        .form-check-input {
            background-color: rgba(25, 30, 45, 0.7);
            border: 1px solid rgba(0, 240, 255, 0.2);
        }
        
        .form-check-input:checked {
            background-color: var(--cyber-blue);
            border-color: var(--cyber-blue);
        }
        
        .form-check-label a {
            color: var(--cyber-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .form-check-label a:hover {
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.5);
        }
        
        .btn-cyber {
            background: linear-gradient(90deg, var(--cyber-blue), var(--neon-purple));
            border: none;
            color: black;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-cyber:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 240, 255, 0.4);
        }
        
        /* Contact Info Card */
        .info-card {
            background: rgba(15, 20, 30, 0.7);
            border: 1px solid rgba(0, 240, 255, 0.1);
            border-radius: 8px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
            overflow: hidden;
        }
        
        .info-card-header {
            padding: 1.5rem;
            background: linear-gradient(90deg, rgba(0, 240, 255, 0.1), rgba(189, 0, 255, 0.1));
            border-bottom: 1px solid rgba(0, 240, 255, 0.1);
        }
        
        .info-card-header h3 {
            font-weight: 600;
            margin: 0;
            color: white;
        }
        
        .info-card-body {
            padding: 1.5rem;
        }
        
        .contact-info-item {
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 2.5rem;
        }
        
        .contact-info-item i {
            position: absolute;
            left: 0;
            top: 0.2rem;
            font-size: 1.2rem;
            color: var(--cyber-blue);
        }
        
        .contact-info-item strong {
            display: block;
            color: var(--cyber-blue);
            margin-bottom: 0.3rem;
        }
        
        .contact-info-item a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .contact-info-item a:hover {
            color: var(--cyber-blue);
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.5);
        }
        
        /* FAQ Accordion */
        .cyber-accordion .accordion-item {
            background-color: rgba(25, 30, 45, 0.7);
            border: 1px solid rgba(0, 240, 255, 0.2);
            margin-bottom: 0.75rem;
            border-radius: 6px !important;
            overflow: hidden;
        }
        
        .cyber-accordion .accordion-button {
            background-color: rgba(35, 40, 55, 0.7);
            color: white;
            font-weight: 600;
            padding: 1rem 1.5rem;
            box-shadow: none;
        }
        
        .cyber-accordion .accordion-button:not(.collapsed) {
            background-color: rgba(45, 50, 65, 0.7);
            color: var(--cyber-blue);
        }
        
        .cyber-accordion .accordion-button::after {
            filter: brightness(0) invert(1);
        }
        
        .cyber-accordion .accordion-body {
            background-color: rgba(20, 25, 40, 0.7);
            padding: 1.5rem;
            color: #e0e0e0;
        }
        
        /* Success Message */
        .cyber-alert {
            background: rgba(25, 30, 45, 0.9);
            border: 1px solid var(--matrix-green);
            border-left: 5px solid var(--matrix-green);
            color: white;
            border-radius: 6px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            display: none;
        }
        
        .cyber-alert h4 {
            color: var(--matrix-green);
            margin-bottom: 0.5rem;
        }
        
        /* Footer */
        .cyber-footer {
            background: rgba(10, 15, 25, 0.9);
            padding: 3rem 0;
            margin-top: 5rem;
            border-top: 1px solid rgba(0, 240, 255, 0.1);
            position: relative;
        }
        
        .cyber-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(0, 240, 255, 0.05) 0%, transparent 30%),
                radial-gradient(circle at 90% 80%, rgba(189, 0, 255, 0.05) 0%, transparent 30%);
        }
        
        .cyber-footer a {
            color: #b0b0b0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .cyber-footer a:hover {
            color: var(--cyber-blue);
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.5);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .contact-hero h1 {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .contact-hero {
                padding: 5rem 0 3rem;
                text-align: center;
            }
            
            .cyber-form-body, .info-card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="cyber-glow">CONTACT CRYPTEC</h1>
                    <p class="lead">Secure communication starts here. Our team is ready to assist with your encryption needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Contact Form -->
                <div class="cyber-form-card">
                    <div class="cyber-form-header">
                        <h2><i class="fas fa-paper-plane me-2"></i> SEND US A SECURE MESSAGE</h2>
                    </div>
                    <div class="cyber-form-body">
                        <form id="contactForm">
                            <div class="mb-4">
                                <label for="name" class="form-label">YOUR NAME</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">EMAIL ADDRESS</label>
                                <input type="email" class="form-control" id="email" placeholder="your@email.com" required>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="form-label">SUBJECT</label>
                                <select class="form-select" id="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="support">Technical Support</option>
                                    <option value="feedback">Product Feedback</option>
                                    <option value="business">Business Partnership</option>
                                    <option value="security">Security Concern</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label">MESSAGE</label>
                                <textarea class="form-control" id="message" rows="6" placeholder="Type your secure message here..." required></textarea>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="privacyCheck" required>
                                <label class="form-check-label" for="privacyCheck">I agree to the <a href="privacy.html">Privacy Policy</a> and understand this message will be encrypted</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-cyber btn-lg">
                                    <i class="fas fa-lock me-2"></i> SEND SECURE MESSAGE
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Success Message -->
                <div class="cyber-alert" id="successMessage">
                    <h4><i class="fas fa-check-circle me-2"></i> MESSAGE ENCRYPTED AND SENT!</h4>
                    <p>Your secure message has been transmitted. Our team will respond within 24 hours. For urgent security matters, please include "URGENT" in your subject line.</p>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-light" id="sendAnother">
                            <i class="fas fa-undo me-1"></i> Send Another Message
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Contact Information -->
                <div class="info-card">
                    <div class="info-card-header">
                        <h3><i class="fas fa-shield-alt me-2"></i> SECURE CONTACT INFO</h3>
                    </div>
                    <div class="info-card-body">
                        <div class="contact-info-item">
                            <i class="fas fa-envelope"></i>
                            <strong>GENERAL INQUIRIES</strong>
                            <a href="mailto:info@cryptec.com">info@cryptec.com</a>
                        </div>
                        
                        <div class="contact-info-item">
                            <i class="fas fa-life-ring"></i>
                            <strong>TECHNICAL SUPPORT</strong>
                            <a href="mailto:support@cryptec.com">support@cryptec.com</a>
                        </div>
                        
                        <div class="contact-info-item">
                            <i class="fas fa-handshake"></i>
                            <strong>BUSINESS INQUIRIES</strong>
                            <a href="mailto:business@cryptec.com">business@cryptec.com</a>
                        </div>
                        
                        <div class="contact-info-item">
                            <i class="fas fa-clock"></i>
                            <strong>OFFICE HOURS</strong>
                            <span>Monday-Friday: 9AM-5PM EST</span>
                        </div>
                    </div>
                </div>
                
                <!-- FAQ -->
                <div class="info-card">
                    <div class="info-card-header">
                        <h3><i class="fas fa-question-circle me-2"></i> SECURITY FAQ</h3>
                    </div>
                    <div class="info-card-body">
                        <div class="accordion cyber-accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        <i class="fas fa-lock me-2"></i> Is my contact information secure?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        All messages are encrypted before transmission using AES-256 encryption. We store minimal contact data and never share it with third parties.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        <i class="fas fa-clock me-2"></i> What's your response time?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We typically respond within 24 hours for general inquiries. Technical support requests are prioritized and usually answered within 4-6 hours during business days.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        <i class="fas fa-bug me-2"></i> How to report a security vulnerability?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        If you've discovered a security vulnerability, please email <strong>security@cryptec.com</strong> with details. Our security team will respond immediately to valid reports.
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
    <footer class="cyber-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>© 2025 CRYPTEC SECURE SYSTEMS | All rights reserved</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="privacy.php" class="me-3">PRIVACY POLICY</a>
                    <a href="terms.php" class="me-3">TERMS OF SERVICE</a>
                    <a href="security.php">SECURITY CENTER</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form submission handler
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            document.getElementById('contactForm').classList.add('d-none');
            document.getElementById('successMessage').style.display = 'block';
            
            // Scroll to success message
            document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth' });
        });
        
        // Send another message button
        document.getElementById('sendAnother').addEventListener('click', function() {
            document.getElementById('contactForm').classList.remove('d-none');
            document.getElementById('contactForm').reset();
            document.getElementById('successMessage').style.display = 'none';
        });
        
        // Add subtle glow animation to form header
        const formHeader = document.querySelector('.cyber-form-header');
        setInterval(() => {
            const intensity = Math.random() * 0.3 + 0.7;
            formHeader.style.boxShadow = `0 0 20px rgba(0, 240, 255, ${intensity * 0.3})`;
        }, 1000);
    </script>
</body>
</html>