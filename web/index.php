<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giraffes</title>
    <link rel="stylesheet" href="css/hpStyles.css" media="screen">
</head>
<body>
    <h1>All About Giraffes</h1>
    <div class="line"></div>
    <a  href="https://www.pexels.com/photo/close-up-photography-of-giraffe-1382156/"><img class="giraffe" src="images/giraffe.jpeg" alt="giraffe"></a>
    <?php require_once "giraffes.php"; echo $giraffeInfo; ?>

<footer>
    <div>Sarah Parsons | Arizona | <a href="assignments.html">View Assignments</a> | <?php echo date('m-d-Y') ?></div>
</footer>
</body>
</html>