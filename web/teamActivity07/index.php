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
        $pattern = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$/';
        if (!preg_match($pattern, $password)) {
            $_SESSION['message'] = "Password must contain 7 characters and number";
            include "signUp.php";
            exit;
        }
        if ($password != $password2){
            $_SESSION['message'] = "<p class='notice'>Passwords don't match</p>";
            $mark = true;
            include "signUp.php";
            exit;
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $signUp = signUpUser($db, $username, $hashedPassword);
        header('Location: signIn.php');
exit;
        break;
    case 'signIn':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userData = getUser($db, $username);
        if (password_verify($password, $userData['password'])) {
            echo 'Password is valid!';
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
            exit;
        } else {
            echo 'Invalid password.';
            include 'signIn.php';
            exit;
        }
        
        break;
    default:
    include "signIn.php";
    break;
 }
?>