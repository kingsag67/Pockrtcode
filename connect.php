<?php
$servername = "localhost";   // From InfinityFree panel
$username = "root";                // From panel
$password = "";           // From "Change Password"
$dbname   = "user_auth";      // Your database name

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>
