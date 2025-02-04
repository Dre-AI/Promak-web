<?php
// Database connection settings
$host = "localhost"; // Change if your database is hosted elsewhere
$username = "root"; // Your phpMyAdmin username (default is "root")
$password = ""; // Your phpMyAdmin password (leave empty if none)
$database = "promak_db"; // Change to your actual database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert data into the database
    $sql = "INSERT INTO inquiries (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Inquiry submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href='index.html';</script>";
    }
}

// Close the connection
$conn->close();
?>


