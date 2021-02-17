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
<input required name="username" type=text><br>
<label> <?php if(isset($mark)){echo $mark;}?>Password:</label><br>
<input required name="password" type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$"><br>
<label><?php if(isset($mark)){echo $mark;}?>re-enter Password:</label><br>
<input required name="password2" type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$"><br>
<button type="submit">Sign Up</button>
<input type="hidden" name="action" value="signUp">
</form>
</body></html><?php unset($_SESSION['message'])
?>