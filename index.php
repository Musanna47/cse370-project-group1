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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/cse370-project-group1">HOME</a></li>
                <li><a href="http://localhost/cse370-project-group1">SETTINGS</a></li>
                <li><a href="http://localhost/cse370-project-group1">ABOUT</a></li>
                <li><a href="http://localhost/cse370-project-group1">CONTACT</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="center-container login">
            <h1>Login</h1>
            <form action="" method="post" class="center-container-inner">
                <label for="username">Username<br>
                    <input type="text" name="username" required>
                </label><br>
                <label for="password">Password<br>
                    <input type="password" name="password" required>
                </label><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </main>
    <footer>
        <div>Made by CSE370 Group 1 - Fall 2023</div>
    </footer>
</body>
</html>

<?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM user WHERE username = '$username'";
        try {
            $result = mysqli_query($conn, $query);
        } catch (mysqli_sql_exception $ex) {
            exit("Error: ".$ex->getMessage());
        }
        if (is_null($row = mysqli_fetch_assoc($result))) {
            echo "<div class='message'>Username does not exist in the database!<br></div>";
            unset($_POST);
        } elseif ($password != $row["password"]) {
            echo "<div class='message'>Wrong password!<br></div>";
            unset($_POST);
        } else {
            header("Location: logged-in.php");
            exit();
        }
    }
