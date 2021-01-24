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
<div class="BFLinks "> <a  href="index.php?action=shoppingCart">&#xab; Back to Shopping Cart</a> </div>

<div class="center">
   <h2>Shipping Address</h2><br>
   <form method="POST" action="index.php?action=confirmation">
   <label>Address line 1</label><br>
   <input required type="text" name="AddressLine1" placeholder="123 Maple St."><br>
   <label>Address line 2</label><br>
   <input type="text" name="AddressLine2" placeholder="Apt. 4"><br>
   <label>City</label><br>
   <input required type="text" name="city" placeholder="Mayberry"><br>
   <label>State</label><br>
   <input required type="text" name="state" placeholder="NC"><br>
   <label>Zip Code</label><br>
   <input required type="number" name="zip" placeholder="27571"><br>
   <label>Country</label><br>
   <input required type="text" name="country" placeholder="United States of America"><br>

   <button class="right-btn" type="submit">Checkout</button>
   </form>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 

</body>
</html>