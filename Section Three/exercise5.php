<!DOCTYPE html><html><head><title>Exercise 5</title></head><body>
<h2>SECTION THREE – EXERCISE 5: Registration Form</h2>
<form method="POST">
Full name: <input type="text" name="name"><br><br>
Email: <input type="email" name="email"><br><br>
Password: <input type="password" name="password"><br><br>
<button name="register">Register</button></form>
<?php
if (isset($_POST['register'])) {
 $name = trim($_POST['name'] ?? ''); $email = trim($_POST['email'] ?? ''); $password = $_POST['password'] ?? '';
 if ($name === '' || $email === '' || $password === '') echo '<p style="color:red">Error: All fields are required!</p>';
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) echo '<p style="color:red">Enter a valid email address.</p>';
 else echo '<p style="color:green">Registration successful!</p>';
}
?></body></html>