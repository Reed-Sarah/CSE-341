<header>
<h1>Sarah's Boutique</h1>
</header>

<nav>
<ul>
<li><a href="/week3/index.php?">All Clothing</a><li>
<li><a href="/week3/index.php?action=filter&type=dress">Dresses</a><li>
<li><a href="/week3/index.php?action=filter&type=top">Tops</a><li>
<li><a href="/week3/index.php?action=filter&type=bottom">Bottoms</a><li>
</ul>
<?php
if(isset($_SESSION['loggedin']))
{
    echo "<a class='login' href='/week3/accounts/index.php?action=Logout' title='Logout of Sarahs Boutique'>Logout</a>";
}
else {
    echo "<a class='login' href='/week3/accounts/index.php?action=account' title='Login Sarahs Boutique'>Login</a>";
}
?>
</nav>