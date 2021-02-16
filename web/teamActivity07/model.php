<?php 
function signUpUser($db, $username, $password) {
    $sql = '';
$stmt = $db->prepare($sql);
//$stmt->bindValue('', , PDO::PARAM_STR);
//$stmt->bindValue('', , PDO::PARAM_STR);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $rowsChanged;  
}


?>