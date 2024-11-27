<?php

include "../../config/connecte_db.php";

$query = "SELECT username, email, first_name, last_name, github_link, description, linkden, image FROM users";
$result = $conn->query($query);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>