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
<div class="BFLinks"><a href="index.php">&#xab; Back to Browsing</a></div>

   <h2> Thank you for your purchase!</h2>
   <?php echo $purchasedItems; ?>

   
   <?php echo $address ?>
</main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 

</body>
</html>