<?php
session_start();
include "DB_connection.php"; // Make sure DB_connection.php connects correctly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Input validation
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=empty_fields");
        exit();
    }

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check password
        if ($password === $user["password"]) {
            // Password correct
            // $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_name"] = $user["name"];

            header("Location: index.php");
            exit();
        } else {
            // Wrong password
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    } else {
        // Email not found
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}
?>
