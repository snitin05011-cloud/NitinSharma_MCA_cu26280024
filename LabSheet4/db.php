<?php
// Shared PDO connection used by the PHP examples.
// Create college_db and a MySQL user first; update these credentials to match your setup.
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
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit('Database connection failed. Check configuration and server logs.');
}
?>
