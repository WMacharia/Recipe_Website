<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Talk|Recipe Submission</title>
</head>
<body>
<div class="header-container">
    <h1>Add Recipe</h1>
    <a href="dash.php">&#x2190;Back</a>
</div>
    <form class="form" method = "post" action = "recipes.php" enctype="multipart/form-data">
        
        <ul style="list-style-type:none;">
        <?php
            include "include/connection.php";
            session_start(); 

            $currentuser = $_SESSION['user_email'];

            $sql = "SELECT email, fname, usergroup FROM register_users WHERE email = '$currentuser'";
            $gotResults = mysqli_query($conn, $sql);

            if ($gotResults && mysqli_num_rows($gotResults) > 0) {
            $row = mysqli_fetch_array($gotResults);
        ?>
        <li>
            <label for="email">Email: </label>
            <input type="input" id="mail" name="mail" value="<?php echo $row['email']; ?>">
        </li>
        <li>
            <label for="rname">Recipe Name: </label>
            <input type="input" id="rname" name="rname" placeholder="recipe name...">
        </li>
        <li>
            <label for="category">Category: </label>
            <input type="input" id="category" name="category" placeholder="Breakfast, Lunch, Dinner, Brunch">
        </li>
        <li>
            <label for="origin">Prep Time: </label>
            <input type="input" id="prep" name="prep" placeholder="how long will it take to prepare...">
        </li>
        <li>
            <label for="image">Recipe Image: </label>
            <input type="file" id="image" name="image" value="upload" required>
        </li>
        <li>
            <label for="ingredients">Recipe: </label><br>
            <textarea id="ingredients" name="ingredients" rows="10" cols="50" placeholder="Ingredients and Method"></textarea>
        </li>
        <li class="confirmbutton">
            <button id="confirm" type="submit">Submit Recipe</button>
        </li>
        
    </ul>
</form>
<?php
    } else {
        echo "No user found.";
    }

    mysqli_close($conn);
?>
</body>
</html>