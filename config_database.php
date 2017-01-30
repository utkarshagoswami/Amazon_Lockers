<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "amazon_php";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        echo "error";
        die("Connection failed: " . mysqli_connect_error());
    }
?>