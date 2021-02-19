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
    <!-- <link rel="stylesheet" href="../css/vehicle.css" media="screen"> -->
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/header.php'; ?> 

<main>
    <h2> Add Product  </h2>
    <div class="center">
    <?php
if (isset($message)) {
 echo $message;
}
?>

    <form method="post" action="/week3/index.php">
        <h4 class="formHeader"> Product Details </h4>
    <label>Product Name:</label><br>
            <input required <?php if(isset($name)){echo "value='$name'";}  ?> type="text" name="name" placeholder="i.e Rust Pants" ><br>
            <label>Product Description:</label><br>
            <textarea  required  name="description" placeholder=" Write description here..." ><?php if(isset($description)){echo "$description";}  ?></textarea><br>
            <label>Product Price:</label><br>
            <input required <?php if(isset($price)){echo "value='$price'";}  ?>  type="number" step="any" name="price" placeholder="i.e 13.23" ><br>
            <label>Product Type:</label><br>
            <select required name='type'>
                <option disabled value="">Select Type:</option>
                <option value="top">Top</option>
                <option value="bottom">Bottom</option>
                <option value="dress">Dress</option>
</select><br>
            

            <button type="submit">Submit</button>
            <input type="hidden" name="action" value="add">
            

</form>
</div>
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/week3/snippets/footer.php'; ?> 
</body>

</html>