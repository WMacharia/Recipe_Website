<?php
session_start();

require 'include/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $user_email = $_POST['user_email'];
    $password = $_POST['Password'];
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Retrieve hashed password from the database
    $sql = "SELECT password,usergroup FROM register_users WHERE email = '$user_email'";
    $result = $conn->query($sql);
    
    $_SESSION['user_email'] = $user_email;
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password_from_db = $row['password'];
        
        
        // Compare hashed password from database with hashed password from user input
        if (password_verify($password, $hashed_password_from_db)) {
                if($row['usergroup'] == 1){
                    header("Location: admindash.php");
                }else{
                    header("Location:index.php");
                }
        } else {
            header("Location: loginform.html");
            
        }
        }
    } else {
        header("Location: loginform.html");
        echo "User not found.";
    }
?>
