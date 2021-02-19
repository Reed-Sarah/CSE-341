<?php
if (!isset($_SESSION['loggedin'])) {
    header('location: /week3/');
    exit;
}
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
   ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarah's Boutique</title>
    <link rel="stylesheet" href="../css/styles.css" media="screen">
    <!-- <link rel="stylesheet" href="../css/account.css" media="screen"> -->

</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/header.php'; ?> 

<main>
    <h2>Update Account Info</h2>
    <div class="center">
    <?php
if (isset($message)) { 
    echo $message; 
   }
?>
    <form method="post" action="/week3/accounts/index.php">
        <label>First Name:</label><br>
        <input required type="text" placeholder="First Name" name="first_name" value=<?php echo $_SESSION['userData']['first_name']; ?>><br>
        <label>Last Name:</label><br>
        <input required type="text" placeholder="Last Name" name="last_name" value=<?php echo $_SESSION['userData']['last_name']; ?> ><br>
        <label>Email Address:</label><br>
        <input required type="email" name="email" id="email" placeholder="Email Address"  value=<?php echo $_SESSION['userData']['email']; ?> > <br>

        <button type="submit">Update</button>
            <input type="hidden" name="action" value="updateAccountInfo">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['userData']['user_id']; ?>">
    </form>
    </div>
    <h2>Change Password</h2>
    <div class="center">
    <?php
if (isset($message)) { 
    echo $message; 
   }
?>
    <form method="post" action="/week3/accounts/index.php">
    <label>New Password:</label><br>
            <span>This will change your existing password!<span><br> <span class="fine-text">Password must be at least 8 characters and contain at least 1 uppercase character, 1 number and 1 special character </span><br>
            <input required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" name="user_password" id="password" placeholder=Password><br>
            <button type="submit">Change Password</button>
            <input type="hidden" name="action" value="changePassword">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['userData']['user_id']; ?>">
    </form>
    </div>
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 
</body>

</html><?php unset($_SESSION['message'])?>