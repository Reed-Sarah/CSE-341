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

    function deleteProduct($itemId, $db) {
       // The SQL statement
    $sql = 'DELETE FROM products WHERE product_id = :itemId';
    
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
   
    $stmt->bindValue(':itemId', $itemId, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged; 
    }
?>