<!DOCTYPE html><html><head><title>Exercise 10</title></head><body>
<h2>SECTION EIGHT – EXERCISE 10: Search Student by ID</h2>
<form method="POST">Student ID: <input type="number" name="student_id" min="1" required>
<button name="search">Search Student</button></form>
<?php
require_once __DIR__ . '/../db_connection.php';
function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
if (isset($_POST['search'])) {
 $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
 if ($id === false || $id === null || $id < 1) echo 'Enter a valid ID.';
 else {
  $stmt = $conn->prepare('SELECT * FROM students WHERE id = ?');
  $stmt->bind_param('i', $id); $stmt->execute(); $result = $stmt->get_result();
  if ($student = $result->fetch_assoc()) {
   echo '<h3>Student Information</h3>';
   echo '<p>ID: ' . h($student['id']) . '</p><p>Full Name: ' . h($student['full_name']) . '</p><p>Email: ' . h($student['email']) . '</p><p>Telephone: ' . h($student['telephone'] ?? '') . '</p><p>Registration Date: ' . h($student['registration_date']) . '</p>';
  } else echo '<p style="color:red">No student found with this ID!</p>';
  $stmt->close();
 }
}
$conn->close();
?></body></html>