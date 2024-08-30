<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta charset="UTF-8">
    <title>Table Talk|All your favorite recipes</title>
</head>
<body>
<header>
<?php
include 'include/nav.php';
include 'include/connection.php';

if(isset($_SESSION['user_email'])){
    $currentuser = $_SESSION['user_email'];
    $sql = "SELECT email, fname, usergroup FROM register_users WHERE email = '$currentuser'";
    $gotResults = mysqli_query($conn, $sql);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
        $row = mysqli_fetch_array($gotResults);
        ?>
        <div id="dash" style="width: 200px;">
            <a href="dash.php">Hello, <?php echo $row['fname']; ?></a>
        </div>
        <?php
    } else {
        echo "<p>No user found.</p>";
    }
} else {
    ?>
    <div id="dash">
        <a href="signinform.php">Sign Up Now</a>
    </div>
    <?php
}
?>
</header>
<main>
<div class="above">
<div id="headlines">
    <h1><em>Elevate Your Meals with Simplicity and Delectable Flavors</em></h1>
    <h2>Embark on a Culinary Journey: Discover Global Delights and Simplified Recipes for Every Palate</h2>
    <h2>Satisfy your craving now:</h2>
    <h1><a href="allrecipes.php" style="text-decoration:none">Recipes</a></h1>
</div>
</div>
<div class="below">
    <div id="benefits">
        <p><h2>Welcome to Our Culinary Oasis!</h2></p>
        <p><h2>Embark on a Flavorful Journey: Discover an Abundance of Culinary Inspiration and Irresistible Recipes on Our Website. From Quick Weeknight Dinners to Lavish Weekend Feasts, We're Here to Elevate Your Cooking Experience and Delight Your Taste Buds with Every Bite. Join Our Community of Food Enthusiasts and Let's Create Memorable Meals Together!</h2></p>
    </div>
    <div id="feature">
        <p><h2>Easily find the perfect recipe for any occasion with our powerful search feature.
        Say goodbye to endless scrolling and hello to effortless meal planning!</h2></p>
    </div>
        <form class="searchform" action="#" method="get.recipe">
            <input class="searchinput" type="text" name="search" placeholder="Search for recipes...">
            <input class="searchbutton" type="submit" value="Search">
        </form>
        <div id="images">
        <div class="recipe">
            <img src="meal1.jpeg" alt="Zucchini Slice on a plate" width="300" height="280">
            <a href=""><h3>Zucchini Slice Recipe </h3></a>
            <p><b>Prep Time: 1hr</b></p>
        </div>
        <div class="recipe">
            <img src="meal2.jpg" alt="Pumpkin Soup in a bowl" width="300" height="280">
            <a href=" "><h3>Pumpkin Soup Recipe</h3></a>
            <p><b>Prep Time: 40mins</b></p>
        </div>
        <div class="recipe">
            <img src="meal3.jpg" alt="Fried Rice on a plate" width="300" height="280">
            <a href=" "><h3>Fried Rice Recipe</h3></a>
            <p><b>Prep Time: 1.5hrs</b></p>
        </div>
        <div class="recipe">
            <img src="meal4.jpg" alt="Shepherds Pie" width="300" height="280">
            <a href=" "><h3>Shepherd's Pie Recipe</h3></a>
            <p><b>Prep Time: 1hr</b></p>
        </div>
    </div>
    <div class="trust_indicators">
        <h1 style = "text-align: center;"><b>In Partnership with</b></h1>
        <ul style = "display: flex; list-style-type: none; justify-content: space-between; margin-left: 10px; margin-right: 10px">
            <li><img src="carrefour.jpg" alt="carrefour logo"></li>
            <li><img src="chandarana.jpg"></li>
            <li><img src="glovo.png"></li>
        </ul>
        <h1 style = "text-align: center;margin-top:100px;"><b>Made in Collaboration with</b></h1>
        <ul style = "display: flex; list-style-type: none; justify-content: space-between; margin-left: 10px; margin-right: 10px">
            <li><img src="gordon.webp" alt="Gordon Ramsay" width="200" height="200" ><h2><em>Master Chef, </em><b>G.Ramsay</b></h2></li>
            <li><img src="food%20network.png" alt = "Food network logo" width="200" height="200"><h2>The Food Network</h2></li>
            <li><img src="soyummy.png" alt = "So Yummy TV logo" width="200" height="200"><h2>So Yummy TV</h2></li>
        </ul>
    </div>
</div>
</main>
<footer>
<div id="closing" style="display: flex">
    <img src="table%20talk.png"width="150" height="150" style="padding-left:100px;padding-top: 20px;padding-bottom: 50px;">
    <ul style="display: inline-block;position:relative; list-style-type: none">
        <li><a href="#headlines">Home</a></li>
        <li><a href=" ">Careers</a></li>
        <li><a href=" ">Report an incident</a></li>
        <li style="font-size:40px"><em>Happy Cooking!</em></li>
    </ul>
</div>
<p style = "text-align: center; font-size: 12px;">Table Talk &copy; </p>
</footer>
<?php
mysqli_close($conn);
?>
</body>
</html>