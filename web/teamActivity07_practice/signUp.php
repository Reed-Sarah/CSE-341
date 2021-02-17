<h1>Sign Up</h1>
<form method="post" action="index.php">
<label>Username:</label><br>
<input name="username" type=text><br>
<label>Password:</label>
<input name="password" type="password" pattern="[a-zA-Z\d\!@#\$%&\*]{7,}">
<button type="submit">Sign Up</button>
<input type="hidden" name="action" value="signUp">
</form>