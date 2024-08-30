<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Profile</title>
    
</head>
<body>
<div class="header-container">
    <h1>Update User Profile</h1>
    <a href="admin.php">&#x2190;Back</a>
</div>
    
    <?php
    require "include/connection.php";

        $user_email = $_GET['email'];

        // Retrieve user details based on email
        $sql = "SELECT email, fname, usergroup FROM register_users WHERE email = '$user_email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $current_email = $row['email'];
            $current_fname = $row['fname'];
            $group = $row['usergroup'];

            if($group == 1){
                 $group = "Admin";
            }else{
                 $group = "User-Recipe Owner";
            }

            // Handle form submission to update user details
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['update'])) {
                    $new_fname = $_POST['fname'];
                    $new_email = $_POST['email'];

                    // Update details in the database
                    $update_sql = "UPDATE register_users SET fname = '$new_fname', email = '$new_email' WHERE email='$current_email'";

                    if ($conn->query($update_sql) === TRUE) {
                        $current_fname = $new_fname; 
                        $current_email = $new_email; 
                    } else {
                        echo "<p>Error updating details: " . $conn->error . "</p>";
                    }

                } elseif (isset($_POST['delete'])) {
    
                    $delete_sql = "DELETE FROM register_users WHERE email='$current_email'";

                    if ($conn->query($delete_sql) === TRUE) {
                        header("Location: admin.php");
                    } else {
                        echo "<p>Error deleting user: " . $conn->error . "</p>";
                    }
                }
            }
            ?>

        
            <form class="form" method="post">
                
                <label for="fname">Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $current_fname  ?>" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $current_email  ?>" required><br>
                <label for="group">Group:</label>
                <label for="fname"><?php echo $group; ?></label><br>
                <div class="confirmbutton">
                <input type="submit" id = "confirm" name="update" value="Update">
                <input type="submit" id= "confirm" name="delete" value="Delete">
                </div>
            </form>;
                  <?php
        } else {
            echo "<p>User not found.</p>";
        }
    ?>
</body>
</html>
