<?php

function getAllProducts() {
$db = connectDB();
 $sql = 'SELECT * FROM products'; 
     $stmt = $db->prepare($sql); 
//     //$stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT); 
     $stmt->execute(); 
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
     $stmt->closeCursor(); 
     return $products; 
}
?>