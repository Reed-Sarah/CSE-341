<?php 
session_start();
// if (!isset($_SESSION['username'])) {
//     header('location: index.php');
//     exit;
// }
echo "<h1>Welcome $_SESSION[username]";
