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
            <form method="post" action="">
                <label>Search Item<br>
                    <input type="search" name="search" placeholder="Search">
                </label><br>
                <label>Sort by<br>
                    <input type="radio" name="sort" value="name ASC" checked>Alphabetically<br>
                    <input type="radio" name="sort" value="avg_rating ASC">Rating (Lowest to Highest)<br>
                    <input type="radio" name="sort" value="avg_rating DESC">Rating (Highest to Lowest)<br>
                </label>
                <input type="submit" name="submit" value="Apply">
            </form>
            <div>
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
                        if (isset($_POST["submit"])) {
                            if ($_POST["search"] != "") {
                                $query1 .= " WHERE name LIKE '%".$_POST["search"]."%'";
                            }
                            $query1 .= " ORDER BY ".$_POST["sort"];
                            $result = mysqli_query($conn, $query1);
                        } else {
                            $result = mysqli_query($conn, $query1." ORDER BY name");
                        }
                        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($items as $row) {
                            foreach (array_keys($row) as $key) {
                                echo $key." : ".$row[$key]."<br>";
                            }
                            echo "<br>";
                        }
                    } catch (mysqli_sql_exception $ex) {
                        exit("Error: ".$ex->getMessage());
                    }
                ?>
            </div>
        </main>
    </body>
</html>