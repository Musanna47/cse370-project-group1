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
        <title>All Restaurants</title>
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
            <h2>All the restaurants</h2>
            <form>
                <label>Search Item<br>
                    <input type="search" name="search" placeholder="Search">
                </label><br>
                <label>Sort by<br>
                    <input type="radio" name="sort" value="newest" checked>Newest First<br>
                    <input type="radio" name="sort" value="oldest">Oldest First<br>
                    <input type="radio" name="sort" value="rating-asc">Rating (Lowest to Highest)<br>
                    <input type="radio" name="sort" value="rating-desc">Rating (Highest to Lowest)<br>
                </label>
                <input type="submit" name="submit" value="Apply">
            </form>
            <div>

            </div>
        </main>
    </body>
</html>