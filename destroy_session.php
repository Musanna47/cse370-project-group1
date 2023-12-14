<?php
    global $conn;
    require_once "dbconnect.php";
    session_destroy();
    header("Location: index.php");
