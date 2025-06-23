<?php
// admin/dashboard.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">🎛️ Admin Dashboard</h2>
    <div class="list-group">
      <a href="add-student.php" class="list-group-item list-group-item-action">➕ Add Student</a>
      <a href="add-subject.php" class="list-group-item list-group-item-action">➕ Add Subject</a>
      <a href="add-result.php" class="list-group-item list-group-item-action">📝 Add Result</a>
      <a href="../index.php" class="list-group-item list-group-item-action">🔙 Go to Student Page</a>
    </div>
  </div>
</body>
</html>
