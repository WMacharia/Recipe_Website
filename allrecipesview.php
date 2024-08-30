<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Talk|Details</title>
    
</head>
<body>
    <div class="header-container">
<h1>Details</h1>
<a href="allrecipes.php">&#x2190;Back</a>
    </div>
<?php

require "include/connection.php";
$recipe = $_GET['recipe'];

$sql = "SELECT email, recipe_image,ingredients, recipe_name,category, prep_time FROM recipes WHERE recipe_name = '$recipe' ";
$results = mysqli_query($conn,$sql);

if ($results && mysqli_num_rows($results) > 0) {
    while($row = mysqli_fetch_array($results)){

        ?>
        <div id="images">
    <div class="recipe" style="display:flex; flex-wrap: wrap; justify-content: space-around; padding: 20px; margin-bottom: 20px; margin-left: 400px;">
        <label><h2><?php echo $row['recipe_name']; ?></h2></label>
        <img src="<?php echo $row['recipe_image']; ?>" width="300" height="280">
        <label><h3>Prep Time: <?php echo $row['prep_time']; ?></h3></label>
        <label><h3>Category: <?php echo $row['category']; ?></h3></label>
        <h3>Recipe: <br><?php echo $row['ingredients']; ?></h3>

    </div>
    </div>

        <?php

    }
}
?>
    
</body>
</html>