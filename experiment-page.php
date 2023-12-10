<?php
    global $conn;
    require_once "dbconnect.php";
    if (isset($_GET["restaurant"])) {
        echo ($_GET["restaurant"] != '') ? $_GET["restaurant"]."<br>" : "NULL"."<br>";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Restaurant View</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <?php
            $query = "SELECT restaurant_id, name FROM restaurant";
            $result = mysqli_query($conn, $query);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//            echo "<form action='restaurant-view-items.php'>
            echo "<form action='restaurant-view-rating.php'>
                <label for='restaurant_id'>Choose a restaurant: </label>
                <select name='restaurant_id'>
                    <option value='' selected>Please choose an option</option>";
                foreach ($rows AS $row) {
                    $restaurant_id = $row["restaurant_id"];
                    $name = $row["name"];
                    echo "<option value=$restaurant_id>$restaurant_id - $name</option>";
                }
            echo "</select>
                <input type='submit' name='submit' value='Submit'>
            </form>";
        ?>
    </body>
</html>
