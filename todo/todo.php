<?php
include 'dbb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $desc  = isset($_POST['description']) ? trim($_POST['description']) : '';

    if (!empty($title) && !empty($desc)) {
        mysqli_query($conn, "INSERT INTO tasks (title, description, status) VALUES ('$title', '$desc', 'Pending')");
    }

    header("Location: todo.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
    header("Location: todo.php");
    exit();
}


if (isset($_GET['complete'])) {
    $id = $_GET['complete'];
    mysqli_query($conn, "UPDATE tasks SET status='Completed' WHERE id=$id");
    header("Location: todo.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f5fa; }
        .btn-sm { font-size: 0.75rem; }
        .card { border-radius: 15px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="text-center mb-4">To-Do List Dashboard</h2>

        <!-- Summary -->
        <div class="row text-white text-center mb-4">
            <div class="col bg-primary p-3 rounded me-2">Total Tasks<br>
                <strong><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks")); ?></strong></div>
            <div class="col bg-warning p-3 rounded me-2">Pending Tasks<br>
                <strong><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks WHERE status='Pending'")); ?></strong></div>
            <div class="col bg-success p-3 rounded">Completed Tasks<br>
                <strong><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tasks WHERE status='Completed'")); ?></strong></div>
        </div>

        <!-- Add Task Button -->
        <a href="?add" class="btn btn-success mb-3 float-end">Add New Task</a>

        <!-- Add Task Form -->
        <?php if (isset($_GET['add'])): ?>
        <div class="card p-4 mb-3">
            <h4 class="text-center">Add New Task</h4>
            <form method="POST">
                <input class="form-control mb-2" name="title" placeholder="Task Title" required>
                <textarea class="form-control mb-2" name="description" placeholder="Task Description" required></textarea>
                <div class="d-flex gap-2">
                    <button name="add" class="btn btn-primary">Add Task</button>
                    <a href="todo.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
        <?php endif; ?>

        <!-- Task Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr><th>#</th><th>Title</th><th>Description</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id ASC");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['description']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>";
                    if ($row['status'] === 'Pending') {
                        echo "<a href='?complete={$row['id']}' class='btn btn-success btn-sm me-1'>Complete</a>";
                    }
                    echo "<a href='?delete={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Delete this task?')\">Delete</a>";
                    echo "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
