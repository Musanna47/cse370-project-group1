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
                        $query = "SELECT COUNT(*) FROM cart";
                        $result = mysqli_query($conn, $query);
                        echo mysqli_fetch_array($result)[0];
                    } catch (mysqli_sql_exception $ex) {
                        exit("Error: ".$ex->getMessage());
                    }
                ?>
                item(s) in your cart<br>
            </p>
            <div>
                <form>
                    <label>Enter voucher<br>
                        <input type="text" name="voucher"><br>
                    </label>
                    Subtotal: <br>
                    Shipping: <br>
                    Total: <br>
                    <input type="submit" name="submit" value="Checkout">
                </form>
            </div>
        </main>
    </body>
</html>