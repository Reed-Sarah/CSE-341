<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Activity 07 </title>
    <link rel="stylesheet" href="styles.css" media="screen">
</head>
<body>
<h1>Sign Up</h1>
<?php
if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
?>
<form method="post" action="index.php">
<label>Username:</label><br>
<input name="username" type=text><br>
<label>Password:</label><br>
<?php if (isset($mark)) {
        echo "<span class='notice'>*</span>";
       }?><input name="password" type="password"><br>
<label>Re-enter Password:</label><br>
<?php if (isset($mark)) {
        echo "<span class='notice'>*</span>";
       }?><input name="password2" type="password"><br>
<button type="submit">Sign Up</button>
<input type="hidden" name="action" value="signUp">
</form>
<script src="main.js"></script>
</body></html><?php unset($_SESSION['message'])
?>