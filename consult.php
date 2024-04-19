<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "Select * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consult</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="consult.php">Consult</a></li>
                <li class="logout"><a href="logout.php">Logout</a></li>
            <ul>
    </div>   
    <div class="form">
        <form action="consult.php" method="post">
            <label for="studentName">Name : </label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="studentEmail">Email : </label>
            <input type="text" id="studentEmail" name="studentEmail" required>

            <label for="teacher">Teacher : </label>
            <input type="text" id="teacher" name="teacher" required>

            <label for="subject">Subject : </label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message : </label>
            <input type="text" id="message" name="message" required>

            <button type="submit">Submit Consultation Request</button>
        </form>
    </div>    
</body>

</html>