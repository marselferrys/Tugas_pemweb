<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    $errors = [];
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    if (empty($fullname) || strlen($fullname) < 3) {
        $errors[] = "Nama lengkap minimal 3 karakter.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password minimal 6 karakter.";
    }
    if (!preg_match('/^[0-9]{10,13}$/', $phone)) {
        $errors[] = "Nomor telepon harus terdiri dari 10-13 digit angka.";
    }

    // Validasi file
    if (isset($_FILES['uploadFile'])) {
        $file = $_FILES['uploadFile'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            if ($file['size'] > 2 * 1024 * 1024) {
                $errors[] = "Ukuran file maksimal 2MB.";
            }
            if (mime_content_type($file['tmp_name']) !== 'text/plain') {
                $errors[] = "Hanya file teks yang diperbolehkan.";
            }
        } else {
            $errors[] = "Gagal mengunggah file.";
        }
    } else {
        $errors[] = "File harus diunggah.";
    }

    if (!empty($errors)) {
        echo "<h3>Error:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        exit;
    }

    // Baca file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileData = explode("\n", $fileContent);

    // Browser info
    $browserInfo = $_SERVER['HTTP_USER_AGENT'];

    // Simpan data ke session untuk ditampilkan di result.php
    session_start();
    $_SESSION['formData'] = [
        'fullname' => $fullname,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'fileData' => $fileData,
        'browserInfo' => $browserInfo,
    ];

    // Redirect ke result.php
    header("Location: result.php");
    exit;
}
?>
