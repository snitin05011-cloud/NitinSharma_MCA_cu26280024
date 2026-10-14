<?php
// QUESTION 20: Verify extensions are enabled.
// In php.ini, enable the relevant extension lines if needed (names vary by PHP build):
// extension=mysqli
// extension=pdo_mysql
// extension=mbstring
// extension=curl
// Restart Apache after editing php.ini.
$extensions = ['mysqli', 'pdo_mysql', 'mbstring', 'curl'];
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>PHP Extensions</title></head><body>
<h2>PHP Extension Status</h2><ul>
<?php foreach ($extensions as $extension): ?>
<li><?= htmlspecialchars($extension) ?>:
<strong><?= extension_loaded($extension) ? 'Enabled' : 'Not enabled' ?></strong></li>
<?php endforeach; ?>
</ul></body></html>
