<?php
    include "../config/connecte_db.php"; 
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); 
    }

    if (!isset($_SESSION['user_id'])) {
        exit; 
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        
        if (isset($_POST['descreptionn']) && isset($_POST['linkden']) && isset($_POST['githublink'])) {

                $description = mysqli_real_escape_string($conn, $_POST['descreptionn']);
                $linkden = mysqli_real_escape_string($conn, $_POST['linkden']);
                $githublink = mysqli_real_escape_string($conn, $_POST['githublink']);
            
                $query = "UPDATE users SET github_link = 'https://$githublink', description = '$description', linkden = 'https://$linkden' WHERE id = '" . $_SESSION['user_id'] . "'";
                
                
                if (mysqli_query($conn, $query)) { 
                    header("Location: profile.php");
                    exit; 
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
        } else {
            echo "Form fields are missing or not submitted.";
        }
    }

