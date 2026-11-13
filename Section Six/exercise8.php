<!DOCTYPE html><html><head><title>Exercise 8</title></head><body>
<h2>SECTION SIX – EXERCISE 8: Insert a Student</h2>
<form method="POST">
Student name: <input type="text" name="full_name" required><br><br>
Email: <input type="email" name="email" required><br><br>
<button name="save">Save Student</button></form>
<?php
require_once __DIR__ . '/../db_connection.php';
if (isset($_POST['save'])) {
 $name = trim($_POST['full_name'] ?? ''); $email = trim($_POST['email'] ?? '');
 if ($name === '' || $email === '') echo 'Please fill in all fields.';
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) echo 'Enter a valid email.';
 else {
  $stmt = $conn->prepare('INSERT INTO students (full_name, email) VALUES (?, ?)');
  $stmt->bind_param('ss', $name, $email);
  if ($stmt->execute()) echo '<p style="color:green">Student registered successfully!</p>';
  else echo 'Error: ' . htmlspecialchars($stmt->error);
  $stmt->close();
 }
}
$conn->close();
?></body></html>