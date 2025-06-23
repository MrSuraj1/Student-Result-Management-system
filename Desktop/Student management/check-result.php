<?php
// student/check-result.php
require '../db.php';

if (!isset($_GET['roll_no'])) {
  echo "<p style='color:red;text-align:center;'>No Roll Number Provided</p>";
  exit();
}

$roll_no = $_GET['roll_no'];

// Get student info
$stmt = $pdo->prepare("SELECT * FROM students WHERE roll_no = ?");
$stmt->execute([$roll_no]);
$student = $stmt->fetch();

if (!$student) {
  echo "<p style='color:red;text-align:center;'>Student Not Found</p>";
  exit();
}

// Get results
$query = "SELECT subjects.subject_name, results.marks
          FROM results
          JOIN subjects ON results.subject_id = subjects.id
          WHERE results.student_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$student['id']]);
$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result for <?= htmlspecialchars($student['name']) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4 text-center">Result for <?= htmlspecialchars($student['name']) ?> (<?= htmlspecialchars($student['roll_no']) ?>)</h2>
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Subject</th>
          <th>Marks</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0; foreach ($results as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row['subject_name']) ?></td>
            <td><?= htmlspecialchars($row['marks']) ?></td>
          </tr>
        <?php $total += $row['marks']; endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Total</th>
          <th><?= $total ?></th>
        </tr>
      </tfoot>
    </table>
    <div class="text-center">
      <a href="../index.php" class="btn btn-primary">Back</a>
    </div>
  </div>
</body>
</html>
