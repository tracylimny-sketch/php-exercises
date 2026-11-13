<?php
// SECTION FIVE – EXERCISE 7: Create the students table.
require_once __DIR__ . '/../db_connection.php';
$sql = "CREATE TABLE IF NOT EXISTS students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 full_name VARCHAR(100) NOT NULL,
 email VARCHAR(100) NOT NULL,
 telephone VARCHAR(20),
 registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql)) echo '<h2>Students table created successfully (or already exists).</h2>';
else echo 'Error: ' . htmlspecialchars($conn->error);
$conn->close();
?>