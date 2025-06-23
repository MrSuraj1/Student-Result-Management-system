<?php
// admin/add-subject.php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $subject_name = $_POST['subject_name'];

  $stmt = $pdo->prepare("INSERT INTO subjects (subject_name) VALUES (?)");
  $stmt->execute([$subject_name]);

  echo "<script>alert('Subject added successfully'); window.location.href='add-subject.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Subject</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">➕ Add New Subject</h2>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Subject Name</label>
        <input type="text" name="subject_name" class="form-control" required>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-success">Add Subject</button>
      </div>
    </form>
  </div>
</body>
</html>
