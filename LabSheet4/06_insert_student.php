<?php
// QUESTION 6: Insert student using a prepared statement.
require __DIR__ . '/db.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$date = $_POST['enrollment_date'] ?? '';

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    http_response_code(400);
    exit('Please provide a name, valid email, and date (YYYY-MM-DD).');
}

$stmt = $pdo->prepare(
    'INSERT INTO students (name, email, enrollment_date) VALUES (:name, :email, :date)'
);
$stmt->execute(['name' => $name, 'email' => $email, 'date' => $date]);
echo 'Student inserted successfully.';
?>
