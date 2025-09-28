<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM appointments");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointments Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f5e8d5;">
<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="text-center">Appointments Dashboard</h2>
        <div class="text-center mb-3">
            <a href="book.php" class="btn btn-primary">📅 Book New Appointment</a>
            <a href="#" class="btn btn-danger">🔴 Logout</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th>
                    <th>Date</th><th>Time</th><th>Reason</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['time'] ?></td>
                    <td><?= $row['reason'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Cancel appointment?')">🗑️ Cancel</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
