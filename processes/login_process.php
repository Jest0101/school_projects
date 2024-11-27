<?php
include('../config/connecte_db.php');
session_start();

$email = $_POST['Email'] ?? null;
$password = $_POST['pass'] ?? null;

if (isset($email, $password)) {

    if (!$conn) {
        die("Database connection failed.");
    }


    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Database error: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("Execution error: " . $stmt->error);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {

        echo "The email doesn't exist.";
    } else {

        if (password_verify($password, $user["password"])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    }


    $stmt->close();
} else {
    echo "Email and password are required.";
}
?>
