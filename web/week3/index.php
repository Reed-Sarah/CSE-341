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
case 'addProduct':
    include "views/add-product.php";
    exit;
    break;
case 'add':
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
          $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
          $path = "week3/images/no-image.png"; //filter_input(INPUT_POST, 'invImage');
          $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
          $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
          
          
         // Check for missing data
          if(empty($name) || empty($description) || empty($path) || empty($price) ||empty($type)){
            $message = '<p>*Please provide information for all empty form fields.</p>';
            echo $name . $description . $path . $price . $type;
            include 'views/add-product.php';
            exit; 
           }
          
           // Send the data to the model
          $addOutcome = addProduct($name, $description, $path, $price, $type, $db);
          
          // Check and report the result
          if($addOutcome === 1){
            $message = "<p>Success! $name  was added to inventory.</p>";
            include 'views/add-product.php';
            exit;
           } else {
            $message = "<p>Sorry $name was not added to Inventory. Please try again.</p>";
            include 'views/add-product.php';
            exit;
           }
               break;
case 'updateProducts':
    $products = getAllProducts($db);
$productUpdateList = buildProductsList($products);
include "views/update-products.php";
exit;
    break;
    case 'deleteProduct':
        $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
        $deleteResult = deleteProduct($itemId, $db);
        if ($deleteResult) {
            $message = "<p>Congratulations, item was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /week3/index.php?action=updateProducts');
            exit;
          } else {
            $message = "<p>The deletion failed.</p>";
            $_SESSION['message'] = $message;
            header('location: /week3/index.php?action=updateProducts');
            exit;
          }	
break;
case 'editProduct':
    {
        $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
        $productInfo = getProductById($itemId, $db);
        include "views/edit-product.php";
    }
case 'edit':
    $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
        $updateResult = updateProduct($itemId, $db);
        if ($updateResult) {
            $message = "<p>Congratulations, item was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /week3/index.php?action=updateProducts');
            exit;
          } else {
            $message = "<p>The deletion failed.</p>";
            $_SESSION['message'] = $message;
            header('location: /week3/index.php?action=updateProducts');
            exit;
          }	
          break;
    default:
    
   $products = getAllProducts($db);
   $itemsList = buildItemsList($products);
    // var_dump($products);
  
        include "views/browseItems.php";
        break;
}