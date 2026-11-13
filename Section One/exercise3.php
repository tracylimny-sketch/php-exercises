<!DOCTYPE html><html><head><title>Exercise 3</title></head><body>
<h2>SECTION ONE – EXERCISE 3: Add Two Numbers</h2>
<form method="POST">
First number: <input type="number" step="any" name="num1" required><br><br>
Second number: <input type="number" step="any" name="num2" required><br><br>
<button name="calculate">Calculate Sum</button>
</form>
<?php
if (isset($_POST['calculate'])) {
 $a = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
 $b = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
 if ($a === false || $a === null || $b === false || $b === null) echo 'Enter valid numbers.';
 else echo '<h3>Sum: ' . htmlspecialchars((string)($a + $b)) . '</h3>';
}
?></body></html>