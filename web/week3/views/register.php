<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors template</title>
    <link rel="stylesheet" href="../css/styles.css" media="screen">
    <!-- <link rel="stylesheet" href="../css/account.css" media="screen"> -->

</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/header.php'; ?> 
<nav>
<?php echo $navList; ?>
 </nav>
<main>
    <h1>Register</h1>
    <div class="formFields">
    

    <?php
if (isset($message)) {
 echo $message;
}
?>

        <form method="post" action="/week3/accounts/index.php">
       <p>All fields are required<p>     
        <label>First Name:</label><br>
            <input required type="text" placeholder="First Name" name="clientFirstname" id="fname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>><br>
            <label>Last Name:</label><br>
            <input required type="text" placeholder="Last Name" name="clientLastname" id="lname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> ><br>
            <label>Email Address:</label><br>
            <input required type="email" name="clientEmail" id="email" placeholder="Email Address"  <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> > <br>
            <label>Password:</label><br>
            <span>must be at least 8 characters and contain at least 1 uppercase character, 1 number and 1 special character </span>
            <input required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" name="clientPassword" id="password" placeholder=Password>
          
    <button>Create Account</button>
    <input type="hidden" name="action" value="createAccount">
</form>
 </div>        
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 
</body>

</html>