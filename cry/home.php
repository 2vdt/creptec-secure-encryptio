<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptec - Secure Encryption Solutions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #2e59d9;
            --dark-color: #1a1a2e;
            --light-color: #f8f9fa;
            --accent-color: #00b4d8;
            --gradient-start: #16213e;
            --gradient-end: #1a1a2e;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
            opacity: 0.4;
        }
        
        .hero h1 {
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            position: relative;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero p {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        .hero .btn {
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease 0.4s both;
        }
        
        .hero .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.3);
        }
        
        .hero .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 180, 216, 0.4);
            background-color: #00a3c4;
        }
        
        .hero .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .hero img {
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transform: perspective(1000px) rotateY(-10deg);
            transition: all 0.5s ease;
            animation: fadeInRight 0.8s ease 0.4s both;
        }
        
        .hero img:hover {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        /* Features Section */
        .features {
            padding: 6rem 0;
            background-color: #f9fbfd;
        }
        
        .features h2 {
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }
        
        .features h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 3px;
        }
        
        .card {
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
            border: none;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1.5rem;
            transition: all 0.3s ease;
        }
        
        .card:hover .feature-icon {
            background: var(--accent-color) !important;
            transform: scale(1.1);
        }
        
        .card h3 {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .card .btn-outline-primary {
            border-color: var(--accent-color);
            color: var(--accent-color);
        }
        
        .card .btn-outline-primary:hover {
            background: var(--accent-color);
            color: white;
        }
        
        /* CTA Section */
        .cta {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            color: white;
        }
        
        .cta h2 {
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta .lead {
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        .cta .btn {
            font-weight: 600;
            padding: 0.75rem 2.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .cta .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.3);
        }
        
        .cta .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 180, 216, 0.4);
            background-color: #00a3c4;
        }
        
        /* Footer */
        footer {
            background: var(--dark-color);
            padding: 3rem 0;
        }
        
        footer a {
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: var(--accent-color) !important;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero {
                text-align: center;
                padding: 4rem 0;
            }
            
            .hero img {
                margin-top: 3rem;
                max-width: 80%;
            }
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .features {
                padding: 4rem 0;
            }
        }
    </style>
</head>
<body>

    <header class="hero py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-white">Secure Your Data with Cryptec</h1>
                    <p class="lead text-white-50 mb-4">Advanced encryption tools to protect your sensitive information with military-grade security algorithms.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="encrypt.php" class="btn btn-primary btn-lg px-4 me-md-2">Start Encrypting</a>
                        <a href="about.php" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="lock-img.png" alt="Cryptec Secure Encryptor" class="img-fluid">
                </div>
            </div>
        </div>
    </header>

    <section class="features py-5">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose Cryptec?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h3 class="fs-4">Military-Grade Encryption</h3>
                            <p class="text-muted">Using AES-256 and other advanced algorithms to ensure your data remains secure.</p>
                            <a href="about.php" class="btn btn-outline-primary mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3 class="fs-4">Client-Side Processing</h3>
                            <p class="text-muted">All encryption happens in your browser. Your data never leaves your device.</p>
                            <a href="about.php" class="btn btn-outline-primary mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                                <i class="fas fa-key"></i>
                            </div>
                            <h3 class="fs-4">Multiple Algorithms</h3>
                            <p class="text-muted">Choose from various encryption methods to suit your specific security needs.</p>
                            <a href="about.php" class="btn btn-outline-primary mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3 class="fs-4">Document Encryption</h3>
                            <p class="text-muted">Protect sensitive PDFs, images, and Office documents with password encryption.</p>
                            <a href="document-encrypt.php" class="btn btn-outline-primary mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <h3 class="fs-4">QR Code Generator</h3>
                            <p class="text-muted">Create and scan encrypted QR codes to securely share information.</p>
                            <a href="qrcode.php" class="btn btn-outline-primary mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3">
                                <i class="fas fa-cloud-download-alt"></i>
                            </div>
                            <h3 class="fs-4">Cloud Integration</h3>
                            <p class="text-muted">Securely encrypt files before uploading them to cloud storage services.</p>
                            <a href="about.php" class="btn btn-outline-primary mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta py-5">
        <div class="container text-center">
            <h2 class="mb-3">Ready to secure your data?</h2>
            <p class="lead mb-4">Start encrypting your sensitive information today with our easy-to-use tools.</p>
            <a href="login.php" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 Cryptec. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="privacy.php" class="text-white me-3">Privacy Policy</a>
                    <a href="terms.php" class="text-white me-3">Terms of Service</a>
                    <a href="contact.php" class="text-white">Contact Us</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
        // Simple animation trigger
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            cards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>