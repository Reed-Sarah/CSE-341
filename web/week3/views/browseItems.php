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
   <div class="BFLinks FLinks"> <a  href="index.php?action=shoppingCart">Shopping Cart &#xbb;</a> </div>
   <?php
if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
?>
   <?php echo $itemsList; ?>
   
</div>
      </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 

</body>
</html><?php if (isset($_SESSION['message'])) {
        unset($_SESSION['message']);
       } ?>