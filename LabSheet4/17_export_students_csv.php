<?php
// QUESTION 17: Export students table as a downloadable CSV.
require __DIR__ . '/db.php';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="students.csv"');
$out = fopen('php://output', 'w');
fputcsv($out, ['id', 'name', 'email', 'enrollment_date']);
$stmt = $pdo->query('SELECT id, name, email, enrollment_date FROM students ORDER BY id');
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    // Prefix spreadsheet formula-like values to reduce CSV formula injection risk.
    foreach ($row as &$value) {
        if (is_string($value) && preg_match('/^[=+@\\-]/', $value)) $value = "'" . $value;
    }
    unset($value);
    fputcsv($out, $row);
}
fclose($out);
exit;
?>
