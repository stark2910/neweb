<?php
// Database configuration
$servername = "localhost"; // Database host (usually localhost)
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO leads (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    // Send Email
    $to = "zarasanika69@gmail.com";
    $subject = "New Lead Received";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
    $headers = "From: no-reply@yourdomain.com";

    mail($to, $subject, $body, $headers);

    echo "Thank you! We have received your message.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
