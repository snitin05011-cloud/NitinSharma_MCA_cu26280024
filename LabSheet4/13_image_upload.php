<?php
// QUESTION 13: Validate and save image uploads.
// Create uploads/ and ensure the Apache/PHP user can write to it.
// Use MIME detection rather than trusting the original filename.
$uploadDir = __DIR__ . '/uploads/';
$maxBytes = 2 * 1024 * 1024; // 2 MB
$allowedMimes = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        exit('Upload failed.');
    }
    $file = $_FILES['image'];
    if ($file['size'] > $maxBytes) exit('File must be 2 MB or smaller.');
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!isset($allowedMimes[$mime])) exit('Only JPG, PNG, and GIF images are allowed.');
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $filename = bin2hex(random_bytes(16)) . '.' . $allowedMimes[$mime];
    if (!move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) exit('Could not save uploaded file.');
    echo 'Image uploaded successfully.';
}
?>
<form method="post" enctype="multipart/form-data">
  <label>Choose image (JPG/PNG/GIF, max 2 MB):
    <input type="file" name="image" accept="image/jpeg,image/png,image/gif" required>
  </label>
  <button type="submit">Upload</button>
</form>
