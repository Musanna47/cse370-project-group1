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
        <title>Offers</title>
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
            <h2>Here are our latest deals</h2>
            <div class="container">
                <?php
                    try {
                        $query =
                            "SELECT voucher_id AS id, title, description, promo_code, percentage,
                                start_date, expiry_date
                            FROM voucher
                            UNION
                            (SELECT discount_id AS id, title, description, NULL AS promo_code, percentage,
                                start_date, expiry_date
                            FROM discount)
                            ORDER BY start_date DESC
                            ";
                        $result = mysqli_query($conn, $query);
                        $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($offers as $row) {
                            $id = $row["id"];
                            $title = $row["title"];
                            $description = $row["description"];
                            $promo_code = $row["promo_code"];
                            $percentage = $row["percentage"];
                            $start_date = $row["start_date"];
                            $expiry_date = $row["expiry_date"];

                            echo "<div class='container-item'>
                                <img src='images/donut.png' alt='donut'>
                                <div class='title'>$title</div>";
                            echo "<div>Expiry Date: $expiry_date</div>";
                            echo (is_null($promo_code)) ?  "<br>" : "<div>PROMO_CODE: $promo_code</div>";
                            echo "<div>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus corporis molestias quibusdam reprehenderit! 
                                    Accusantium consequatur dicta, et eveniet exercitationem fuga impedit minus, nobis, nulla possimus quia quis reiciendis rem ut. 
                                </div>
                            </div>";
                        }
                    } catch (mysqli_sql_exception $ex) {
                        exit("Error: ".$ex->getMessage());
                    }
                ?>

            </div>
        </main>
    </body>
</html>
