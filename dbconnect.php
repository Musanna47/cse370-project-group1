<?php
    session_start();
    try {
        $conn = mysqli_connect(
            hostname: "localhost",
            username: "root",
            database: "cse370_project_group1"
        );
    } catch (mysqli_sql_exception $ex) {
        exit("Error: ".$ex->getMessage());
    }
