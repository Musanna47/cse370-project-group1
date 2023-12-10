<?php
    global $conn;
    require_once "dbconnect.php";
    if (isset($_SESSION["user_id"])) {
        header("Location: menu-items.php");
        exit();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign in</title>
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
            <p class="large-message">Welcome back!</p>
            <form name="sign-in" method="post">
                <label>Username<br>
                    <input type="text" name="username" required><br>
                </label>
                <label>Password<br>
                    <input type="password" name="password" required><br>
                </label>
                <label>
                    <input type="radio" name="user-type" checked> Customer
                    <input type="radio" name="user-type"> Staff<br>
                </label>
                <input type="submit" name="submit" value="Sign in"><br>
            </form>
            Don't have an account? <a href="sign-up.php" class="inline-link">Sign up</a>
        </main>
    </body>
</html>

<?php
    if (isset($_POST["submit"])) {
        try {
            $query = "SELECT * FROM users
                      WHERE username = '".$_POST["username"]."'
                      AND user_password = '".$_POST["password"]."'";
            $result = mysqli_query($conn, $query);
        } catch (mysqli_sql_exception $ex) {
            exit("Error: ".$ex->getMessage());
        }
        if (empty($row = mysqli_fetch_assoc($result))) {
            unset($_POST);
            echo "Incorrect username or password!<br>";
        } else {
            $_SESSION["user_id"] = $row["user_id"];
            header("Location: menu-items.php");
            exit();
        }
    }