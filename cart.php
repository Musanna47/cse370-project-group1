<?php
    global $conn;
    require_once "dbconnect.php";
//    foreach (array_keys($_SESSION) as $key) {
//        echo $key,":",$_SESSION[$key],"<br>";
//    }
    if (empty($_SESSION["user_id"]))
        exit("Please login");
    $user_id = $_SESSION["user_id"];
    if (isset($_POST["remove"])) {
        $query = "DELETE FROM cart 
                WHERE user_id = $user_id AND food_id = ".$_POST["food_id"];
        try {
            mysqli_query($conn, $query);
        } catch (mysqli_sql_exception $ex) {
            exit("Error: ".$ex->getMessage());
        }
        unset($_POST);
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cart</title>
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
            <a href="">Continue Shopping</a><br>
            <h2>Shopping cart</h2>
            <p>
                You have
                <?php
                    try {
                        $query = "SELECT COUNT(*) FROM cart WHERE user_id = $user_id";
                        $result = mysqli_query($conn, $query);
                        echo mysqli_fetch_array($result)[0];
                    } catch (mysqli_sql_exception $ex) {
                        exit("Error: ".$ex->getMessage());
                    }
                ?>
                item(s) in your cart<br>
            </p>
            <div class="vertical-container">
                <?php
                    $query1 =
                        "WITH
                            T1 AS (
                                SELECT M.food_id, M.name, M.price, R.name AS r_name, C.quantity
                                FROM menu_item M, restaurant R, cart C
                                WHERE user_id = 1
                                    AND M.restaurant_id = R.restaurant_id
                                    AND C.food_id = M.food_id
                            ),
                            D1 AS (
                                SELECT DI.food_id, MAX(D.percentage) AS percentage FROM discount D
                                JOIN discounted_items DI
                                ON D.discount_id = DI.discount_id
                                WHERE expiry_date > NOW()
                                GROUP BY DI.food_id
                            ),
                            T2 AS (
                                SELECT T1.food_id, T1.name, T1.r_name,
                                    T1.price, T1.quantity, D1.percentage
                                FROM T1 LEFT JOIN D1
                                ON T1.food_id = D1.food_id
                            ),
                            T3 AS (
                            SELECT food_id, name, r_name, quantity,
                            CASE
                                WHEN percentage IS NULL THEN price
                                ELSE ROUND(price - price * percentage / 100, 2)
                            END AS price
                            FROM T2
                            )
                        SELECT * FROM T3
                        ";
                    $result = mysqli_query($conn, $query1);
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $total_price = 0;
                    foreach ($items AS $row) {
                        $food_id = $row["food_id"];
                        $name = $row["name"];
                        $r_name = $row["r_name"];
                        $quantity = $row["quantity"];
                        $price = $row["price"];
                        $total_price += $price * $quantity;

                        echo "<div class='vertical-container-item'>
                            <img src='images/donut.png' alt='donut'>
                            <div class='vertical-container-inner-1'>
                                <div class='title'>$name</div>
                                <div>$r_name</div>
                            </div>
                            <div class='vertical-container-inner-2'>
                                <span>$quantity</span>
                            </div>
                            <div class='vertical-container-inner-3'>
                                <span>$price</span>
                            </div>                            
                            <div class='vertical-container-inner-4'>
                                <form method='post' action='cart.php'>
                                    <input type='hidden' name='food_id' value='$food_id'>
                                    <input type='submit' name='remove' value='RM' class='red-button'>
                                </form>
                            </div>                            
                        </div>";
//                        echo $name, $r_name, $quantity, $price, "<br>";
                    }
                ?>
            </div>
            <div>
                <form>
                    <label>Enter voucher<br>
                        <input type="text" name="voucher"><br>
                    </label>
                        <?php
                            echo "Subtotal: $total_price<br>
                                Shipping: 60<br>
                                Total: ". $total_price + 60 ."<br>";
                        ?>
                    <input type="submit" name="submit" value="Checkout">
                </form>
            </div>
        </main>
    </body>
</html>