<?php
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "form";
    $conn = mysqli_connect($server, $username, $pass, $db);
    
    if (!$conn) die("Connection failed: " . mysqli_connect_error());


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $name = trimValues($_POST["name"]);
        $username = trimValues($_POST["username"]);
        $email = trimValues($_POST["email"]);
        $password = trimValues($_POST["password"]);

        $sql = "INSERT INTO details (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";

        if (mysqli_query($conn, $sql)) header("location:index.php?success='Data Stored'");
        else header("location:index.php?error=Error:".$sql." ".mysqli_error($conn));
    }

    function trimValues($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
     }
?>