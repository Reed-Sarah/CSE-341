<header>
<h1>Sarah's Boutique</h1>
</header>

<nav>
<ul>
<li><a href="index.php?">All Clothing</a><li>
<li><a href="index.php?action=filter&type=dress">Dresses</a><li>
<li><a href="index.php?action=filter&type=top">Tops</a><li>
<li><a href="index.php?action=filter&type=bottom">Bottoms</a><li>
</ul>
<?php
if(isset($_SESSION['loggedin']))
{
    echo "<a class='Logout' href='/phpmotors/accounts/index.php?action=Logout' title='Logout of PHP Motors'>Logout</a>";
}
else {
    echo "<a class='Login' href='/phpmotors/accounts/index.php?action=account' title='Login into PHP Motors'>My Account</a>";
}
?>
</nav>