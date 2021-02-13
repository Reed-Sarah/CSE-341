<?php if ($_SESSION['userData']['is_admin'] == false) {
        header('location: /week3/');
        exit;
    } ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarah's Boutique</title>
    <link rel="stylesheet" href="css/styles.css" media="screen">
</head>
<body>
    <div class="content">
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/header.php'; ?>
    <div class="BFLinks"><a href="index.php">&#xab; Back to Browsing</a></div>
    <?php
if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
?>
<a class="button center" href="/week3/index.php?action=addProduct">Add Product</a>
   <?php echo $productUpdateList?>
   <div class="push"></div>
</div>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 

</body>
</html>