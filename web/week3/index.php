<?php
include_once "model/items.php";
include_once "library/functions.php";
include_once "library/connection.php";
include_once "model/products-model.php";

$db = connectDB();

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action) {
     case 'addToCart':
     $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
     //echo $itemId;
     $_SESSION['cart'][] = (int)$itemId;
     
    header('location: index.php');
    
    exit;
     break;

     case 'shoppingCart': 
//$shoppingCartInfo =[];
if (isset($_SESSION['cart']))
{
foreach ($_SESSION['cart'] as $itemId)
{
    if ($itemId !== null)
    {
    $shoppingCartInfo[] = array (
        "id" => $items[$itemId]['id'],
        "name" => $items[$itemId]['name'],
        "path" => $items[$itemId]['path'],
        "price" => $items[$itemId]['price'],
        "type" => $items[$itemId]['type']
    );
}
}
//var_dump($shoppingCartInfo);
if (isset($shoppingCartInfo)){
  $cart = buildShoppingCart($shoppingCartInfo);  
}
}
//echo $shoppingCartInfo[0]['name'];
//var_dump($shoppingCartInfo);
 include "views/cart.php";
 exit;
break;

case 'remove';
$itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
$length = count($_SESSION['cart'], 0);
$i = (int)0;
echo "before";
var_dump($_SESSION['cart']);

while ($i < $length):
  // echo "removing" . $_SESSION['cart'][1];
 
     if ($_SESSION['cart'][$i] == $itemId) {
        $_SESSION['cart'][$i] = null;
        echo $i;
    }
    else {
        $i++;
    } 


endwhile;
echo "after";
var_dump($_SESSION['cart']);

header('location: index.php?action=shoppingCart');
//echo "removing" . $itemId;
break;

case "checkout":
    include "views/checkout.php";
    break;

    case "confirmation":
foreach ($_SESSION['cart'] as $itemId)
{
    if ($itemId !== null)
    {
    $itemsInfo[] = array (
        "id" => $items[$itemId]['id'],
        "name" => $items[$itemId]['name'],
        "path" => $items[$itemId]['path'],
        "price" => $items[$itemId]['price'],
        "type" => $items[$itemId]['type']
    );
}
}
  $purchasedItems = buildPurchasedItems($itemsInfo);  
  $address = buildAddressDisplay();

        include "views/confirmation.php";
        break;
    case "filter":
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
        $products = getProductsByType($type);
        $itemsList = buildItemsList($products);
        include "views/browseItems.php";
break;
    default:
    
   $products = getAllProducts($db);
   $itemsList = buildItemsList($products);
    // var_dump($products);
  
        include "views/browseItems.php";
        break;
}