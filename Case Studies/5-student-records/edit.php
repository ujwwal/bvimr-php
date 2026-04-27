<?php
$file = 'students.json';
$students = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$id = $_GET['id'] ?? '';
$student = null;
foreach ($students as &$s) {
    if ($s['id'] === $id) { $student = &$s; break; }
}

if (!$student) die("Student not found. <a href='index.php'>Go back</a>");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student['name']   = trim($_POST['name']);
    $student['roll']   = trim($_POST['roll']);
    $student['course'] = trim($_POST['course']);
    file_put_contents($file, json_encode($students));
    echo "Updated! <a href='index.php'>Back to list</a>";
    exit;
}
?>
<h2>Edit Student</h2>
<form method="POST">
  Name: <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>
  Roll No: <input type="text" name="roll" value="<?= htmlspecialchars($student['roll']) ?>" required><br><br>
  Course: <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required><br><br>
  <input type="submit" value="Update">
</form>
<a href="index.php">Cancel</a>
