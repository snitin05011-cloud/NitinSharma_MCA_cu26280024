<?php
// QUESTION 9: Delete by GET URL parameter.
// Example: delete_student.php?id=3
// For real applications, prefer POST + CSRF protection for destructive actions.
require __DIR__ . '/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit('Provide a valid student ID in the URL, e.g. ?id=3');
}
$stmt = $pdo->prepare('DELETE FROM students WHERE id = :id');
$stmt->execute(['id' => $id]);
echo $stmt->rowCount() ? 'Student deleted.' : 'No student found with that ID.';
?>
