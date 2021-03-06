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

    function getProductById($itemId, $db) {
        $sql = 'SELECT * FROM products WHERE product_id = :itemId'; 
            $stmt = $db->prepare($sql); 
            $stmt->bindValue(':itemId', $itemId, PDO::PARAM_STR); 
            $stmt->execute(); 
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $stmt->closeCursor(); 
            return $products; 
        }

        function addToCart($itemId, $user_id, $db)
        {
            $sql = 'INSERT INTO shopping_carts (user_id, product_id) VALUES (:user_id, :itemId)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindValue(':itemId', $itemId, PDO::PARAM_STR);
            // Insert the data
            $stmt->execute();
            // Ask how many rows changed as a result of our insert
            $rowsChanged = $stmt->rowCount();
            // Close the database interaction
            $stmt->closeCursor();
            // Return the indication of success (rows changed)
            return $rowsChanged; 
        }

       function removeFromCart($itemId, $user_id, $db){
    $sql = 'DELETE FROM shopping_carts WHERE product_id = :itemId AND user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':itemId', $itemId, PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
       }

        function getShoppingCartInfo($user_id, $db) {
            $sql = 'SELECT * FROM shopping_carts c JOIN products p USING (product_id) WHERE c.user_id = :user_id'; 
            $stmt = $db->prepare($sql); 
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR); 
            $stmt->execute(); 
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $stmt->closeCursor(); 
            return $products; 
        }

        function getName($itemId, $db) {
            $sql = 'SELECT name FROM products WHERE product_id = :itemId'; 
            $stmt = $db->prepare($sql); 
            $stmt->bindValue(':itemId', $itemId, PDO::PARAM_STR); 
            $stmt->execute(); 
            $name = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $stmt->closeCursor(); 
            return $name; 
        }

        function addProduct($name, $description, $path, $price, $type, $db) {
            // The SQL statement
         $sql = 'INSERT INTO products (name, description, price, type, picture_path) VALUES (:name, :description, :price, :type, :path)';
         // Create the prepared statement using the phpmotors connection
         $stmt = $db->prepare($sql);
         // The next four lines replace the placeholders in the SQL
         // statement with the actual values in the variables
         // and tells the database the type of data it is
         $stmt->bindValue(':name', $name, PDO::PARAM_STR);
         $stmt->bindValue(':description', $description, PDO::PARAM_STR);
         $stmt->bindValue(':price', $price, PDO::PARAM_STR);
         $stmt->bindValue(':type', $type, PDO::PARAM_STR);
         $stmt->bindValue(':path', $path, PDO::PARAM_STR);
         // Insert the data
         $stmt->execute();
         // Ask how many rows changed as a result of our insert
         $rowsChanged = $stmt->rowCount();
         // Close the database interaction
         $stmt->closeCursor();
         // Return the indication of success (rows changed)
         return $rowsChanged; 
         }

         function updateProduct($name, $description, $price, $type, $itemId, $db) {
            // The SQL statement
         $sql = 'UPDATE products SET name = :name, description = :description, price = :price, type = :type WHERE product_id = :itemId';
         // Create the prepared statement using the connection
         $stmt = $db->prepare($sql);
         // The next four lines replace the placeholders in the SQL
         // statement with the actual values in the variables
         // and tells the database the type of data it is
         $stmt->bindValue(':name', $name, PDO::PARAM_STR);
         $stmt->bindValue(':description', $description, PDO::PARAM_STR);
         $stmt->bindValue(':price', $price, PDO::PARAM_STR);
         $stmt->bindValue(':type', $type, PDO::PARAM_STR);
         //$stmt->bindValue(':path', $path, PDO::PARAM_STR);
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

    function deleteProduct($itemId, $db) {
    $sql = 'DELETE FROM products WHERE product_id = :itemId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':itemId', $itemId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged; 
    }

    function removeItemsFromCart($user_id, $db) {
        $sql = 'DELETE FROM shopping_carts c WHERE user_id = :user_id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged; 
        }
    
?>