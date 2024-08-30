<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Talk|My Recipes</title>
    
</head>
<body>
    <div class="header-container">
<h1>All Recipes</h1>
<a href="index.php">&#x2190;Back</a>
    </div>
<?php

require "include/connection.php";

$sql = "SELECT email, recipe_image, recipe_name, category, prep_time FROM recipes";
$results = mysqli_query($conn,$sql);

if ($results && mysqli_num_rows($results) > 0) {
    while($row = mysqli_fetch_array($results)){

        ?>
        <div id="images">
    <div class="recipe">
        <img src="<?php echo $row['recipe_image']; ?>" width="200" height="200">
        <a href="allrecipesview.php?recipe=<?php echo $row['recipe_name']; ?>"><h3><?php echo $row['recipe_name']; ?></h3></a>
        <p>Category:<?php echo $row['category']; ?></p>
        <p>Prep Time:<?php echo $row['prep_time']; ?></p>
        <p>Recipe Owned by:<?php echo $row['email']; ?></p>
    </div>
    </div>

        <?php

    }
}
?>
    
</body>
</html>