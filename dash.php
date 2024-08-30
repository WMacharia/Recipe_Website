<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <title>Table Talk|Dashboard</title>
</head>
<body>
    <?php
        include "include/connection.php";
        session_start(); 

        if (!isset($_SESSION['user_email'])) {
            echo "User not logged in";
            exit();
        }

        $currentuser = $_SESSION['user_email'];
        $sql = "SELECT email, fname FROM register_users WHERE email = '$currentuser'";

        $gotResults = mysqli_query($conn,$sql);

        if($gotResults){
            if(mysqli_num_rows($gotResults) > 0){
                while($row = mysqli_fetch_array($gotResults)){
                    
                    //print_r($row['email']);
                    ?>
                <nav>
                    <div id="dash">
                        <h1> &#x1F464; <em><?php echo $row['fname']; ?></em></h1>
                        <h2><em><?php echo $row['email']; ?></em></h2>
                        <ul style="list-style-type: none; font-size: 23px;">
                             
                            <li><a href="index.php">Home Page</a></li>
                            <li><a href="recipe.php" >Add a Recipe</a></li>
                            <li><a href="viewrecipes.php" >My Recipes</a></li>
                            <li><a href="viewdetails.php" >My Profile</a></li>
                            <li><a href="logout.php" >Log Out</a></li>
                            
                        </ul>
                        
                    </div>
                </nav>
    <?php
                    
                
                }
            }
        }
    ?>

</body>
</html>
