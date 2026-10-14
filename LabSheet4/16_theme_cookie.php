<?php
// QUESTION 16: Save/retrieve a theme preference with a cookie.
// Set cookie before output. For HTTPS sites, enable secure=true.
if (isset($_POST['theme']) && in_array($_POST['theme'], ['light', 'dark'], true)) {
    setcookie('theme', $_POST['theme'], [
        'expires' => time() + 30 * 24 * 60 * 60,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
$theme = $_COOKIE['theme'] ?? 'light';
$background = $theme === 'dark' ? '#222' : '#fff';
$foreground = $theme === 'dark' ? '#fff' : '#222';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Theme Cookie</title></head>
<body style="background:<?= htmlspecialchars($background) ?>;color:<?= htmlspecialchars($foreground) ?>">
<h2>Theme Preference</h2><p>Current theme: <?= htmlspecialchars($theme) ?></p>
<form method="post"><select name="theme"><option value="light">Light</option><option value="dark">Dark</option></select>
<button type="submit">Save theme</button></form></body></html>
