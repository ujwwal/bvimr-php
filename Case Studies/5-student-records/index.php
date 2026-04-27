<?php
$file = 'students.json';

function getStudents($file) {
    return file_exists($file) ? json_decode(file_get_contents($file), true) : [];
}

function saveStudents($file, $students) {
    file_put_contents($file, json_encode($students));
}

$students = getStudents($file);

// Add student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name   = trim($_POST['name']);
    $roll   = trim($_POST['roll']);
    $course = trim($_POST['course']);
    if ($name && $roll && $course) {
        $students[] = ['id' => uniqid(), 'name' => $name, 'roll' => $roll, 'course' => $course];
        saveStudents($file, $students);
        echo "Student added!<br>";
    } else {
        echo "All fields required.<br>";
    }
}

// Delete student
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $students = array_filter($students, fn($s) => $s['id'] !== $id);
    saveStudents($file, array_values($students));
    echo "Student deleted!<br>";
}
?>
<h2>Student Record Management</h2>

<h3>Add Student</h3>
<form method="POST">
  Name: <input type="text" name="name" required><br><br>
  Roll No: <input type="text" name="roll" required><br><br>
  Course: <input type="text" name="course" required><br><br>
  <input type="hidden" name="add" value="1">
  <input type="submit" value="Add Student">
</form>

<h3>All Students</h3>
<?php if (empty($students)): ?>
  <p>No students found.</p>
<?php else: ?>
  <table border="1" cellpadding="5">
    <tr><th>#</th><th>Name</th><th>Roll No</th><th>Course</th><th>Action</th></tr>
    <?php foreach ($students as $i => $s): ?>
    <tr>
      <td><?= $i+1 ?></td>
      <td><?= htmlspecialchars($s['name']) ?></td>
      <td><?= htmlspecialchars($s['roll']) ?></td>
      <td><?= htmlspecialchars($s['course']) ?></td>
      <td>
        <a href="edit.php?id=<?= $s['id'] ?>">Edit</a> |
        <a href="?delete=<?= $s['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
