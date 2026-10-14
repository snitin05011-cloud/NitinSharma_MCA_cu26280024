<?php
// QUESTION 15: Save login state in a session.
// Put session_start() before any HTML output.
session_start();
if (isset($_POST['login'])) {
    $name = trim($_POST['username'] ?? '');
    if ($name !== '') {
        session_regenerate_id(true);
        $_SESSION['username'] = $name; // Demo only; real login must verify credentials.
    }
}
if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Session Demo</title></head><body>
<?php if (isset($_SESSION['username'])): ?>
<p>Logged in as <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?>.</p>
<form method="post"><button name="logout" value="1">Log out</button></form>
<?php else: ?>
<form method="post"><label>Demo username <input name="username" required></label>
<button name="login" value="1">Start session</button></form>
<?php endif; ?>
</body></html>
