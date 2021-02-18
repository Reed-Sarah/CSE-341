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


?>