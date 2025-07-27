<?php
// view_submit.php

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session if needed for admin login checks
// session_start();

// Include your DB connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'contact_db';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT * FROM contact_messages ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submitted Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 30px;
      background-color: #f8f9fa;
    }
    h2 {
      margin-bottom: 20px;
    }
    table {
      background: #fff;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Submitted Contact Messages</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Submitted At</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['subject']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            <td><?= $row['submitted_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <div class="alert alert-warning text-center">No messages submitted yet.</div>
  <?php endif; ?>

</div>

</body>
</html>

<?php $conn->close(); ?>
