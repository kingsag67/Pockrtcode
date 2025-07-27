<?php
// Enable detailed error reporting (REMOVE these lines in a production environment for security)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$host = 'localhost';
$user = 'root'; // Your actual database username
$password = ''; // Your actual database password
$dbname = 'contact_db'; // Your actual database name

// Establish database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, display error and stop script execution
    die("Database Connection failed: " . $conn->connect_error);
}

// Handle form submission only if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape all incoming POST data to prevent SQL injection
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $phone   = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // SQL INSERT query to add data to the 'contact_messages' table
    // Ensure the table and column names exactly match your database schema
    $sql = "INSERT INTO contact_messages (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If query is successful, redirect to view_submitted.php
        header("Location: view_submitted.php");
        exit(); // Always exit after a header redirect
    } else {
        // If query fails, display the SQL error
        echo "Error executing query: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>