<?php
// QUESTION 2: Enable error reporting and verify with phpinfo().
// In php.ini, set:
// display_errors = On
// error_reporting = E_ALL
// Then restart Apache from XAMPP Control Panel.

ini_set('display_errors', '1');
error_reporting(E_ALL);
phpinfo();

// IMPORTANT: Delete this file or restrict access after testing;
// phpinfo() exposes server configuration details.
?>
