<?php
/* Accounts Model */

function regUser($first_name, $last_name, $email, $user_password, $db){
    // The SQL statement
    $sql = 'INSERT INTO users (first_name, last_name, email, user_password)
        VALUES (:first_name, :last_name, :email, :user_password)';
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':user_password', $user_password, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
   }

// Check for an existing email address
function checkForAccount($email, $db) {
    $sql = 'SELECT email FROM users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    
    }
   }

   // Get user data based on an email address
function getUser($email, $db){
    $sql = 'SELECT user_id, first_name, last_name, email, is_admin, user_password FROM users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();    
    return $userData;
   }

   // Get user data based on an Id
function getUserInfo($user_id, $db){
    $sql = 'SELECT user_id, first_name, last_name, email, is_admin FROM users WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
   }

   // updates user's information
   function updateUser($first_name, $last_name, $email, $user_id, $db){
    
    // The SQL statement
    $sql = 'UPDATE users set first_name = :first_name, last_name = :last_name, email = :email
    WHERE user_id = :user_id';
    // Create the prepared statement 
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
   }

   function changePassword($user_password, $user_id, $db){
    $sql = 'UPDATE users set user_password = :user_password WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_password', $user_password, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
   }

   function saveAddress($addressLine1, $addressLine2, $city, $state, $zip, $country, $user_id, $db){
    $sql = 'INSERT INTO addresses (addressLine1, addressLine2, city, state, zip_code, country, user_id)
        VALUES (:addressLine1, :addressLine2, :city, :state, :zip, :country, :user_id)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':addressLine1', $addressLine1, PDO::PARAM_STR);
    $stmt->bindValue(':addressLine2', $addressLine2, PDO::PARAM_STR);
    $stmt->bindValue(':city', $city, PDO::PARAM_STR);
    $stmt->bindValue(':state', $state, PDO::PARAM_STR);
    $stmt->bindValue(':zip', $zip, PDO::PARAM_STR);
    $stmt->bindValue(':country', $country, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
   }
   ?>