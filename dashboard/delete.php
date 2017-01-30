<?php
    include '../config_database.php';
    $id = $_GET['id'];
    echo "<div>in here</div>";
    $sql = " DELETE FROM locker where locker_id=".$id;
    mysqli_query($conn, $sql);
    header('Location: list.php');    
?>