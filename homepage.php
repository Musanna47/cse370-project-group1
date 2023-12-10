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
        <title>Homepage</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <?php
        include "header.php";
    ?>
    <main>
        <div class="container">
            <div class="vertical-container half-size-vertical-container">
                <h2>Newest Items</h2>
                <?php
                    $query1 = "SELECT * from menu_item ORDER BY food_id DESC LIMIT 10";
                    $result = mysqli_query($conn, $query1);
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($items as $row) {
                        $name = $row["name"];
                        echo "<div class='vertical-container-item'>
                            <img src='images/donut.png' alt='donut'>
                            <div class='vertical-container-inner-1'>
                                <div class='title'>$name</div>
                                <div>r_name</div>
                            </div>
                        </div>";
                    }

                ?>
            </div>
            <div class="vertical-container half-size-vertical-container">
                <h2>Most Popular</h2>
                <?php
                    $query1 = "SELECT * from menu_item ORDER BY food_id DESC LIMIT 10";
                    $result = mysqli_query($conn, $query1);
                    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($items as $row) {
                        $name = $row["name"];
                        echo "<div class='vertical-container-item'>
                            <img src='images/donut.png' alt='donut'>
                            <div class='vertical-container-inner-1'>
                                <div class='title'>$name</div>
                                <div>r_name</div>
                            </div>
                        </div>";
                    }

                ?>
            </div>

        </div>
    </main>
    </body>
</html>
