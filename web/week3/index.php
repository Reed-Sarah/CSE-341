<?php
session_start();
include_once "library/functions.php";
include_once "library/connection.php";
include_once "model/products-model.php";
include_once "model/accounts.php";

$db = connectDB();

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action) {
     case 'addToCart':
     $itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
     if (isset($_SESSION['userData']['user_id']) == false){
        $_SESSION['message'] = '<p class="notice">Please login to add items to your cart</p>';
        header('location: /week3/accounts/index.php?action=account'); 
        exit;
     }
     $addToCartOutcome = addToCart($itemId, $_SESSION['userData']['user_id'], $db);
     Name = getName($itemId, $db);
     var_dump($itemName);
    // Check and report the result
          if($addToCartOutcome === 1){
            $_SESSION['message'] = "<p>$itemName[name] was added to your cart</p>" . var_dump($itemName);
            //header('location: /week3/');
            //header("Location: {$_SERVER[HTTP_REFERER]}");
            var_dump($itemName);
            exit;
           } else {
            $_SESSION['message'] = "<p>Sorry item was not added to your cart. Please try again.</p>";
            header('location: /week3/');
            exit;
           }
               break;
     case 'shoppingCart': 
$shoppingCartInfo = getShoppingCartInfo($_SESSION['userData']['user_id'], $db);

if ($shoppingCartInfo[0] != ""){
  $cart = buildShoppingCart($shoppingCartInfo);  
}

 include "views/cart.php";
 exit;
break;

case 'remove';
$itemId = filter_input(INPUT_GET, 'itemId', FILTER_SANITIZE_NUMBER_INT);
$removeOutcome = removeFromCart($itemId, $_SESSION['userData']['user_id'], $db);
if($addOutcome === 1){
    $message = "<p>Success! Item removed from cart</p>";
    header('location: index.php?action=shoppingCart');
    exit;
   } else {
    $message = "<p>Sorry item was not removed. Please try again.</p>";
    header('location: index.php?action=shoppingCart');
    exit;
   }
      
//header('location: index.php?action=shoppingCart');

break;

case "checkout":

    include "views/checkout.php";
    break;

    case "confirmation":
        $addressLine1 = filter_input(INPUT_POST, 'addressLine1', FILTER_SANITIZE_STRING);
        $addressLine2 = filter_input(INPUT_POST, 'addressLine2', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        
        $purchasedItems = getShoppingCartInfo($_SESSION['userData']['user_id'], $db);
        $removeItemsFromCart = removeItemsFromCart($_SESSION['userData']['user_id'], $db);

  $purchasedItems = buildPurchasedItems($purchasedItems);  
  $saveAddress = saveAddress($addressLine1, $addressLine2, $city, $state, $zip, $country, $_SESSION['userData']['user_id'], $db);
  $address = buildAddressDisplay();

        include "views/confirmation.php";
        exit();
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
          $path = "images/no-image.png"; //filter_input(INPUT_POST, 'invImage');
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
        $productInfo = $productInfo[0];
        
        include "views/edit-product.php";
    }
    exit;
    break;
case 'edit':
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
          $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
          //$path = "week3/images/no-image.png"; //filter_input(INPUT_POST, 'invImage');
          $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
          $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $itemId = filter_input(INPUT_POST, 'itemId', FILTER_SANITIZE_NUMBER_INT);
   
    if(empty($name) || empty($description) || empty($price) ||empty($type)){
        $message = '<p>*Please provide information for all empty form fields.</p>';
        include 'views/edit-product.php';
        exit; 
       }
        $updateResult = updateProduct($name, $description, $price, $type, $itemId, $db);
        if ($updateResult) {
            $message = "<p>Congratulations, item was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /week3/index.php?action=updateProducts');
            exit;
          } else {
              echo $name . $description . $path . $price . $type . $itemId;
            $message = "<p>The update failed.</p>";
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