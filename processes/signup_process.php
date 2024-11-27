<?php
include('../config/connecte_db.php');
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];
$img = $_FILES['imageprofile'];
if (isset($fname) & isset($lname) & isset($username) & isset($email) & isset($password) & isset($rpassword) & isset($img)) {
    if ($password !== $rpassword) {
        echo "Passwords do not match.";
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }
    $query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email or Username already exists.";
        exit();
    }
    $upload_dir = '../assets/profile_imges/';
    $file_name = basename($img['name']); 
    $target_file = $upload_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
    if (getimagesize($img['tmp_name']) === false) {
        echo "File is not an image.";
        exit();
    }
    

    if ($img['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        exit();
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit();
    }

    if (move_uploaded_file($img['tmp_name'], $target_file)) {
 
        echo "";
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO users (first_name, last_name, username, email, password, image) 
                     VALUES ('$fname', '$lname', '$username', '$email', '$hashed_password', '$target_file')";


    if (mysqli_query($conn, $insert_query)) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "All fields are required!";
}