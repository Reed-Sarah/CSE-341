<h1>Sign Up</h1>
<?php
if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
?>
<form method="post" action="index.php">
<label>Username:</label><br>
<input required name="username" type=text><br>
<label>Password:</label><br>
<input required name="password" type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$"><br>
<button type="submit">Sign Up</button>
<input type="hidden" name="action" value="signUp">
</form><?php unset($_SESSION['message'])
?>