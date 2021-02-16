<?php 
function signUpUser($db, $username, $hashedPassword) {
    $sql = 'INSERT INTO users07 (username, password) VALUES (:username, :hashedPassword)';
$stmt = $db->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $rowsChanged;  
}


?>