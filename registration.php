<?php
require 'config.php';
if (!empty ($_SESSION["id"])) {
    header("Location: login.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];


    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' or email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert ('Username or Email Has Already Taken'); </script>";
    }else{
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert ('Registration Succesfull!'); </script>";

        } else {
            echo
            "<script> alert ('Password Does Not Match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="css/reg.css">
</head>

<body>
   <h2> REGISTRATION</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" required value=""> <br>

        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required value=""> <br>

        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required value=""> <br>

        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""> <br>

        <label for="confirmpassword">Confirm Password :</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>

        <button type="submit" name="submit">REGISTER</button>
    </form>
    <h4> Already have an Account?<a href="login.php">Login Here</a></h4>
</body>

</html>