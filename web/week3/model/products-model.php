<?php

function getAllProducts($db) {

 $sql = 'SELECT * FROM products'; 
     $stmt = $db->prepare($sql);  
     $stmt->execute(); 
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
     $stmt->closeCursor(); 
     return $products; 
}

function getProductsByType($type) {
    $db = connectDB();
    $sql = 'SELECT * FROM products WHERE "type" = :types'; 
        $stmt = $db->prepare($sql); 
        $stmt->bindValue(':types', $type, PDO::PARAM_STR); 
        $stmt->execute(); 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $stmt->closeCursor(); 
        return $products; 
    }
?>