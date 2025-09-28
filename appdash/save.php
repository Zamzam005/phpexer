<?php
include 'db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$reason = $_POST['reason'];
$sql = "INSERT INTO appointments (name, email, phone, date, time, reason)
        VALUES ('$name', '$email', '$phone', '$date', '$time', '$reason')";
mysqli_query($conn, $sql);
header("Location: index.php");
?>