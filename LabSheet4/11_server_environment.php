<?php
// QUESTION 11: Display selected server details using $_SERVER.
// Avoid printing all environment variables on public websites.
$keys = ['SERVER_SOFTWARE', 'SERVER_NAME', 'SERVER_PORT', 'REQUEST_METHOD',
         'REQUEST_URI', 'DOCUMENT_ROOT', 'PHP_SELF'];
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Server Details</title></head><body>
<h2>Server Environment</h2><dl>
<?php foreach ($keys as $key): ?>
<dt><strong><?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?></strong></dt>
<dd><?= htmlspecialchars($_SERVER[$key] ?? 'Not available', ENT_QUOTES, 'UTF-8') ?></dd>
<?php endforeach; ?>
</dl></body></html>
