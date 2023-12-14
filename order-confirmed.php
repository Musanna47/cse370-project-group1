<?php
    global $conn;
    require_once "dbconnect.php";

    if (empty($_SESSION["user_id"])) {
        echo "You must be logged in to make an order<br>";
        header("Location: index.php");
        exit();
    } else {
        $user_id = $_SESSION["user_id"];
    }
//    if (empty($_GET["restaurant_id"]) and empty($_GET["food_id"])) {
//        exit();
//    }
    try {
        $today = date('Y-m-d');

        $query = "SELECT address_id FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $address_id = mysqli_fetch_array($result)[0];
        $query = "SELECT area_id FROM address WHERE address_id = $address_id";
        $result = mysqli_query($conn, $query);
        $area_id = mysqli_fetch_array($result)[0];

        $query =
            "SELECT D.driver_id
            FROM driver D, address A, area Ar
            WHERE A.area_id = Ar.area_id
            AND d.address_id = A.address_id
            AND Ar.area_id = $area_id
            ORDER BY RAND() LIMIT 1
            ";
        $result = mysqli_query($conn, $query);
        if (empty($row = mysqli_fetch_array($result))) {
            $query =
                "SELECT D.driver_id
                FROM driver D, address A, area Ar
                WHERE A.area_id = Ar.area_id
                AND d.address_id = A.address_id
                ORDER BY RAND() LIMIT 1
                ";
            $result = mysqli_query($conn, $query);
            $driver_id = mysqli_fetch_array($result)[0];
        } else {
            $driver_id = $row[0];
        }

        $voucher_id = 0;
        if ($_GET["voucher_id"] and $_GET["voucher_id"] > 0) {
            $query = "SELECT COUNT(*) FROM voucher_used 
                WHERE user_id = $user_id AND voucher_id = ".$_GET["voucher_id"];
            $result = mysqli_query($conn, $query);
            if (mysqli_fetch_array($result)[0] == 0)
                $voucher_id = $_GET["voucher_id"];
        }

        $query =
            "WITH
                T1 AS (
                    SELECT M.food_id, M.price, C.quantity
                    FROM menu_item M, cart C
                    WHERE user_id = $user_id
                        AND C.food_id = M.food_id
                ),
                T2 AS (
                    SELECT DI.food_id, MAX(D.percentage) AS percentage FROM discount D
                    JOIN discounted_items DI
                    ON D.discount_id = DI.discount_id
                    WHERE expiry_date > NOW()
                    GROUP BY DI.food_id
                ),
                T3 AS (
                    SELECT T1.food_id, T1.price, T1.quantity, T2.percentage
                    FROM T1 LEFT JOIN T2
                    ON T1.food_id = T2.food_id
                ),
                T4 AS (
                SELECT food_id, quantity,
                CASE
                    WHEN percentage IS NULL THEN price
                    ELSE ROUND(price - price * percentage / 100, 2)
                END AS price
                FROM T3
                )
            SELECT * FROM T4
            ";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (count($rows) == 0) {
            header("Location: cart.php");
            exit();
        }

        $total_price = 60;
        foreach ($rows as $row) {
            $total_price += $row["price"] * $row["quantity"];
        }
        if ($voucher_id > 0) {
            $query = "SELECT percentage FROM voucher WHERE voucher_id = $voucher_id";
            $result = mysqli_query($conn, $query);
            $percentage = mysqli_fetch_array($result)[0];
            $total_price -= $total_price * $percentage / 100;
        }

        if ($voucher_id > 0) {
            $query = "INSERT INTO orders(date, delivery_status, total_price, user_id,
                       address_id, driver_id, voucher_id) VALUES
                    ('$today', 'processing', $total_price, $user_id, $address_id, $driver_id, $voucher_id)";
        } else {
            $query = "INSERT INTO orders(date, delivery_status, total_price, user_id,
                       address_id, driver_id, voucher_id) VALUES
                    ('$today', 'processing', $total_price, $user_id, $address_id, $driver_id, NULL)";
        }
        $result = mysqli_query($conn, $query);
        if ($result) {
            $query = "SELECT MAX(order_id) FROM orders";
            $result = mysqli_query($conn, $query);
            if (!empty($max_order = mysqli_fetch_array($result))) {
                $order_id = $max_order[0];
                $item_no = 0;
                foreach ($rows as $row) {
                    $item_no++;
                    $food_id = $row["food_id"];
                    $quantity = $row["food_id"];
                    $price = $row["price"];
                    $query = "INSERT INTO ordered_items(order_id, item_no, food_id, quantity, price)
                        VALUES ($order_id, $item_no, $food_id, $quantity, $price)";
                    mysqli_query($conn, $query);
                }
                $query = "DELETE FROM cart WHERE user_id = $user_id";
                mysqli_query($conn, $query);
                $query = "UPDATE users SET due_amount = due_amount + $total_price WHERE user_id = $user_id";
                mysqli_query($conn, $query);
                if ($voucher_id > 0) {
                    $query = "INSERT INTO voucher_used (voucher_id, user_id)
                            VALUES ($voucher_id, $user_id)";
                    mysqli_query($conn, $query);
                }
            }
        }
    } catch (mysqli_sql_exception $ex) {
        exit("Error: ".$ex->getMessage().$ex->getLine());
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Confirm Order</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira%20Code">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <main>
            <div class="simple-div">
                <h2>Your order has been confirmed.</h2>
                <h2>Proceed to payment?</h2>
                <div class="simple-flexbox">
                    <div>
                        <div class="simple-flexbox">
                            <form action="payment.php">
                                <input class="red-button medium-sized-button" type="submit" name="submit" value="Yes">
                            </form>
                            <form action="homepage.php">
                                <input class="red-button medium-sized-button" type="submit" name="submit" value="No">
                            </form>

                        </div>

                    </div>


                </div>
            </div>
        </main>
    </body>
</html>
