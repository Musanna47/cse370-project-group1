<?php
    global $conn;
    require_once "dbconnect.php";

    if (isset($_SESSION["user_id"]))
        $user_id = $_SESSION["user_id"];
    else
        $user_id = 1;
    if (empty($_GET["food_id"])) {
        exit();
    }
    $food_id = $_GET["food_id"];

    if (isset($_GET["submit"]) and $_GET["submit"] == "Remove") {
        $query =
            "DELETE FROM rating WHERE user_id = $user_id
            AND food_id = $food_id";
        mysqli_query($conn, $query);
//        echo "YES";
    }

    if (isset($_GET["submit"]) and $_GET["submit"] == "Rate") {
        if (empty($_GET["stars"]) or $_GET["stars"] == '') {
            echo "<p class='alert'>You have to choose between 1-5 stars!</p>";
        } else {
            $stars = $_GET["stars"];
            $comment = $_GET["comment"];
            $today = date("Y-m-d");
            $query =
                "SELECT COUNT(*) FROM rating
                WHERE user_id = $user_id
                AND food_id = $food_id
                ";
            $result = mysqli_query($conn, $query);
            $rated = (mysqli_fetch_array($result)[0] != 0);
            if ($rated) {
//                echo "YES";
                $query =
                    "UPDATE rating SET stars = $stars, comment = '$comment' 
                    WHERE user_id = $user_id AND food_id = $food_id";
                mysqli_query($conn, $query);
//                $query =
//                    "UPDATE rating SET comment = $comment
//                    WHERE user_id = $user_id AND food_id = $food_id";
//                mysqli_query($conn, $query);
            } else {
//                echo "NO";
                $query =
                    "INSERT INTO rating(user_id, stars, comment, date, 
                            restaurant_flag, restaurant_id, food_id) 
                    VALUES ($user_id, $stars, '$comment', '$today', 0, NULL, $food_id)";
                mysqli_query($conn, $query);
            }
        }
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira%20Code">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <div class="container restaurant-view">
            <?php
                $query1 =
                    "WITH
                        T1 AS (
                            SELECT M.food_id, M.name, R.name AS r_name
                            FROM menu_item M, restaurant R
                            WHERE M.restaurant_id = R.restaurant_id
                            AND M.food_id = $food_id
                        ),
                        T2 AS (
                            SELECT food_id, ROUND(AVG(stars), 1) AS avg_rating
                            FROM rating
                            WHERE food_id IS NOT NULL
                            GROUP BY food_id
                        )
                    SELECT T1.name, T1.r_name, T2.avg_rating
                    FROM T1
                    LEFT JOIN T2
                    ON T1.food_id = T2.food_id
                    ";
//                $query2 =
//                    "SELECT ROUND(AVG(stars), 1) AS avg_rating
//                    FROM rating
//                    WHERE restaurant_id = $restaurant_id
//                    GROUP BY restaurant_id
//                    ";
                try {
                    $result = mysqli_query($conn, $query1);
                    $row = mysqli_fetch_assoc($result);
                    $name = $row["name"];
                    $r_name = $row["r_name"];
                    $avg_rating = $row["avg_rating"];

//                    $result = mysqli_query($conn, $query2);
//                    $row = mysqli_fetch_array($result);
//                    $avg_rating = $row[0];

                    echo "<div class='img-container' '><img src='images/donut.png' alt='donut'></div>
                    <div class='vertical-container half-size-vertical-container float-left restaurant-view'>
                    <div class='restaurant-view'>$name</div>
                    <div class='restaurant-view'>$r_name</div>";
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
                AND food_id = $food_id
                ";
            try {
                $result = mysqli_query($conn, $query);
                $rows = mysqli_fetch_all($result);
                if (count($rows) > 0) {
                    $my_stars = $rows[0][0];
                    echo "You have rated this item $my_stars stars.<br>
                    Update rating? ";
                        echo "<form method='get' action='rate.php'>
                        <input type='hidden' name='food_id' value=$food_id>
                        <input type='submit' name='submit' value='Update'>
                    </form>";
                    echo "<form action='item-view-rating.php'>
                            <input type='hidden' name='food_id' value=$food_id>
                            <input type='submit' name='submit' value='Remove'>
                        </form>
                    ";

                } else {
                    echo "Would you like to rate this item? <br>";
                    echo "<form method='get' action='rate.php'>
                        <input type='hidden' name='food_id' value=$food_id>
                        <input type='submit' name='submit' value='Rate'>
                    </form>";
                }

            } catch (mysqli_sql_exception $ex) {
                exit("Error: ".$ex->getMessage());
            }
        ?>
<!--        <div class="restaurant-view-h2">-->
<!--        -->
<!--        </div>-->
        <div class="vertical-container">
            <?php
                try {
                    $query3 =
                        "SELECT Ra.stars, Ra.comment, Ra.date, U.name
                        FROM users U, rating Ra
                        WHERE U.user_id = Ra.user_id
                        AND food_id = $food_id
                        ";
                    $result = mysqli_query($conn, $query3);
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($items as $row) {
                        $stars = $row["stars"];
                        $comment = $row["comment"];
                        $date = $row["date"];
                        $u_name = $row["name"];
                        echo "<div class='vertical-container-item restaurant-view'>
                            <div class='comment-container'>
                                <div>$u_name</div> 
                                <div class='float-right'>$stars</div>
                            </div>
                            <div>$date</div>  
                            <div class='comment'>$comment</div>
                        </div>";
                    }
                } catch (mysqli_sql_exception $ex) {
                    exit("Error: ".$ex->getMessage());
                }
            ?>
        </div>
    </body>
</html>
