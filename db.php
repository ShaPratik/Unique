<?php
$conn = new mysqli("localhost", "root", "", "qrstall");
if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}
?>