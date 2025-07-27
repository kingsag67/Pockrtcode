<?php
session_start();
include 'connect.php';

// ✅ Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: join.php");
    exit();
}

// ✅ Get parameters from URL
if (isset($_GET['type'], $_GET['name'], $_GET['url'])) {
    $email = $_SESSION['email'];
    $type = $_GET['type'];    // 'tutorial' or 'course'
    $name = $_GET['name'];    // title
    $url = $_GET['url'];      // actual link

    // ✅ Sanity check on URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo "Invalid URL.";
        exit();
    }

    // ✅ Insert into learning_activity table
    $stmt = $conn->prepare("INSERT INTO learning_activity (user_email, content_type, content_title, view_time) VALUES (?, ?, ?, NOW())");
    if ($stmt === false) {
        echo "Prepare failed: " . $conn->error;
        exit();
    }

    $stmt->bind_param("sss", $email, $type, $name);
    if (!$stmt->execute()) {
        echo "Execute failed: " . $stmt->error;
        $stmt->close();
        exit();
    }

    $stmt->close();

    // ✅ Redirect to original content
    header("Location: $url");
    exit();

} else {
    echo "Missing parameters.";
    exit();
}
?>
