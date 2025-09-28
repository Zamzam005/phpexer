<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM appointments WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 400px;">
        <h3 class="text-center">Edit Appointment</h3>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <input class="form-control mb-2" name="name" value="<?= $data['name'] ?>" required>
            <input class="form-control mb-2" name="email" value="<?= $data['email'] ?>" required>
            <input class="form-control mb-2" name="phone" value="<?= $data['phone'] ?>" required>
            <input class="form-control mb-2" name="date" type="date" value="<?= $data['date'] ?>" required>
            <input class="form-control mb-2" name="time" type="time" value="<?= $data['time'] ?>" required>
            <textarea class="form-control mb-3" name="reason" required><?= $data['reason'] ?></textarea>
            <button type="submit" class="btn btn-primary w-100">Update Appointment</button>
        </form>
    </div>
</div>
</body>
</html>
