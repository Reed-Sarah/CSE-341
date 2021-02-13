<!DOCTYPE html>
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
    <div class="center">
         <h2>Login</h2> 
         
         <?php
if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
?>
        <form method="post" action="/week3/accounts/">
         <p>All fields are required<p>   
            <label>Email Address:</label><br>
            <input input required type="email" name="email" id="email" placeholder="Email Address"  <?php if(isset($email)){echo "value='$email'";} ?> ><br>
            <label>Password:</label><br>
            <input required name="user_password" type="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder=Password>
            <button>Login</button> 
           <input type="hidden" name="action" value="Login"> 
   <div class="register"> <a  href="/week3/accounts/index.php?action=register">Don't have an account? Sign up today!</a></div>
        </form>

</div>     
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 
</body>

</html>