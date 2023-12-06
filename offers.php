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
        <title>Offers</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <img src="images/food-delivery.png" alt="logo" class="logo">
        <h1>BiteBlitz</h1>
            <nav>
                <ul>
                    <li>ITEMS</li>
                    <li>RESTAURANTS</li>
                    <li>ABOUT</li>
                    <li>CONTACT</li>
                </ul>
            </nav>
        </header>
        <main>
            <h2>Here are our latest deals</h2>
            <?php
                try {
                    $query = "SELECT promo_code, percentage, start_date, expiry_date FROM voucher";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($rows as $row) {
                        foreach (array_keys($row) as $key) {
                            echo strtoupper($key).": ".$row[$key]."<br>";
                        }
                        echo "<br";
                    }
                } catch (mysqli_sql_exception $ex) {
                    exit("Error: ".$ex->getMessage());
                }
            ?>
        </main>
    </body>
</html>