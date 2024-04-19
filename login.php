<?php
require 'config.php';
if (!empty ($_SESSION["id"])) {
    header("Location: login.php");
}
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' or email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) >0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo
            "<script> alert ('Wrong Password'); </script>";
        }
    } else{
        echo
        "<script> alert ('User Not Registered'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/log.css">
</head>

<body>
    <h2>LOGIN</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <a href="#">Forgot your Password?</a><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <h4>Don't have an account? <a href="registration.php">Register Here</a></h4>
   
</body>

</html>