<?php
// QUESTION 7: Retrieve and display students in a styled HTML table.
require __DIR__ . '/db.php';
$students = $pdo->query(
    'SELECT id, name, email, enrollment_date FROM students ORDER BY id'
)->fetchAll();
function h($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title>Students</title>
<style>
body{font-family:Arial,sans-serif;margin:2rem}table{border-collapse:collapse;width:100%}
th,td{border:1px solid #bbb;padding:10px;text-align:left}th{background:#eee}
tr:nth-child(even){background:#f7f7f7}
</style></head><body><h1>Students</h1>
<table><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Enrollment date</th></tr></thead><tbody>
<?php foreach ($students as $student): ?>
<tr><td><?= h($student['id']) ?></td><td><?= h($student['name']) ?></td>
<td><?= h($student['email']) ?></td><td><?= h($student['enrollment_date']) ?></td></tr>
<?php endforeach; ?>
</tbody></table></body></html>
