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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hedvig%20Letters%20Serif">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira%20Code">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="logo-block">
                    <img class="logo" src="images/food-delivery.png" alt="Logo">
                    <h1>BiteBlitz</h1>
                </div>
                <div class="link-block">
                    <a href="">ITEMS</a>
                    <a href="">RESTAURANTS</a>
                    <a href="">ABOUT</a>
                    <a href="">CONTACT</a>
                </div>
            </nav>
        </header>
        <main>
            <img class="rectangle-background" src="images/red-white-rectangle.png" alt="Rectangle">
            <div class="container">
                <div class="container-left">
                    <p>you <span class="yellow-color">hit</span> order we<br>
                        do the <span class="yellow-color">running!</span></p><br>
                </div>
                <div class="container-right">
                    <p>HELO</p>
                </div>
            </div>
        </main>
    </body>
</html>


<?php

?>