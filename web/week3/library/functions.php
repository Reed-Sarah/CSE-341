<?php

function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }

   function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $clientPassword);
 }

function buildItemsList($items){
    $l = '<ul id="items-list">';
    foreach ($items as $item) {
     $l .= "<li>";
     $l .= "<div class='item-container'><img src='$item[picture_path]' alt='$item[description]'>";
     $l .= "<h2>$item[name]</h2>";
     $l .= "<h3>$$item[price]</h3>";
     $l .= "<form  method='get' action='index.php'>";
     $l .= "<input type='hidden' name='itemId' value='$item[product_id]'>";
     $l .= "<input type='hidden' name='action' value='addToCart'>";
     $l .= "<button type='submit'>Add to Cart</button>";
     $l .= '</form></div></li>';
    }
    $l .= '</ul>';
    return $l;
   }

   function buildShoppingCart($shoppingCartInfo){
    $l = '<ul id="shopping-cart">';
    foreach ($shoppingCartInfo as $item) {
     $l .= "<li>";
     $l .= "<img src='$item[picture_path]' alt='$item[description]'>";
     $l .= "<div class='item-specs'><h2>$item[name]</h2>";
     $l .= "<h3>$$item[price]</h3></div>";
     $l .= "<a href='index.php?action=remove&itemId=" . urlencode($item['product_id'])."'>Remove from cart</a>";
     $l .= "</li>";
    }
    $l .= '</ul>';
    return $l;
       
   }

   function buildProductsList($products){
    $l = '<ul id="shopping-cart">';
    foreach ($products as $item) {
     $l .= "<li>";
     $l .= "<img src='$item[picture_path]' alt='$item[description]'>";
     $l .= "<div class='item-specs'><h2>$item[name]</h2>";
     $l .= "<h3>$$item[price]</h3>$item[description]</div>";
      $l .= "<a href='index.php?action=editProduct&itemId=" . urlencode($item['product_id'])."'>Edit</a>";
     $l .= "<a href='index.php?action=deleteProduct&itemId=" . urlencode($item['product_id'])."'>Delete</a>";
    
     $l .= "</li>";
    }
    $l .= '</ul>';
    return $l;
       
   }

   

   function buildPurchasedItems($itemsInfo){
    $l = '<ul id="purchased-items">';
    $total = 0;
    foreach ($itemsInfo as $item) {
        $total += $item['price'];
     $l .= "<li>";
     $l .= "<img src='$item[picture_path]' alt='$item[description]'>";
     $l .= "<div class='item-specs'><h2>$item[name]</h2>";
     $l .= "<h3>$$item[price]</h3>";
     $l .= '</div></li>';
    }
    $l .= '</ul>';
    $total = number_format((float)$total, 2, '.', '');$total;
    $l .= "<div id='total'>Total: $$total</div>";
    return $l;
       
   }

   function buildAddressDisplay(){
       $a = "<div id='address'><h2>Ship To:</h2>";
       $a .= "$_POST[AddressLine1]<br>";
       $a .= "$_POST[AddressLine2]<br>";
       $a .= "$_POST[city], $_POST[state] $_POST[zip]<br>";
       $a .= "$_POST[country]</div><br>";
       return $a;
   }
?>