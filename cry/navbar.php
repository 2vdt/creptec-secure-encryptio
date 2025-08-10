<?php
session_start(); // Must be at the top before HTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptec</title>
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
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--dark-color) 0%, #16213e 100%) !important;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar:hover {
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
        }
        
        .navbar-brand img {
            transition: transform 0.3s ease;
        }
        
        .navbar-brand:hover img {
            transform: scale(1.05);
        }
        
        .nav-link {
            color: var(--light-color) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--accent-color) !important;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 70%;
        }
        
        .btn-outline-primary {
            color: var(--light-color);
            border-color: var(--accent-color);
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 180, 216, 0.3);
        }
        
        .btn-outline-success {
            color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
        }
        
        .btn-outline-success:hover {
            background: #28a745;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }
        
        .dropdown-menu {
            background: var(--dark-color);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .dropdown-item {
            color: var(--light-color);
            border: 1 px solid orange;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: var(--accent-color);
            color: white;
        }
        
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Animation for the lock icon */
        .fa-lock {
            transition: transform 0.3s ease;
        }
        
        .btn-outline-success:hover .fa-lock {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2 sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="logo1.png" alt="Cryptec Logo" width="160" height="80" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" title="Toggle navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <?php if (isset($_SESSION["user_email"])): ?>
                    <!-- Show full menu when logged in -->
                    <li class="nav-item"><a class="nav-link" href="encrypt.php"><i class="fas fa-lock me-1"></i> Encrypt</a></li>
                    <li class="nav-item"><a class="nav-link" href="decrypt.php"><i class="fas fa-unlock me-1"></i> Decrypt</a></li>
                    <li class="nav-item"><a class="nav-link" href="qrcode.php"><i class="fas fa-qrcode me-1"></i> QR Code</a></li>
                    <li class="nav-item"><a class="nav-link" href="document-encrypt.php"><i class="fas fa-file-alt me-1"></i> Documents</a></li>
                <?php endif; ?>

                <!-- Always show About and Contact -->
                <li class="nav-item"><a class="nav-link" href="about.php"><i class="fas fa-info-circle me-1"></i> About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fas fa-envelope me-1"></i> Contact</a></li>
            </ul>

            <div class="ms-lg-3 mt-3 mt-lg-0">
                <?php if (isset($_SESSION["user_email"])): ?>
                    <!-- Logged in: show Locked dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-outline-success dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-lock me-2"></i> Locked
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Not logged in -->
                    <a href="login.php" class="btn btn-outline-primary px-4"><i class="fas fa-sign-in-alt me-2"></i> Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- Bootstrap JS Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>