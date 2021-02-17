<h1>Sign Up</h1>
<form method="post" action="index.php">
<label>Username:</label><br>
<input required name="username" type=text><br>
<label>Password:</label><br>
<input required name="password" type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"><br>
<button type="submit">Sign Up</button>
<input type="hidden" name="action" value="signUp">
</form>