<?php
// QUESTION 4: PDO database connection.
// Update credentials to match your local MySQL setup.
// In production, keep credentials outside the web root/environment variables.

$host = 'localhost';
$dbname = 'college_db';
$username = 'college_app';
$password = 'change_this_password';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    echo "Database connection successful.";
} catch (PDOException $e) {
    // Log technical details privately; do not show them to website visitors.
    error_log($e->getMessage());
    http_response_code(500);
    echo "Database connection failed. Check server logs and credentials.";
}
?>
