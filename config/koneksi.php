<?php
    $hostname = "localhost";
    $db = "goodsans";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($hostname, $username, $password, $db);

    if (mysqli_connect_error() == true) {
        die('Gagal terhubung ke database');
    }
?>