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
    $sql = 'SELECT name, price, picture_path FROM products WHERE type = :type'; 
        $stmt = $db->prepare($sql); 
        $stmt->bindValue(':type', $type, PDO::PARAM_STRING); 
        $stmt->execute(); 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $stmt->closeCursor(); 
        return $products; 
    }
?>