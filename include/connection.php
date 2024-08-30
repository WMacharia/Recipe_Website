<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "recipe";

//connection
$conn = new mysqli( $servername, $username, $password, $dbname);

//check connection
if ( $conn -> connect_error){
	die("Connection failed: " );
}
