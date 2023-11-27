<?php
    global $conn;
    require_once "php\dbconnect.php";

    $query = "describe user";

    echo gettype($conn);
//    $result = mysqli_query($conn, $query);
//
//    while (mysqli_num_rows($result) > 0) {
//        $row = mysqli_fetch_assoc($result);
//        foreach ($row as $value)
//            echo "$value ";
//        echo "<br>";
//    }