<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$reason = $_POST['reason'];

$sql = "UPDATE appointments SET 
        name='$name', email='$email', phone='$phone', date='$date', time='$time', reason='$reason' 
        WHERE id=$id";

mysqli_query($conn, $sql);
header("Location: index.php");
?>
