<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php'; // ✅ Connects to database

// ✅ Check if the `users` table exists
$result = $conn->query("SHOW TABLES");
$tableExists = false;
while ($row = $result->fetch_array()) {
    if ($row[0] === 'users') {
        $tableExists = true;
    }
}

if (!$tableExists) {
    die("❌ ERROR: 'users' table not found in the database.");
}

// ✅ Handle Sign Up
if (isset($_POST['signUp'])) {
    $firstName = trim($_POST['fname']);
    $lastName  = trim($_POST['lname']);
    $email     = trim($_POST['email']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$stmt) {
        die("❌ Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p style='color:red;'>❌ Email already exists!</p>";
    } else {
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("❌ Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
        if ($stmt->execute()) {
            $_SESSION['email'] = $email; // Optional: log in after register
            echo "<p style='color:green;'>✅ Registered successfully!</p>";
        } else {
            echo "❌ Insert Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

// ✅ Handle Sign In
if (isset($_POST['signIn'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    if (!$stmt) {
        die("❌ Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            echo "<p style='color:red;'>❌ Incorrect password.</p>";
        }
    } else {
        echo "<p style='color:red;'>❌ Email not found.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
