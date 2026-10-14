<?php
// QUESTION 5: Create the students table through PHP.
require __DIR__ . '/04_pdo_connection.php';
// In a real project, put the PDO connection in a separate include that does not echo.
// This example assumes the connection succeeds.
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(254) NOT NULL UNIQUE,
    enrollment_date DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$pdo->exec($sql);
echo "students table created or already exists.";
?>
