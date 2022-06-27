<?php 
     $server = "localhost";
     $username = "root";
     $pass = "";
     $db = "form";
     $conn = mysqli_connect($server, $username, $pass, $db);
     
    if (!$conn) die("Connection failed: " . mysqli_connect_error());
   

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $sql = "DELETE FROM details WHERE id=".$_GET["id"];

        if (mysqli_query($conn, $sql)) {
            header("location:index.php?success=Data Deleted Successfuly");
        } else {
            // echo "Error deleting record:". mysqli_error($conn);
            header("location:index.php?error=Error deleting record:". mysqli_error($conn));
        }
    }
?>