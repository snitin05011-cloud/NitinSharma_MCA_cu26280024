-- QUESTION 14: Run as a MySQL administrator. Change password and host as appropriate.
CREATE USER IF NOT EXISTS 'college_app'@'localhost'
  IDENTIFIED BY 'change_this_password';

GRANT SELECT, INSERT, UPDATE ON college_db.*
  TO 'college_app'@'localhost';

FLUSH PRIVILEGES;

-- This account intentionally has no DELETE, DROP, or GRANT OPTION privileges.
