<?php

include "../../config/connecte_db.php";


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}


$query = "SELECT username, email, image, first_name, last_name, github_link, linkden, description FROM users WHERE id = '" . $_SESSION['user_id'] . "'";
$result = $conn->query($query);

$userData = []; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userData = $row;
    }
}


$query1 = "SELECT title, content, image, github_link FROM posts WHERE user_id = '" . $_SESSION['user_id'] . "'";
$result1 = $conn->query($query1);

$postsData = []; 
if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $postsData[] = $row1;
    }
}


$response = [
    'user' => $userData,
    'posts' => $postsData
];


echo json_encode($response);
?>
