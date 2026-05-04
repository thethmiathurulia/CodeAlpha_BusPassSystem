<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bus_pass_system";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("සම්බන්ධතාවය අසාර්ථකයි: " . $conn->connect_error);
}
?>