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
        <title>Sign up</title>
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
            <p class="large-message">Welcome aboard!</p>
            <form name="sign-up" method="post" action="">
                <label>Name<br>
                    <input type="text" name="name" required><br>
                </label>
                <label>Phone<br>
                    <input type="text" name="phone" required><br>
                </label>
                <label>Email<br>
                    <input type="email" name="email" required><br>
                </label>
                <label>Date of Birth<br>
                    <input type="date" name="date-of-birth" required><br>
                </label>
                <label>Username<br>
                    <input type="text" name="username" required><br>
                </label>
                <label>Password<br>
                    <input type="password" name="password" required><br>
                </label>
                <h2>Address</h2>
                <label>Flat<br>
                    <input type="text" name="flat" required><br>
                </label>
                <label>House<br>
                    <input type="number" name="house" required><br>
                </label>
                <label>Road<br>
                    <input type="text" name="road" required><br>
                </label>
                <label>Zip Code<br>
                    <input type="number" name="zip-code" required><br>
                </label>
                <h3>Area</h3>
                <label>
                    <?php
                        try {
                            $query = "SELECT * FROM area ORDER BY name, city, district";
                            $result = mysqli_query($conn, $query);
                            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        } catch (mysqli_sql_exception $ex) {
                            exit("Error: ".$ex->getMessage());
                        }
                        foreach ($rows as $row) {
                            echo "<input type='radio' name='area' value="
                                .$row["area_id"]."> ";
                            echo ucfirst($row["name"]).
                                 " (City: ".ucfirst($row["city"]).
                                 ", District: ".ucfirst($row["district"]).") <br>";
                        }
                    ?>
                </label>
                <input type="submit" name="submit" value="Sign up"><br>
            </form>
            Already have an account? <a href="" class="inline-link">Sign in</a>
        </main>
    </body>
</html>

<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $date_of_birth = $_POST["date-of-birth"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $flat = $_POST["flat"];
        $house = $_POST["house"];
        $road = $_POST["road"];
        $zip_code = $_POST["zip-code"];
        $area_id = $_POST["area"];
        unset($_POST);

        try {
            $query1 = "INSERT INTO address(flat_no, house_no, 
                        road_no, zip_code, area_id) VALUES 
                        ('$flat', $house, '$road', '$zip_code', $area_id)";
            mysqli_query($conn, $query1);
            $query2 = "SELECT MAX(address_id) FROM address";
            $result = mysqli_query($conn, $query2);
            $row = mysqli_fetch_array($result);
            $address_id = $row[0];
            $query3 = "INSERT INTO users (name, phone, email, date_of_birth, customer_flag, 
                       nid_no, username, user_password, address_id) VALUES 
                       ('$name', '$phone', '$email', '$date_of_birth', 1, NULL,
                        '$username', '$password', $address_id)";
            mysqli_query($conn, $query3);
        } catch (mysqli_sql_exception $ex) {
            echo "Error: ".$ex->getMessage();
        }
    }
