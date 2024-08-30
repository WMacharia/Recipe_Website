<?php 
require "include/connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $user_email = $_POST['user_email'];
    $password = $_POST['Password'];
    $group = $_POST['group'];

    //hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO register_users (email, password, fname, usergroup) VALUES ('$user_email', '$hashed_password', '$fname', '$group')";

    $_SESSION['user_email'] = $user_email;
    
    if ($conn->query($sql) === TRUE) {
            header("Location: loginform.html");
            echo "USER REGISTERED SUCCESFULLY!"; 
    }      
        } else {
            header("Location: signinform.html");
            echo "Error: " . $sql . "<br>" . $conn->error;
}


?>