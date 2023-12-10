<?php
    if (isset($_SESSION["user_id"]))
        $user_id = "user_id";
    else
        $user_id = 1;
    global $conn;
    require_once "dbconnect.php";
    if (empty($_GET["restaurant_id"])) {
        exit();
    }
    $restaurant_id = $_GET["restaurant_id"];
//    if (isset($_GET["insert"]))
//        $query = "INSERT INTO rating()";
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
        <div class="container restaurant-view">
            <?php
                $query1 =
                    "SELECT R.name, Ar.name AS area, Ar.city, Ar.district
                    FROM restaurant R, address A, area Ar, rating Ra
                    WHERE R.address_id = A.address_id
                    AND A.area_id = Ar.area_id
                    AND R.restaurant_id = Ra.restaurant_id
                    AND R.restaurant_id = 3;
                    ";
                $query2 =
                    "SELECT ROUND(AVG(stars), 1) AS avg_rating
                    FROM rating
                    WHERE restaurant_id = 3
                    GROUP BY restaurant_id
                    ";
                try {
                    $result = mysqli_query($conn, $query1);
                    $row = mysqli_fetch_assoc($result);
                    $r_name = $row["name"];
                    $area = $row["area"];
                    $city = $row["city"];
                    $district = $row["district"];

                    $result = mysqli_query($conn, $query2);
                    $row = mysqli_fetch_array($result);
                    $avg_rating = $row[0];

                    echo "<div class='img-container' '><img src='images/donut.png' alt='donut'></div>
                    <div class='vertical-container half-size-vertical-container float-left restaurant-view'>
                    <div class='restaurant-view'>$r_name</div>
                    <div class='restaurant-view'>$area, $city, $district</div>";
                    if (isset($avg_rating))
                        echo "<div class='restaurant-view'>$avg_rating</div>";
                    echo "</div>";
                } catch (mysqli_sql_exception $ex) {
                    exit("Error: ".$ex->getMessage());
                }
            ?>
        </div>
        <?php
            $query =
                "SELECT stars 
                FROM rating 
                WHERE user_id = $user_id 
                    AND restaurant_id = $restaurant_id
                ";
            try {
                $result = mysqli_query($conn, $query);
                $rows = mysqli_fetch_all($result);
                if (count($rows) > 0) {
                    $my_stars = $rows[0][0];
                    echo "You have rated this restaurant $my_stars stars.<br>
                    Update rating? ";
                        echo "<form method='get' action='restaurant-view-rating.php'>
                        <input type='hidden' name='restaurant_id' value=$restaurant_id>
                        <input type='hidden' name='update' value=1>
                        <select name='rating'>
                            <option value='' selected>Please choose an option</option>
                            <option value=5>5 stars</option>
                            <option value=4>4 stars</option>
                            <option value=3>3 stars</option>
                            <option value=2>2 stars</option>
                            <option value=1>1 star</option>
                        </select>
                        <input type='submit' name='submit' value='Submit'>
                        <input type='submit' name='submit' value='Remove'>
                    </form>";

                } else {
                    echo "Would you like to rate this restaurant? <br>";
                    echo "<form method='get' action='restaurant-view-rating.php'>
                        <input type='hidden' name='restaurant_id' value=$restaurant_id>
                        <input type='hidden' name='insert' value=1>
                        <select name='rating'>
                            <option value='' selected>Please choose an option</option>
                            <option value=5>5 stars</option>
                            <option value=4>4 stars</option>
                            <option value=3>3 stars</option>
                            <option value=2>2 stars</option>
                            <option value=1>1 star</option>
                        </select>
                        <input type='submit' name='submit' value='Submit'>
                    </form>";
                }

            } catch (mysqli_sql_exception $ex) {
                exit("Error: ".$ex->getMessage());
            }
        ?>
        <div class="restaurant-view-h2">
            <form action="restaurant-view-items.php" method="get">
                <input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id?>">
                <label for="search">Search Item:
                    <input type="search" name="search" placeholder="Search">
                </label>
                <label for="sort">Sort by:
                    <select name="sort">
                        <option name="Newest First" value="food_id DESC" selected>Newest First</option>>
                        <option name="Oldest First" value="food_id ASC">Oldest First</option>>
                        <option name="Alphabetically" value="name ASC">Alphabetically</option>>
                        <option name="Price (Lowest to Highest)" value="final_price ASC">Price (Lowest to Highest)</option>>
                        <option name="Price (Highest to Lowest)" value="final_price DESC">Price (Highest to Lowest)</option>>
                        <option name="Rating (Lowest to Highest)" value="avg_rating ASC">Rating (Lowest to Highest)</option>>
                        <option name="Rating (Highest to Lowest)" value="avg_rating DESC">Rating (Highest to Lowest)</option>>
                    </select>
                </label>
                <input type="submit" name="submit" value="Apply">
            </form>
        </div>
        <div class="vertical-container">
            <?php
                try {
                    $query3 =
                        "SELECT Ra.stars, Ra.comment, Ra.date, U.name
                        FROM users U, rating Ra
                        WHERE U.user_id = Ra.user_id
                        AND restaurant_id = 3
                        ";
                    if (isset($_GET["submit"])) {
                        if (isset($_GET["search"])) {
                            if ($_GET["search"] != "") {
                                $query3 .= " WHERE name LIKE '%".$_GET["search"]."%'";
                            }
                        }
                        if (isset($_GET["sort"])) {
                            $query3 .= " ORDER BY ".$_GET["sort"];
                        }
                    }
                    $result = mysqli_query($conn, $query3);
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($items as $row) {
                        $stars = $row["stars"];
                        $comment = $row["comment"];
                        $date = $row["date"];
                        $u_name = $row["name"];
                        echo "<div class='vertical-container-item restaurant-view'>
                            <div style='display: flex;'>
                                <div style='flex-grow: 1;'>$u_name</div> 
                                <div style='flex-grow: 1; text-align: right'>$stars</div>
                            </div>
                            <div>$date</div>  
                            <div style='padding: 10px; width: 100%; border-radius: 10px; background: lightblue'>$comment</div>
                        </div>";
                    }
                } catch (mysqli_sql_exception $ex) {
                    exit("Error: ".$ex->getMessage());
                }
            ?>
        </div>
    </body>
</html>
