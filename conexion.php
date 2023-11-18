<?php
    define('DB_HOST', 'mydb');
    define('DB_USER', 'jc');
    define('DB_PASS', 'toor');
    define('DB_NAME', 'app');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Fallo la conexion: " . $conn->connect_error);
    }
?>