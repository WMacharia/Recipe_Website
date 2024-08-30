<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href="styling.css">
    <meta charset="UTF-8">
    <title>Table Talk|Sign Up</title>
</head>
<body>
<form class="form" action = "signin.php" method = "post">
    <h1>Welcome</h1>
    <ul style="list-style-type:none">
        <li>
            <label for="fname">First Name: </label>
            <input type="name" id="fname" name="fname" placeholder="First Name" required>
        </li>
        <li>
            <label for="mail">Enter E-mail:</label>
            <input type="email" id="mail" name="user_email" placeholder="email@website.com" required>
        </li>
        <li>
            <label for="password">Enter Password: </label>
            <input type="password" id="password" name="Password" placeholder="Enter password" required>
        </li>
        <li>
        <label style ="font-size: 14px;line-height: normal;" for="group">Select group:</label>
        <select id="group" name="group">
    <?php 
    require "include/connection.php";

    $sql = "SELECT * FROM groups";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){

        while ($row = $result->fetch_assoc()){
            echo '<option value =" ' . $row["groupid"] . ' ">' . $row["usergroup"] . '</option>';
        }
    }else{
        echo '<option value="">No groups available</option>';
    }
    ?>
        </select>
        </li>
       <li class="confirmbutton">
            <button id= "confirm" type="submit">Sign-up</button>
        </li>
        <li id="user"><em>Already a User? </em><a href="loginform.html"> Login</a></li>
        <li style = "text-align: center; font-size: 12px;">Table Talk&copy; </li>
    </ul>
</form>
</body>
</html>