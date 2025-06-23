<?php
// admin/add-student.php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $roll_no = $_POST['roll_no'];
  $class = $_POST['class'];

  $stmt = $pdo->prepare("INSERT INTO students (name, roll_no, class) VALUES (?, ?, ?)");
  $stmt->execute([$name, $roll_no, $class]);

  echo "<script>alert('Student added successfully'); window.location.href='add-student.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Student</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">➕ Add New Student</h2>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Roll Number</label>
        <input type="text" name="roll_no" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Class</label>
        <input type="text" name="class" class="form-control" required>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-success">Add Student</button>
      </div>
    </form>
  </div>
</body>
</html>
