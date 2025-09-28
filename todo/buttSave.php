<?php
include 'dbb.php';

if (isset($_POST['buttSave'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $query = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$desc', 'Pending')";
    if (mysqli_query($conn, $query)) {
        header("Location: ind.php"); // correct redirect
        exit();
    } else {
        echo "Error: " . mysqli_error($conn); // show if DB insert fails
    }
}
?>
