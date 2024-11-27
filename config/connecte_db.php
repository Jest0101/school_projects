<?php
$hostname = 'localhost';
$username = 'root';
$passwo = '';
$dbname = 'mydb_db';
$conn = new mysqli($hostname, $username, $passwo, $dbname);
if ($conn->connect_error) {
    die('connection Failed'. $conn->connect_error);
}
?>