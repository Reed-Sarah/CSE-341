<?php
session_start();
include_once "connection.php";
include_once "model.php";
$db = connectDB();

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action) {
     case 'signUp':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $signUp = signUpUser($db, $username, $hashedPassword);
        header('Location: signIn.php');

        break;
    case 'signIn':
        break;
    default:
    include "signIn.php";
    break;
 }
?>