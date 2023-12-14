<?php
    global $conn;
    require_once "dbconnect.php";

    if (empty($_SESSION["user_id"])) {
        exit("Please login first");
    } else {
        $user_id = $_SESSION["user_id"];
    }
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Customer or Staff</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira%20Code">
    </head>
    <body>
        <?php
            include "staff-header.php";
//            include "header.php";
        ?>
        <main>
            <div class="vertical-container">
                <h2>Add:</h2>
                <form action="staff-add-item.php">
                    <input class="red-button" type="submit" name="item" value="Item">
                </form>
                <form action="staff-add-restaurant.php">
                    <input class="red-button" type="submit" name="restaurant" value="Restaurant">
                </form>
                <form action="staff-add-offer.php">
                    <input class="red-button" type="submit" name="offer" value="Offer">
                </form>

                <h2>Update/Delete:</h2>
                <div style="display: flex; width: 1000px; flex-wrap: wrap; justify-content: center ">

                </div>
                <form action="staff-items.php">
                    <input class="red-button" type="submit" name="item" value="Item">
                </form>
                <form action="staff-restaurants.php">
                    <input class="red-button" type="submit" name="restaurant" value="Restaurant">
                </form>
                <form action="staff-offers.php">
                    <input class="red-button" type="submit" name="offer" value="Offer">
                </form>


<!--                Item: <a class="red-button">Add</a>-->
<!--                    <a class="red-button">Update/Remove</a><br>-->
<!--                Restaurant: <a class="red-button">Add</a>-->
<!--                    <a class="red-button">Update/Remove</a><br>-->
<!--                Discount: <a class="red-button">Add</a>-->
<!--                    <a class="red-button">Update/Remove</a><br>-->
<!--                Voucher: <a class="red-button">Add</a>-->
<!--                    <a class="red-button">Update/Remove</a><br>-->
            </div>
        </main>
    </body>
</html>
