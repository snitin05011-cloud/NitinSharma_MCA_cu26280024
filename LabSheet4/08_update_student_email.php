<?php
// QUESTION 8: Update email for a student ID using POST.
require __DIR__ . '/db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$email = trim($_POST['email'] ?? '');
if (!$id || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Provide a valid student ID and email.');
}
$stmt = $pdo->prepare('UPDATE students SET email = :email WHERE id = :id');
$stmt->execute(['email' => $email, 'id' => $id]);
echo $stmt->rowCount() ? 'Email updated.' : 'No row changed; verify the ID or existing email.';
?>
