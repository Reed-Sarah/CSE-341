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
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);

        if ($password != $password2){
            $mark = "<span class='notice'>*<span>";
            $_SESSION['message'] = '<p class="notice">Passwords do not match</p>';
            include 'signUp.php';
            exit;
        }
        $pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$";
        if (!preg_match($pattern, $password)) {
            $_SESSION['message'] = '<p class="notice">Password must contain at least 7 characters and a number </p>';
            include 'signIn.php';
            exit;
        }
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