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
        break;
    case 'signIn':
        break;
    default:
    include "signIn.php";
    break;
 }
?>