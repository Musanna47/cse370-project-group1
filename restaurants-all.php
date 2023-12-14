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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira%20Code">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <main>
            <h2>All the restaurants</h2>
            <div class="restaurant-view-h2">
                <form method="get" action="">
                    <label>Search Item
                        <input type="search" name="search" placeholder="Search">
                    </label>
                    <label>Sort by
                        <select name="sort">
                            <option value="name ASC" selected>Alphabetically</option>
                            <option value="avg_rating ASC">Rating (Lowest to Highest)</option>
                            <option value="avg_rating DESC">Rating (Highest to Lowest)</option>
                        </select>
    <!--                    <input type="radio" name="sort" value="name ASC" checked>Alphabetically<br>-->
    <!--                    <input type="radio" name="sort" value="avg_rating ASC">Rating (Lowest to Highest)<br>-->
    <!--                    <input type="radio" name="sort" value="avg_rating DESC">Rating (Highest to Lowest)<br>-->
                    </label>
                    <input type="submit" name="submit" value="Apply">
                </form>

            </div>
                <?php
                    try {
                        $query1 =
                            "WITH
                                A1 AS (
                                    SELECT R.restaurant_id, ROUND(AVG(Ra.stars), 1) AS avg_rating
                                    FROM restaurant R, rating Ra
                                    WHERE R.restaurant_id = Ra.restaurant_id
                                    GROUP BY R.restaurant_id
                                ),
                                R1 AS (
                                    SELECT R.restaurant_id, R.name, A1.avg_rating
                                    FROM restaurant R
                                    LEFT JOIN A1
                                    ON R.restaurant_id = A1.restaurant_id
                                )
                            SELECT * FROM R1                            
                            ";
                        if (isset($_GET["submit"])) {
                            if ($_GET["search"] != "") {
                                $query1 .= " WHERE name LIKE '%".$_GET["search"]."%'";
                            }
                            $query1 .= " ORDER BY ".$_GET["sort"];
                            $result = mysqli_query($conn, $query1);
                        } else {
                            $result = mysqli_query($conn, $query1." ORDER BY name");
                        }
                        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
//                        foreach ($items as $row) {
//                            $food_id = $row["restaurant_id"];
//                            $name = $row["restaurant_id"];
//                            $r_name = $row["restaurant_id"];
//                            $avg_rating = $row["restaurant_id"];
//                            $price = $row["restaurant_id"];
//                            $final_price = $row["restaurant_id"];
//
//                            echo "<div class='container-item'>";
//                            echo "<img src='images/donut.png' alt='food'>";
//                            echo "<div>$name</div>";
//                            if (is_null($avg_rating)) {
//                                echo "<div class='row'>
//                                    <div>$r_name </div>
//                                    <div class='float-right'>N/A</div>
//                                </div>";
//                            } else {
//                                echo "<div class='row'>
//                                    <div>$r_name </div>
//                                    <div class='float-right'>$avg_rating</div>
//                                </div>";
//                            }
//                            echo "<div>";
//                            if ($price != $final_price) {
//                                echo "<s>$price</s>";
//                            }
//                            echo " $final_price</div>";
//                            echo "<div class='float-right'>
//                                <form class='inline-div' method='get' action='rating.php'>
//                                    <input type='hidden' name='food_id' value='$food_id'>
//                                    <input type='submit' name='submit' value='rate' class='red-button'>
//                                </form>
//                                <form class='inline-div' method='get' action='cart.php'>
//                                    <input type='hidden' name='food_id' value='$food_id'>
//                                    <input type='submit' name='submit' value='add to cart' class='red-button'>
//                                </form>
//                            </div>";
//
//
//
//
//                        }
                    } catch (mysqli_sql_exception $ex) {
                        exit("Error: ".$ex->getMessage());
                    }
                ?>




            <div class="container">
                <?php
                    try {
                        $query1 =
                            "WITH
                                A1 AS (
                                    SELECT R.restaurant_id, ROUND(AVG(Ra.stars), 1) AS avg_rating
                                    FROM restaurant R, rating Ra
                                    WHERE R.restaurant_id = Ra.restaurant_id
                                    GROUP BY R.restaurant_id
                                ),
                                R1 AS (
                                    SELECT R.restaurant_id, R.name, A1.avg_rating
                                    FROM restaurant R
                                    LEFT JOIN A1
                                    ON R.restaurant_id = A1.restaurant_id
                                )
                            SELECT * FROM R1                            
                            ";
                        if (isset($_GET["submit"])) {
                            if ($_GET["search"] != "") {
                                $query1 .= " WHERE name LIKE '%".$_GET["search"]."%'";
                            }
                            $query1 .= " ORDER BY ".$_GET["sort"];
                            $result = mysqli_query($conn, $query1);
                        } else {
                            $result = mysqli_query($conn, $query1." ORDER BY name");
                        }
                        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($items as $row) {
                            $restaurant_id = $row["restaurant_id"];
                            $name = $row["restaurant_id"];
                            $r_name = $row["name"];
                            $avg_rating = $row["avg_rating"];
                            $price = $row["restaurant_id"];
                            $final_price = $row["restaurant_id"];

                            echo "<div class='container-item'>";
                            echo "<img src='images/donut.png' alt='food'>";
//                            echo "<div>$name</div>";
                            if (is_null($avg_rating)) {
                                echo "<div class='row'>
                                    <div>$r_name </div>
                                    <div class='float-right'>N/A</div>
                                </div>";
                            } else {
                                echo "<div class='row'>
                                    <div>$r_name </div>
                                    <div class='float-right'>$avg_rating</div>
                                </div>";
                            }
//                            echo "<div>";
//                            if ($price != $final_price) {
//                                echo "<s>$price</s>";
//                            }
//                            echo " $final_price</div>";
                            echo "<div class='float-right'>
                                <form class='inline-div' method='get' action='rate.php'>
                                    <input type='hidden' name='restaurant_id' value='$restaurant_id'>
                                    <input type='submit' name='submit' value='rate' class='red-button'>
                                </form>
                                <form class='inline-div' method='get' action='restaurant-view-items.php'>
                                    <input type='hidden' name='restaurant_id' value='$restaurant_id'>
                                    <input type='submit' name='submit' value='visit' class='red-button'>
                                </form>
                            </div>";

                            //                            foreach (array_keys($row) as $key) {
//                                echo $key." : ".$row[$key]."<br>";
//                            }
                            echo "</div>";
                        }
                    } catch (mysqli_sql_exception $ex) {
                        exit("Error: ".$ex->getMessage());
                    }
                ?>
            </div>

        </main>
    </body>
</html>