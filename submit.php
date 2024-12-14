<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data to prevent XSS attacks
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        echo "<h2 style='color: red;'>All fields are required!</h2>";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h2 style='color: red;'>Invalid email format!</h2>";
        exit;
    }

    // Validate phone number
    if (!preg_match('/^\d{10}$/', $phone)) {
        echo "<h2 style='color: red;'>Phone number must be exactly 10 digits!</h2>";
        exit;
    }

    // Display submitted data
    echo "<h1>Registration Successful!</h1>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Password:</strong> " . str_repeat("*", strlen($password)) . "</p>"; // Mask the password
} else {
    echo "<h2 style='color: red;'>Invalid request method!</h2>";
}
?>
