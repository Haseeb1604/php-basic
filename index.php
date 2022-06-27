<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) die("Connection failed: " . mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <?php 
    if(isset($_GET['success'])){
        echo "<script>alert(". $_GET['success'] . ")</script>";
    }else if(isset($_GET['error'])){
        echo "<script>alert(". $_GET['error'] . ")</script>";
    }
    ?>
    <div class="record">
        <div class="d-flex">
            <div class="insertRecord w-50">
                <h2 class="text-center">Insert Record</h2>
                <form class="form" action="submit.php" method="post">
                    <div class="input-field">
                        <input required type="text" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="input-field">
                        <input required type="email" name="email" id="email" placeholder="Email Address">
                    </div>
                    <div class="input-field">
                        <input required type="text" name="username" id="username" placeholder="User Name">
                    </div>
                    <div class="input-field">
                        <input required type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="input-field w-100">
                        <input required name="submit" type="submit" value="Submit" class="btn mx-auto">
                    </div>
                </form>
            </div>
            <div class="viewRecord w-50">
                <h2 class="text-center">View Record</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM details";
                        $result = mysqli_query($conn, $sql);
                        
                        // var_dump($result);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                    <td>". $row['id'] ."</td>
                                    <td>" . $row["name"]. "</td>
                                    <td>" . $row["email"]. "</td>
                                    <td>" . $row["username"]."</td>
                                    <td>" . $row["password"]."</td>
                                    <td class=\"d-flex justify-between\">
                                        <a href=\"#\" class=\"tableBtn edit\">Edit</a>
                                        <a href=\"./delete.php?id='". $row['id'] ."'\" class=\"tableBtn delete\">Delete</a>
                                    </td>
                                </tr>
                                ";
                            }
                        } else {
                            echo "<tr>0 Record</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>