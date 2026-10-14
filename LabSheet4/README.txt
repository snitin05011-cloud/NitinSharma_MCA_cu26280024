MCA108P — LAB SHEET 4 SOLUTIONS
================================

This package contains numbered solutions for all 21 questions in MCA108P-AS04.docx.

RECOMMENDED LOCAL SETUP (Windows):
1. Install XAMPP (Apache, PHP, MySQL/MariaDB).
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Put the PHP files in C:\\xampp\\htdocs\\collegeweb\\ (or another project folder).
4. In phpMyAdmin or MySQL CLI, run 03_create_college_db.sql.
5. Run 14_create_restricted_user.sql as a MySQL administrator after changing its password.
6. Update the matching credentials in db.php and 04_pdo_connection.php.
7. Run 05_create_students_table.php in the browser to create the students table.
8. Open PHP files at http://localhost/collegeweb/filename.php.

IMPORTANT FILE NOTES:
- 06, 07, 08, 09, 12, 17 and 19 use db.php.
- Question 12 expects a `users` table with `id`, `username`, and `password_hash` columns.
- Question 19 expects an `enrollment_audit` table with `student_id` and `action_name` columns.
- Question 6 expects POST fields: name, email, enrollment_date. A simple HTML form can submit them.
- Question 8 expects POST fields: id and email.
- Question 9 uses a GET parameter such as ?id=3, as requested by the lab question.
- For Question 13, create/allow PHP to write to the uploads directory. Keep uploaded files non-executable.
- Question 2's phpinfo page reveals server configuration. Delete it after verification.
- Question 15 is a session demonstration, not production authentication.
- Use prepared statements for database inputs and password_hash/password_verify for passwords.
- Configure and test only on a local development environment.

Files are named with question numbers so they match the supplied lab sheet.
