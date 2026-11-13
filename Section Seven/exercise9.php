<?php
// SECTION SEVEN – EXERCISE 9: Display all students.
require_once __DIR__ . '/../db_connection.php';
$result = $conn->query('SELECT * FROM students ORDER BY id');
function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html><html><head><title>Exercise 9</title></head><body>
<h2>Registered Students</h2>
<table border="1" cellpadding="8"><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Telephone</th><th>Registration Date</th></tr>
<?php if ($result && $result->num_rows > 0): while ($row = $result->fetch_assoc()): ?>
<tr><td><?= h($row['id']) ?></td><td><?= h($row['full_name']) ?></td><td><?= h($row['email']) ?></td><td><?= h($row['telephone'] ?? '') ?></td><td><?= h($row['registration_date']) ?></td></tr>
<?php endwhile; else: ?><tr><td colspan="5">No students found.</td></tr><?php endif; ?>
</table></body></html><?php $conn->close(); ?>