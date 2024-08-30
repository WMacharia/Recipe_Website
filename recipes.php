<?php
require "include/connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["image"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - ". $check["mime"]. ".<br>";
            $uploadOk = 1;
        } else {
            echo "Error: File is not an image.<br>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 20000000) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType!= "jpg" && $imageFileType!= "png" && $imageFileType!= "jpeg") {
            echo "Sorry, only JPG, JPEG or PNG files are allowed.<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0(Unsuccessful) by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";

        // If everything is ok, try to upload file and insert into database
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file has been uploaded.<br>";
                $image_path = $target_file;

                $user_email = $_POST['mail'];
                $ingredients = $_POST['ingredients'];
                $rname = $_POST['rname'];
                $prep = $_POST['prep'];
                $category = $_POST['category'];

                // Store the image path in the database
                $sql = "INSERT INTO recipes (recipe_image, email, ingredients, recipe_name, category, prep_time) VALUES ('$image_path', '$user_email', '$ingredients','$rname', '$category', '$prep')";

                if ($conn->query($sql) === TRUE) {
                    
                    header("Location: dash.php");
                    exit();
                } else {
                    echo "Error: ". $sql. "<br>". $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: No file was uploaded.";
    }
}
?>
