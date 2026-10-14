<?php
// QUESTION 19: Transaction for multiple related writes.
// Example assumes a second table named enrollment_audit exists.
require __DIR__ . '/db.php';

try {
    $pdo->beginTransaction();

    $studentStmt = $pdo->prepare(
        'INSERT INTO students (name, email, enrollment_date) VALUES (?, ?, ?)'
    );
    $studentStmt->execute(['Kavya Singh', 'kavya@example.com', date('Y-m-d')]);
    $studentId = (int)$pdo->lastInsertId();

    $auditStmt = $pdo->prepare(
        'INSERT INTO enrollment_audit (student_id, action_name) VALUES (?, ?)'
    );
    $auditStmt->execute([$studentId, 'student_created']);

    $pdo->commit();
    echo 'Both operations completed successfully.';
} catch (Throwable $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    error_log($e->getMessage());
    http_response_code(500);
    echo 'Transaction failed; changes were rolled back.';
}
?>
