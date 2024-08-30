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
<h1>My Recipes</h1>
<a href="dash.php">&#x2190;Back</a>
    </div>
<?php
session_start();

require "include/connection.php";

$currentuser = $_SESSION['user_email'];
$sql = "SELECT email, recipe_image, recipe_name, prep_time FROM recipes WHERE email = '$currentuser'";
$results = mysqli_query($conn,$sql);

if ($results && mysqli_num_rows($results) > 0) {
    while($row = mysqli_fetch_array($results)){

        ?>
    <div id="images">
    <div class="recipe">
        <img src="<?php echo $row['recipe_image']; ?>" width="300" height="280">
        <a href="editrecipes.php?recipe_image=<?php echo $row['recipe_image']; ?>"><h3><?php echo $row['recipe_name']; ?></h3></a>
        <p><b>Prep Time:<?php echo $row['prep_time']; ?></b></p>
    </div>
    </div>

        <?php

    }
}
?>
    
</body>
</html>