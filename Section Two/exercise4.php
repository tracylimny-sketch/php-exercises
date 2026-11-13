<!DOCTYPE html><html><head><title>Exercise 4</title></head><body>
<h2>SECTION TWO – EXERCISE 4: Email Validation</h2>
<form method="POST">Email: <input type="text" name="email" required>
<button name="check">Validate Email</button></form>
<?php
if (isset($_POST['check'])) {
 $email = trim($_POST['email'] ?? '');
 if (filter_var($email, FILTER_VALIDATE_EMAIL)) echo '<p style="color:green">Valid email address!</p>';
 else echo '<p style="color:red">Error: Invalid email address!</p>';
}
?></body></html>