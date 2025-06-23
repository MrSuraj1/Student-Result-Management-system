<?php
// admin/add-result.php
require '../db.php';

// Fetch all students
$students = $pdo->query("SELECT id, name, roll_no FROM students")->fetchAll();

// Fetch all subjects
$subjects = $pdo->query("SELECT id, subject_name FROM subjects")->fetchAll();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $student_id = $_POST['student_id'];

  foreach ($_POST['marks'] as $subject_id => $marks) {
    $stmt = $pdo->prepare("INSERT INTO results (student_id, subject_id, marks) VALUES (?, ?, ?)");
    $stmt->execute([$student_id, $subject_id, $marks]);
  }

  echo "<script>alert('Result added successfully!');window.location.href='add-result.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Result</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">📝 Add Student Result</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="student" class="form-label">Select Student</label>
        <select name="student_id" id="student" class="form-select" required>
          <option value="" disabled selected>-- Choose Student --</option>
          <?php foreach ($students as $student): ?>
            <option value="<?= $student['id'] ?>">
              <?= htmlspecialchars($student['name']) ?> (<?= $student['roll_no'] ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <h5 class="mt-4">Enter Marks:</h5>
      <?php foreach ($subjects as $subject): ?>
        <div class="mb-3">
          <label class="form-label"><?= htmlspecialchars($subject['subject_name']) ?></label>
          <input type="number" name="marks[<?= $subject['id'] ?>]" class="form-control" min="0" max="100" required>
        </div>
      <?php endforeach; ?>

      <div class="text-end">
        <button type="submit" class="btn btn-success">Add Result</button>
      </div>
    </form>
  </div>
</body>
</html>
