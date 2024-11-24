<?php
session_start(); // Memulai session

// Ambil data dari session
if (!isset($_SESSION['formData'])) {
    echo "Data tidak ditemukan. Silakan isi formulir kembali.";
    exit;
}
$formData = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table border="1">
        <tr>
            <td>Nama Lengkap</td>
            <td><?= htmlspecialchars($formData['fullname']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($formData['email']) ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?= str_repeat('*', strlen($formData['password'])) ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td><?= htmlspecialchars($formData['phone']) ?></td>
        </tr>
        <tr>
            <td>Isi File</td>
            <td>
                <ul>
                    <?php foreach ($formData['fileData'] as $line): ?>
                        <li><?= htmlspecialchars($line) ?></li>
                    <?php endforeach; ?>
                </ul>
            </td>
        </tr>
    </table>

    <?php
    // Hapus session
    session_unset();
    session_destroy();
    ?>
</body>
</html>
