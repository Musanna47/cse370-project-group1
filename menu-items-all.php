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
        <title>All Items</title>
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
            <h2>Here's everything we got</h2>
            <form>
                <label>Search Item<br>
                    <input type="search" name="search" placeholder="Search">
                </label><br>
                <label>Sort by<br>
                    <input type="radio" name="sort" value="newest" checked>Newest First<br>
                    <input type="radio" name="sort" value="oldest">Oldest First<br>
                    <input type="radio" name="sort" value="price-asc">Price (Lowest to Highest)<br>
                    <input type="radio" name="sort" value="price-desc">Price (Highest to Lowest)<br>
                    <input type="radio" name="sort" value="rating-asc">Rating (Lowest to Highest)<br>
                    <input type="radio" name="sort" value="rating-desc">Rating (Highest to Lowest)<br>
                </label>
                <label>Filter by<br>
                    Restaurants<br>
                    <?php
                        try {
                            $restaurant_query = "SELECT restaurant_id, name
                                                 FROM restaurant ORDER BY name";
                            $result = mysqli_query($conn, $restaurant_query);
                            $restaurants = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        } catch (mysqli_sql_exception $ex) {
                            exit("Error: ".$ex->getMessage());
                        }
//                        foreach ($restaurants as $restaurant) {
//                            echo "<input type='checkbox' name='".$row."'>"
//                        }
                    ?>
                    Category<br>
                    <?php
                        try {
                            $category_query = "SELECT DISTINCT category FROM menu_item";
                            $result = mysqli_query($conn, $category_query);
                            $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        } catch (mysqli_sql_exception $ex) {
                            exit("Error: ".$ex->getMessage());
                        }
//                        foreach ($categories as $category) {
//
//                        }
                    ?>
                </label>
                <input type="submit" name="submit" value="Apply">
            </form>
            <div>

            </div>
        </main>
    </body>
</html>