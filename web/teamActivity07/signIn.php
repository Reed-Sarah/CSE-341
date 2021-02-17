<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Activity 07 </title>
    <link rel="stylesheet" href="styles.css" media="screen">
</head>
<body>
<h1>Sign In</h1>
<?php
if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
?>
<form method="post" action="index.php">
<label>Username:</label><br>
<input name="username" type=text><br>
<label>Password:</label>
<input name="password" type="password">
<button type="submit">Sign In</button>
<input type="hidden" name="action" value="signIn">
</form>
<a href="signUp.php">Don't have an account? Sign up Today!</a>
</body></html><?php unset($_SESSION['message'])
?>