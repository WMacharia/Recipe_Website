<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Talk | Edit Recipes</title>
    
    
</head>
<body>    <div class="header-container">
        <h1>Edit Recipes</h1>
        <a href="viewrecipes.php">&#x2190;Back</a>
    </div>

    <?php
    
    require "include/connection.php";

    if (isset($_GET['recipe_image'])) {
        $image = $_GET['recipe_image'];
    } else {
        echo "<p>Email not provided.</p>";
        exit;
    }

    // Retrieve user details based on email
    $sql = "SELECT email, recipe_image, ingredients, recipe_name, category, prep_time FROM recipes WHERE recipe_image = '$image'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_email = $row['email'];
        $current_image = $row['recipe_image'];
        $current_ingre = $row['ingredients'];
        $current_rename = $row['recipe_name'];
        $current_category = $row['category'];
        $current_prep = $row['prep_time'];

        // Handle form submission to update details
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['update'])) {
                $new_ingre = $_POST['ingredients'];
                $new_rename = $_POST['rename'];
                $new_prep = $_POST['prep'];
                $new_category = $_POST['category'];

                // Update details in the database for the specific recipe_image
                $update_sql = "UPDATE recipes SET ingredients = '$new_ingre', recipe_name = '$new_rename', category = '$new_category', prep_time = '$new_prep' WHERE recipe_image='$current_image'";

                if ($conn->query($update_sql) === TRUE) {
                    $current_ingre = $new_ingre; 
                    $current_rename = $new_rename; 
                    $current_prep = $new_prep;
                    $current_category = $new_category;
                    
                } else {
                    echo "<p>Error updating details: " . $conn->error . "</p>";
                }

            } elseif (isset($_POST['delete'])) {
                $delete_sql = "DELETE FROM recipes WHERE recipe_image='$current_image'";

                if ($conn->query($delete_sql) === TRUE) {
                    header("Location: viewrecipes.php");
                    exit;
                } else {
                    echo "<p>Error deleting recipe: " . $conn->error . "</p>";
                }
            }
        }
        ?>

        <form method="post" >
            <div id="images" style="line-height: 40px;">
                <div class="recipe" style=" padding: 20px; margin-bottom: 20px; margin-left: 400px; text-align: center;">
                    <img src="<?php echo $current_image; ?>" width="300" height="280">
                    <label for="rename">Name:</label>
                    <input type="text" id="rename" name="rename" value="<?php echo $current_rename; ?>" required><br>
                    <label for="rename">Category:</label>
                    <input type="text" id="category" name="category" value="<?php echo $current_category; ?>" required><br>
                    <label for="prep">Prep Time:</label>
                    <input type="text" id="prep" name="prep" value="<?php echo $current_prep; ?>" required><br>
                    <label for="ingredients">Recipe:</label><br>
                    <textarea type="text" id="ingredients" name="ingredients" rows="13" cols="100"><?php echo $current_ingre; ?></textarea><br>
                    <div class="confirmbutton">
                    <input type="submit" id="confirm" name="update" value="Update">
                    <input type="submit" id="confirm" name="delete" value="Delete">
    </div>
                </div>
            </div>
        </form>

        <?php
    } else {
        echo "<p>User not found.</p>";
    }
    ?>
</body>
</html>
