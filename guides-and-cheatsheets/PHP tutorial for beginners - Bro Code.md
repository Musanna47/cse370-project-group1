# PHP tutorial for beginners - Bro Code

[Link to Playlist](https://www.youtube.com/playlist?list=PLZPZq0r_RZOO6bGTY9jbLOyF_x6tgwcuB)
[PHP Operators - W3Schools](https://www.w3schools.com/php/php_operators.asp)

## Video 1 (2-Nov-2023)
- First php code: save as index.php
```php
<?php
    echo "Hello World!<br>";
    echo "I'm so cool";
    // This is a comment
    /* Here is
       a multiline
       comment
    */
?>
```

## Video 2 (2-Nov-2023)
- Variables and data types
```php
<?php
    $name = "Bro Code";
    echo $name;
    
    $food = 'chocolate';
    echo " likes {$food}<br>";
    
    $age = 21;
    echo "He is {$age} years old <br>";
    
    $price = 134.99525000;
    echo "The price of {$food} is \${$price}<br>";
    
    $is_sleepy = true;
    $is_angry = false;
    echo "Is he sleepy? - {$is_sleepy}<br>";
    echo "Is he angry? - {$is_angry}<br>"; // false echoes/prints nothing
    
    $total_salary = 100 * ($age + $price);
    echo "Total salary is \${$total_salary}<br>";
?>
```

## Video 3 (3-Nov-2023)
- Arithmetic: 
```php
// + - * / % ** (same as python - except floor division)
// Increment/decrement operator (same as C++)
// Operator precedence (same as python)
```

## Video 4 (3-Nov-2023)
- get and post (important)
```php
// Use of $_GET and $_POST and their difference
// Both are used to get value from HTML forms
// Get is less secure and appends value to the URL
// Post is more secure and does not append value to the URL
// <form action="filename.php method="get/post"></form>
echo "username: {$_GET["username"]}<br>";
// OR
echo "password: {$_POST["password"]}<br>";
```

## Video 5 (3-Nov-2023)
- Useful math functions
```php
// abs(), round(), floor(), ceil(), sqrt(), pow()
// max(), min(), pi(), rand()
<?php
    echo rand(1, 10); // returns random number between 1 and 10 (inclusive)
```

## Video 6 (3-Nov-2023)
- if statements
```php
<?php
    if ($x) {
        
    } elseif ($y) {
        
    } else {
        
    }
```

## Video 7 (3-Nov-2023)
- Logical operators
```php
```

## Video 8 (3-Nov-2023)
- switch statements
```php
<?php
    switch ($x) {
        case 0:
            echo "YES";
            break;
        case 1:
        case 2:
        case 3:
            echo "NO";
            break;
        default:
            echo "IDK";
    }
```

## Video 9 (3-Nov-2023)
- for loops
```php
<?php
    $x = 10;

    for ($i = 5; $i < $x; $i++) {
        echo $i * 10 . "<br>";
    }
```

## Video 10 (3-Nov-2023)
- while loops
```php
```

## Video 11 (3-Nov-2023)
- PHP arrays (important)
    - foreach(arr as element) {}
    - count(arr) / sizeof(arr)
    - array_push(arr, ...elements)
    - array_pop(arr)
    - array_shift(arr)
    - array_reverse(arr)
```php
<?php
    $people = array("sam", 'lake', 'jake', 'wake', 'alan');

    // for loop
    for ($i = 0; $i < sizeof($people); $i++)
        echo $people[$i]."<br>";
    echo "<br>";

    // foreach loop
    foreach ($people as $person)
        echo $person."<br>";
    echo "<br>";

    $people[count($people) - 1] = 'mango';
    echo "Popped: ".array_pop($people)."<br><br>";
    array_push($people, 'ram', 'rem', 'emilia');
    echo "Shifted: ".array_shift($people)."<br><br>";

    foreach ($people as $person)
        echo $person."<br>";
    echo "<br>";

    $reversed_arr = array_reverse($people);
    foreach ($reversed_arr as $ele)
        echo $ele."<br>";
    echo "<br>";
```

## Video 12 (4-Nov-2023)
- Associative array
```php
<?php
    $ages = array("Sakib" => 39,
                 "Tamim" => 38,
                 "Mashrafe" => 42,
                 "Mahmudullah" => 40);

//    echo $ages[0]; -> This is an error
    echo $ages["Tamim"]."<br>"; // Access element

    $ages["Tamim"] = 37; // Change value
    $ages["Mushfiq"] = 37; // Add new element
    echo array_pop($ages)."<br>"; // Remove last element
    echo array_shift($ages)."<br>"; // Remove first element

    echo "<br>";
    foreach($ages as $person => $age) {
        echo "$person is $age years old<br>";
    }

    echo"<br>";
    $persons = array_keys($ages);
    for ($i = 0; $i < count($persons); $i++) {
        echo ++$i;
        --$i;
        echo ": $persons[$i] is {$ages[$persons[$i]]} years old<br>";
    }

    echo "<br>";
    $values = array_values($ages);
    foreach ($values as $value)
        echo $value."<br>";

    echo "<br>";
    $flipped = array_flip($ages);
    foreach ($flipped as $key => $value)
        echo  "$key: $value<br>";

    echo "<br>";
    $reversed = array_reverse($ages);
    foreach ($reversed as $key => $value)
        echo  "$key: $value<br>";

    echo "<br>Number of elements:".count($ages)."<br>";
```

## Video 13 (5-Nov-2023)
- isset() and empty() -> Very Important
```php
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
        // isset(): Returns true if a variable is declared and not null
        // empty(): Returns true if a variable is not declared, false, or null

        echo "VAR1 : Not Declared<br>";
        echo isset($var1) ? "TRUE<br>" : "FALSE<br>";
        echo empty($var1) ? "TRUE<br>" : "FALSE<br>";

        $var2 = null;
        echo "<br>VAR2 : NULL<br>";
        echo isset($var2) ? "TRUE<br>" : "FALSE<br>";
        echo empty($var2) ? "TRUE<br>" : "FALSE<br>";

        $var3 = false;
        echo "<br>VAR3 : FALSE<br>";
        echo isset($var3) ? "TRUE<br>" : "FALSE<br>";
        echo empty($var3) ? "TRUE<br>" : "FALSE<br>";
    ?>

    <br>
    <form action="index.php" method="post">
        <label>username:</label><br>
        <label>
            <input type="text" name="username"><br>
        </label>
        <label>password:</label><br>
        <label>
            <input type="password" name="password"><br>
        </label>
        <input type="submit" name="login" value="Login"><br>
    </form>

    <?php
//         $_POST is an associative array
//        foreach ($_POST as $key => $value)
//            echo "$key: $value<br>";
        if (isset($_POST["login"])) {
            if (empty($_POST["username"])) {
                echo "Username is missing";
            } elseif (empty($_POST["password"])) {
                echo "Password is missing";
            } else {
                echo "Successfully logged in";
            }
        }
    ?>

</body>
</html>
```

## Video 14 (5-Nov-2023)
- Radio buttons
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Which food would you like to order?
    <form action="index.php" method="post">
        <label>
            <input type="radio" name="food" value="Burger">
            Burger
        </label><br>
        <label>
            <input type="radio" name="food" value="Pizza">
            Pizza
        </label><br>
        <label>
            <input type="radio" name="food" value="Hot Dog">
            Hot Dog
        </label><br>
        <input type="submit" name="submit" value="Submit"><br>
    </form>

    <?php
        $submit = null;
        $food = null;

        if (isset($_POST["submit"])) {
            $submit = $_POST["submit"];
            if (isset($_POST["food"]))
                $food = $_POST["food"];
        }

        if ($submit)
            if ($food)
                echo "You have ordered <span style='text-transform: lowercase;'>$food</span><br>";
            else
                echo "Please select a food<br>";

        for ($i = 0; $i < 4; $i++)
            echo "<br>";
    ?>

    <a href="http://localhost/project1">
        <button type="button">RELOAD PAGE</button>
    </a>
</body>
</html>
```

## Video 15 (5-Nov-2023)
- Checkboxes
```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Which chocolate do you like?
    <form action="index.php" method="post">
        <label>
            <input type="checkbox" name="chocolates[]" value="Kitkat">
            Kitkat
        </label><br>
        <label>
            <input type="checkbox" name="chocolates[]" value="Dairy Milk">
            Dairy Milk
        </label><br>
        <label>
            <input type="checkbox" name="chocolates[]" value="Mr. Mango">
            Mr. Mango
        </label><br>
        <label>
            <input type="checkbox" name="chocolates[]" value="Toblerone">
            Toblerone
        </label><br>
        <input type="submit" name="submit">
    </form>

    <?php
        if (isset($_POST["submit"])) {
            $chocolates = array();
            if (isset($_POST["chocolates"]))
                $chocolates = $_POST["chocolates"];
            foreach ($chocolates as $chocolate)
                echo "I like $chocolate<br>";
        }

        for ($i = 0; $i < 4; $i++)
            echo "<br>";
    ?>

    <a href="http://localhost/project1">
        <button type="button">RELOAD PAGE</button>
    </a>
</body>
</html>
```

## Video 16 (5-Nov-2023)
- Functions (Check W3Schools and PHP Reference)
```php
<?php
    declare(strict_types=1); // function arguments and return types
                             // must match exactly, otherwise error

    function math(int $a, int ...$nums) : int
    {
        $sum = 0;
        foreach ($nums as $num)
            $sum += $num;
        return (int) (($a * $sum) / 3);
    }

    echo math(10, 2, 3, 4, 1)."<br>";

    $sum = fn(int $x, int $y) : int => $x + $y;
    echo $sum(5, 10)."<br>";
    $count = fn(int ...$nums) : string => (string) count($nums);
    echo $count(1, 2, 3, 4, 10, 15, 20)."<br>";
```

## Video 17 (5-Nov-2023)
- string functions
```php
<?php
    /*
    strtolower($str)
    strtoupper($str
    trim("    abcd  ") => "abcd"
    str_pad("abcd", 6, "P") => "abcdPPPPPP"
    strrev($str)
    strcmp($str1, $str2)
    strlen($str)
    strpos($str, " ") => position of first occurence
    substr($str, $start, $end)
    explode(" ", $str) => string to array
    implode("-", $arr) => arraay to string
    */
```

## Video 18 (6-Nov-2023)
- sanitize/validate input (research later)
```php
```

## Video 19 (6-Nov-2023)
- include and require statements
    - Includes content from other txt/html/php file
    - Check W3Schools and PHP Reference
```php
<!-- vars.php -->
<?php
$color = 'green';
$fruit = 'apple';
?>
```
```php
<!-- test.php -->
<?php
echo "A $color $fruit"; // A
include 'vars.php';
echo "A $color $fruit"; // A green apple
?>
```

## Video 20 (6-Nov-2023)
- Cookies (not important right now)
```php
```

## Video 21 (6-Nov-2023)
- Session (very important - research later)
    - W3Schools and PHP Reference 
```php
<?php
// session_start(), session_unset(), session_destroy()
// $_SESSION
```

## Video 22 (6-Nov-2023)
- Server (probably important - research later)
```php
<?php
// $_SERVER["PHP_SELF"]
// $_SERVER["REQUEST_METHOD"]
```

## Video 23 (6-Nov-2023)
- Password hashing (not important right now)
```php
<?php
// password_hash($str, PASSWORD_DEFAULT);
// password_verify($str1, $str2);
```

## Video 24 (6-Nov-2023)
- Connect to MySQL database
```php
<?php
    // This is dbconnect.php
    try {
        $conn = mysqli_connect(
            hostname: "localhost",
            username: "root",
            database: "test"
        );
    } catch(mysqli_sql_exception $ex) {
        echo "Error: ".$ex->getMessage()."<br>";
    }

    if (!empty($conn)) {
        echo "You are connected.<br>";
    }
```

## Video 25 (6-Nov-2023)
- PHPMyAdmin (localhost/phpmyadmin)
```php
```

## Video 26 (6-Nov-2023)
- Insert into MySQL database
```php
<?php
    include "dbconnect.php";
    global $conn;
    if (!empty($conn)) {
        $query = "INSERT INTO Ages VALUES ('shakespear', 65)";

        try {
            mysqli_query($conn, $query);
            echo "User Inserted<br>";
        } catch (mysqli_sql_exception $ex) {
            echo "Error: ".$ex->getMessage()."<br>";
        }

        mysqli_close($conn);
    }
```

## Video 27 (6-Nov-2023)
- Query MySQL database
```php
<?php
    include "dbconnect.php";
    global $conn;
    if (!empty($conn)) {
        $query1 = "SELECT * FROM Ages";
        $query2 = "SELECT * FROM Ages WHERE age >= 40";

        try {
            echo "<br>Option 1: Using Regular Arrays<br>";
            $result = mysqli_query($conn, $query1);
            $rows = $result->fetch_all();
            foreach ($rows as $row) {
                foreach ($row as $value) {
                    echo "$value ";
                }
                echo "<br>";
            }
            echo $rows[0][1]."<br>";

            echo "<br>Option 2: Using Associative Arrays<br>";
            $result = mysqli_query($conn, $query2);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result))
                    echo $row["name"]." ".$row["age"]."<br>";
            }

        } catch (mysqli_sql_exception $ex) {
            echo "Error: ".$ex->getMessage()."<br>";
        }

        mysqli_close($conn);
    }
```

## Video 28 (6-Nov-2023)
- Registration form project (Not too important)
```php
```
