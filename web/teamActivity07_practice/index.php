<?php
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
        $signUpOutcome = signUpUser($db, $username, $hashedPassword);
        include 'signIn.php';
        break;
    case 'signIn':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userData = getUser($db, $username);
        $verify = password_verify($password, $userData['password']);

        if(!$verify) {
            echo "not verified";
            $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
            include 'signIn.php';
            exit;
          }

          $_SESSION['username'] = $userData['username'];
          header('location: welcome.php');

        break;
    default:
    include "signIn.php";
    break;
 }
?>