<footer>
<a href='https://www.freepik.com/vectors/background'>Attribution</a> 
<?php 
if(isset($_SESSION['loggedin']))
{
    echo " | <a class='account' href='/week3/accounts' title='Manage your Account'>Manage Account </a>";
    if ($_SESSION['userData']['is_admin'] == true) {
        echo "| <a href='/week3/index.php?action=updateProducts'>Manage Inventory</a>";
    } 
}
else {
    echo " | <a class='account' href='/week3/accounts/index.php?action=account' title='Login Sarahs Boutique'>Login/Sign Up</a>";
}

?>
</footer>