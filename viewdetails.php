<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Talk|My Profile</title>
    
</head>
<body>
<div class="header-container">
    <h1>View Profile</h1>
    <a href="dash.php">&#x2190;Back</a>
</div>
<?php
    include "include/connection.php";
    session_start(); 

    if (!isset($_SESSION['user_email'])) {
        echo "User not logged in";
        exit();
    }

    $currentuser = $_SESSION['user_email'];

    $sql = "SELECT email, fname, usergroup FROM register_users WHERE email = '$currentuser'";
    $gotResults = mysqli_query($conn, $sql);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
        $row = mysqli_fetch_array($gotResults);
?>
<form class="form" action="" method="post">
    
    <ul style="list-style-type:none;">
        <li>
            <label for="fname">First Name: </label>
            <label for="fname"><?php echo $row['fname']; ?></label>
        </li>
        <li>
            <label for="mail">E-mail:</label>
            <label for="fname"><?php echo $row['email']; ?></label>
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
