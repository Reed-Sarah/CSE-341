<?php
include_once "connection";
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
        $signUpOutcome = signUpUser($db, $username, $hashedPassword);
        include 'signIn.php';
        break;
    case 'signIn':
        break;
    default:
    include "signIn.php";
    break;
 }
?>