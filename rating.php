<?php
    global $conn;
    require_once "dbconnect.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Rating</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <main>
            <h2>Rate a restaurant or food item</h2>
            <form>
                <label>
                    <input type="radio" name="rating-type" value="restaurant" checked> Restaurant
                    <input type="radio" name="rating-type" value="food-item"> Food item
                </label>
                <label>
                    <input type="search" name="search" placeholder="Search">
                </label>
                <input type="submit" name="submit" value="Search"><br>
            </form>
            <?php
//                try {
//                    $query = "SELECT promo_code, percentage, start_date, expiry_date FROM voucher";
//                    $result = mysqli_query($conn, $query);
//                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//                    foreach ($rows as $row) {
//                        foreach (array_keys($row) as $key) {
//                            echo strtoupper($key).": ".$row[$key]."<br>";
//                        }
//                        echo "<br";
//                    }
//                } catch (mysqli_sql_exception $ex) {
//                    exit("Error: ".$ex->getMessage());
//                }
            ?>
            Choose rating
            <form>
                <label>
                    <input type="radio" name="rating" value=5 checked>5 star
                    <input type="radio" name="rating" value=4>4 star
                    <input type="radio" name="rating" value=3>3 star
                    <input type="radio" name="rating" value=2>2 star
                    <input type="radio" name="rating" value=1>1 star
                </label><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </main>

    </body>
</html>