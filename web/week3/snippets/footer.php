<footer>
<a href='https://www.freepik.com/vectors/background'>Background vector created by freepik - www.freepik.com</a> 
<?php 
if(isset($_SESSION['loggedin']))
{
    echo " | <a class='account' href='/week3/accounts' title='Manage your Account'>Manage Account</a>";
    if ($_SESSION['UserData']['is_admin'] > 1) {
        echo "| <a href='../'>Manage Inventory</a></p>";
    } 
}
else {
    echo " | <a class='account' href='/week3/accounts/index.php?action=account' title='Login Sarah's Boutique'>Login/Sign Up</a>";
}

?>
</footer>