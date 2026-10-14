<?php
// QUESTION 21: Securely hash and verify passwords.
// Demonstration only: in an app, store the resulting hash in a users.password_hash column.
$password = 'Example-Password-123!';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo '<p>Generated hash: ' . htmlspecialchars($hash, ENT_QUOTES, 'UTF-8') . '</p>';
if (password_verify($password, $hash)) {
    echo 'Password verification successful.';
} else {
    echo 'Password verification failed.';
}
?>
