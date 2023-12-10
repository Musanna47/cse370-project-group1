<?php
    global $conn;
    require_once "dbconnect.php";
    if (empty($_SESSION["user_id"])) {
        echo "You must be logged in to make an order<br>";
    }
    try {
        $query = "SELECT * FROM ordered_items
                  GROUP BY food_id";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } catch (mysqli_sql_exception $ex) {
        exit("Error: ".$ex->getMessage());
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menu Items</title>
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
            <h2>Get excited for</h2>
            <div class="row-1">
                <div class="column-1">
                    <a class="image-link" href="">
                        <img src="images/promote-your-food-combo-offers.jpg" alt="offer 1">
                    </a>
                    <a href="">
                        Burger Sale
                    </a>
                </div>
                <div class="column-2">
                    <a class="image-link" href="">
                        <img src="images/offer-combo-food-based-on-the-season.jpg" alt="offer 2">
                    </a>
                    <a class="image-link" href="">
                        Winter Sale
                    </a>
                </div>
            </div>
            <a href="offers.php">See all offers</a>
            <h2>Best Sellers</h2>
            <div>

            </div>
            <a href="menu-items-all.php">See all items</a>
        </main>
    </body>
</html>