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
        <title>Home</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira%20Code">
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <main>
            <div class='simple-flexbox no-style'>
                <div>
                    <p>you <em>hit</em> the order<br>
                       we do the <em>running!</em></p><br>
                    <a class="red-button" href="sign-up.php">Sign up</a>
                    <a class="red-button" href="customer-or-staff.php">Sign in</a><br>

                </div>
                <div>
                    <img class="half-size" src="images/pexels-norma-mortenson-4393426.jpg" alt="index-image">
                </div>
            </div>
        </main>
            <!--
            <footer>
                <h2>About Us</h2>
                <div class="container">
                    <div class="row-1">
                        <div class="item-1">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis dicta eaque ex
                            obcaecati odit quos sapiente soluta velit voluptatem! Consequatur consequuntur, ea molestiae
                            natus odit quis veritatis. Error, possimus.
                        </div>
                        <div class="item-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis dicta eaque ex
                            obcaecati odit quos sapiente soluta velit voluptatem! Consequatur consequuntur, ea molestiae
                            natus odit quis veritatis. Error, possimus.
                        </div>
                    </div>
                        <div class="item-1"></div>
                        <div class="item-2"></div>
                    <div class="row-2"></div>
                </div>
            </footer>
            -->
    </body>
</html>

<?php

?>