<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 400px;">
        <h3 class="text-center">Book Appointment</h3>
        <form method="POST" action="save.php">
            <input class="form-control mb-2" name="name" placeholder="Name" required>
            <input class="form-control mb-2" name="email" placeholder="Email" required type="email">
            <input class="form-control mb-2" name="phone" placeholder="Phone" required>
            <input class="form-control mb-2" name="date" type="date" required>
            <input class="form-control mb-2" name="time" type="time" required>
            <textarea class="form-control mb-3" name="reason" placeholder="Reason" required></textarea>
            <button type="submit" class="btn btn-success w-100">Book Now</button>
        </form>
    </div>
</div>
</body>
</html>
