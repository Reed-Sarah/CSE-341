<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarah's Boutique</title>
    <link rel="stylesheet" href="css/styles.css" media="screen">
</head>
<body>
    
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/header.php'; ?>
<main>
   <div class="content"> 
    <div class="BFLinks"><a href="index.php">&#xab; Back to Browsing</a></div>
   <?php if (isset($cart)) {echo $cart; echo "<div class='alignR'><div class='button right-btn'><a href='index.php?action=checkout'>Proceed to Checkout</a></div></div>";} else {echo "<p>You don't have any items in your cart right now would you like to go  <a href='index.php'>Back to Browsing</a></p";} ?>
   <div class="push"></div>
  
</div>
</main> 
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 
</body>
</html>