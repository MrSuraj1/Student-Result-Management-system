<?php
// admin/view-all.php
require '../db.php';

// Fetch students
$students = $pdo->query("SELECT * FROM students ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Students</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">📄 All Students</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Roll No</th>
          <th>Class</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $stu): ?>
        <tr>
          <td><?= $stu['id'] ?></td>
          <td><?= htmlspecialchars($stu['name']) ?></td>
          <td><?= htmlspecialchars($stu['roll_no']) ?></td>
          <td><?= htmlspecialchars($stu['class']) ?></td>
          <td>
            <a href="../student/check-result.php?roll_no=<?= $stu['roll_no'] ?>" class="btn btn-sm btn-info">View Result</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="text-center">
      <a href="dashboard.php" class="btn btn-secondary">⬅ Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
