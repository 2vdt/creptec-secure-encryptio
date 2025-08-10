<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Cryptec Secure Encryption</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cyber-blue: #00f0ff;
            --matrix-green: #00ff41;
            --dark-space: #f5f6f8ff;
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
        
        .neon-glow {
            text-shadow: 0 0 10px rgba(189, 0, 255, 0.7);
        }
        
        /* Hero Section */
        .cyber-hero {
            background: lightgray;
            padding: 8rem 0 6rem;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 240, 255, 0.2);
        }
        
        .cyber-hero::before {
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
        
        .cyber-hero h1 {
            font-weight: 700;
            font-size: 3.5rem;
            background: linear-gradient(90deg, var(--cyber-blue), var(--neon-purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1.5rem;
        }
        
        .cyber-hero p {
            font-size: 1.3rem;
            color: #b0b0b0;
            max-width: 700px;
            margin: 0 auto 2rem;
        }
        
        /* Content Section */
        .cyber-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .cyber-card {
            background: rgba(15, 20, 30, 0.7);
            border: 1px solid rgba(0, 240, 255, 0.1);
            border-radius: 8px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .cyber-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 240, 255, 0.05) 0%, rgba(189, 0, 255, 0.05) 100%);
            z-index: -1;
        }
        
        .cyber-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 240, 255, 0.2);
            border-color: rgba(0, 240, 255, 0.3);
        }
        
        .cyber-card-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(0, 240, 255, 0.1);
            position: relative;
        }
        
        .cyber-card-header h2 {
            font-weight: 600;
            font-size: 1.8rem;
            color: var(--cyber-blue);
            margin: 0;
        }
        
        .cyber-card-body {
            padding: 2rem;
        }
        
        /* Feature Cards */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .feature-item {
            background: rgba(20, 25, 40, 0.7);
            border: 1px solid rgba(0, 240, 255, 0.1);
            border-radius: 8px;
            padding: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-item::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(0, 240, 255, 0.1) 0%,
                rgba(189, 0, 255, 0.1) 50%,
                rgba(0, 240, 255, 0.1) 100%
            );
            transform: rotate(30deg);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 240, 255, 0.2);
            border-color: rgba(0, 240, 255, 0.3);
        }
        
        .feature-item:hover::before {
            opacity: 1;
            animation: shine 3s infinite;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--cyber-blue), var(--neon-purple));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .feature-item h3 {
            font-weight: 600;
            color: white;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        
        /* Table Styling */
        .cyber-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 2rem 0;
        }
        
        .cyber-table thead th {
            background: linear-gradient(90deg, rgba(0, 240, 255, 0.2), rgba(189, 0, 255, 0.2));
            color: white;
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            text-align: left;
            border: none;
        }
        
        .cyber-table tbody tr {
            background: rgba(25, 30, 45, 0.7);
            transition: all 0.3s ease;
        }
        
        .cyber-table tbody tr:nth-child(even) {
            background: rgba(30, 35, 50, 0.7);
        }
        
        .cyber-table tbody tr:hover {
            background: rgba(40, 45, 60, 0.9);
            transform: translateX(5px);
        }
        
        .cyber-table td {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(0, 240, 255, 0.1);
        }
        
        /* Badges */
        .cyber-badge {
            display: inline-block;
            padding: 0.35rem 0.8rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .badge-high {
            background: rgba(0, 255, 65, 0.2);
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
        }
        
        .badge-veryhigh {
            background: rgba(0, 240, 255, 0.2);
            color: var(--cyber-blue);
            border: 1px solid var(--cyber-blue);
        }
        
        .badge-medium {
            background: rgba(255, 0, 160, 0.2);
            color: var(--electric-pink);
            border: 1px solid var(--electric-pink);
        }
        
        /* List Styling */
        .cyber-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }
        
        .cyber-list li {
            padding: 0.8rem 0;
            padding-left: 2.5rem;
            position: relative;
            border-bottom: 1px solid rgba(0, 240, 255, 0.1);
        }
        
        .cyber-list li::before {
            content: '>';
            position: absolute;
            left: 0;
            color: var(--cyber-blue);
            font-weight: bold;
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
        
        /* Animations */
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-10%, -10%); }
            100% { transform: rotate(30deg) translate(10%, 10%); }
        }
        
        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .cyber-hero h1 {
                font-size: 2.8rem;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .cyber-hero {
                padding: 6rem 0 4rem;
            }
            
            .cyber-hero h1 {
                font-size: 2.2rem;
            }
            
            .cyber-hero p {
                font-size: 1.1rem;
            }
            
            .cyber-card-header, .cyber-card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Cyber Hero Section -->
    <section class="cyber-hero text-center">
        <div class="cyber-container">
            <h1 class="cyber-glow">ABOUT CRYPTEC</h1>
            <p>Where cutting-edge encryption meets uncompromising security in the digital frontier</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="encrypt.php" class="btn btn-outline-light btn-lg px-4 border-2">Start Encrypting</a>
                <a href="contact.php" class="btn btn-lg px-4" style="
                    background: linear-gradient(90deg, var(--cyber-blue), var(--neon-purple));
                    color: black;
                    font-weight: 600;
                    border: none;
                ">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="cyber-container">
        <!-- Mission Card -->
        <div class="cyber-card">
            <div class="cyber-card-header">
                <h2><i class="fas fa-bullseye me-2"></i> OUR MISSION</h2>
            </div>
            <div class="cyber-card-body">
                <p>In an era where data breaches are commonplace, Cryptec stands as a digital fortress. We're not just another encryption service - we're a movement dedicated to reclaiming digital privacy through military-grade security accessible to everyone.</p>
                <p>Our mission is to democratize encryption technology, making what was once exclusive to governments and corporations available to individuals, activists, journalists, and businesses of all sizes.</p>
            </div>
        </div>

        <!-- How It Works -->
        <div class="cyber-card">
            <div class="cyber-card-header">
                <h2><i class="fas fa-cogs me-2"></i> HOW IT WORKS</h2>
            </div>
            <div class="cyber-card-body">
                <p>Cryptec's architecture is designed with one principle: your data should never be vulnerable, not even to us. That's why we've built a system where encryption happens entirely in your browser before anything leaves your device.</p>
                
                <div class="feature-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3>Zero-Knowledge Architecture</h3>
                        <p>We never see your data or encryption keys. The entire process happens client-side with JavaScript that you can inspect yourself.</p>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-lock-open"></i>
                        </div>
                        <h3>Transparent Algorithms</h3>
                        <p>We use only publicly vetted, open-source encryption standards that have withstood decades of cryptanalysis.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Encryption Algorithms -->
        <div class="cyber-card">
            <div class="cyber-card-header">
                <h2><i class="fas fa-key me-2"></i> ENCRYPTION ALGORITHMS</h2>
            </div>
            <div class="cyber-card-body">
                <p>We offer multiple encryption standards to suit different security needs and performance requirements:</p>
                
                <table class="cyber-table">
                    <thead>
                        <tr>
                            <th>Algorithm</th>
                            <th>Key Size</th>
                            <th>Security Level</th>
                            <th>Best For</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>AES-256</strong></td>
                            <td>256-bit</td>
                            <td><span class="cyber-badge badge-veryhigh">Very High</span></td>
                            <td>Government secrets, financial data, medical records</td>
                        </tr>
                        <tr>
                            <td><strong>Serpent</strong></td>
                            <td>256-bit</td>
                            <td><span class="cyber-badge badge-veryhigh">Very High</span></td>
                            <td>Extreme security requirements</td>
                        </tr>
                        <tr>
                            <td><strong>Twofish</strong></td>
                            <td>256-bit</td>
                            <td><span class="cyber-badge badge-high">High</span></td>
                            <td>Balanced security and performance</td>
                        </tr>
                        <tr>
                            <td><strong>ChaCha20</strong></td>
                            <td>256-bit</td>
                            <td><span class="cyber-badge badge-high">High</span></td>
                            <td>Mobile devices, real-time encryption</td>
                        </tr>
                        <tr>
                            <td><strong>Triple DES</strong></td>
                            <td>168-bit</td>
                            <td><span class="cyber-badge badge-medium">Medium</span></td>
                            <td>Legacy system compatibility</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Privacy Commitment -->
        <div class="cyber-card">
            <div class="cyber-card-header">
                <h2><i class="fas fa-fingerprint me-2"></i> PRIVACY COMMITMENT</h2>
            </div>
            <div class="cyber-card-body">
                <p>Our business model is simple: we protect your data, not exploit it. Unlike many "free" services, we'll never monetize your information.</p>
                
                <ul class="cyber-list">
                    <li><strong>No data storage:</strong> We don't store your files, encrypted or otherwise</li>
                    <li><strong>No tracking:</strong> We don't log your encryption activities</li>
                    <li><strong>No backdoors:</strong> We can't decrypt your data even if compelled</li>
                    <li><strong>Transparent code:</strong> Our JavaScript is minified but not obfuscated</li>
                    <li><strong>Regular audits:</strong> We subject our systems to independent security reviews</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cyber Footer -->
    <footer class="cyber-footer">
        <div class="cyber-container">
            <div class="row">
                <div class="col-md-6">
                    <p>© 2025 CRYPTEC SYSTEMS | All rights reserved</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="privacy.php" class="me-3">PRIVACY POLICY</a>
                    <a href="terms.php" class="me-3">TERMS OF SERVICE</a>
                    <a href="contact.php">CONTACT</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add subtle animation to feature items
        document.querySelectorAll('.feature-item').forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = `all 0.5s ease ${index * 0.1}s`;
            
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 100);
        });
        
        // Add pulse animation to hero text
        const heroText = document.querySelector('.cyber-hero h1');
        setInterval(() => {
            heroText.style.textShadow = `0 0 15px rgba(0, 240, 255, ${Math.random() * 0.5 + 0.5})`;
        }, 1000);
    </script>
    <script src="./js/main.js"></script>
</body>
</html>