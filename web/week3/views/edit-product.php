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
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/header.php'; ?>
<body>
<main>

    <div class="center">
    <h2> Edit Product  </h2>
    
    <?php
if (isset($message)) {
 echo $message;
}

?>

    <form method="post" action="/week3/index.php">
        <h3 class="formHeader"> Product Details </h3>
    <label>Product Name:</label><br>
            <input required <?php if(isset($name)){echo "value='$name'";}  elseif(isset($productInfo['name'])) {echo "value='$productInfo[name]'";} ?> type="text" name="name" placeholder="i.e Rust Pants" ><br>
            <label>Product Description:</label><br>
            <textarea  required  name="description" placeholder=" Write description here..." ><?php if(isset($description)){echo "$description";}  elseif(isset($productInfo['description'])) {echo $productInfo['description'];} ?></textarea><br>
            <label>Product Price:</label><br>
            <input required <?php if(isset($price)){echo "value='$price'";}  elseif(isset($productInfo['price'])) {echo "value='$productInfo[price]'";} ?>  type="number" step="any" name="price" placeholder="i.e 13.23" ><br>
            <label>Product Type:</label><br>
            <select required name='type'>
                <option selected disabled value="">Select Type:</option>
                <option <?php if(isset($type) && $type == "top"){echo "selected";}  elseif(isset($productInfo['type']) && $productInfo['type'] == "top") {echo "selected";} ?> value="top">Top</option>
                <option <?php if(isset($type) && $type == "bottom"){echo "selected";}  elseif(isset($productInfo['type']) && $productInfo['type'] == "bottom") {echo "selected";} ?> value="bottom">Bottom</option>
                <option <?php if(isset($type) && $type == "dress"){echo "selected";}  elseif(isset($productInfo['type']) && $productInfo['type'] == "dress") {echo "selected";} ?> value="dress">Dress</option>
</select><br>
            <button type="submit">Submit</button>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="itemId" value="<?php if(isset($productInfo['product_id'])){ echo $productInfo['product_id'];} 
elseif(isset($itemId)){ echo $itemId; } ?>">
</form>
</div>
</main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 

</body>
</html>