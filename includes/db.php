<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'cms_system';

    $conn = mysqli_connect($server, $username ,$password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    ?>