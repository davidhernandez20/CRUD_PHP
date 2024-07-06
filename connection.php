<?php

function connection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "usuarios";

    $connect = mysqli_connect($host, $user, $pass);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_select_db($connect, $bd);

    return $connect;
}

?>
