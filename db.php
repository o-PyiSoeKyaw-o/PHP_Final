<?php 
    $conn = new mysqli('localhost', 'root', '', 'ecommerce');

    if($conn->connect_error) {
        die('Connection Error :' . $conn->connect_error);
    }
?>