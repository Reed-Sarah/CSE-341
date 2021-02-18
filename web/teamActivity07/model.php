<?php 
function signUpUser($db, $username, $password) {
    $sql = 'INSERT INTO users07 (username, password) VALUES (:username, :password);';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;  
}

function getUser($db, $username) {
    $sql = 'SELECT password FROM users07 WHERE username = :username;';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;  
}


?>