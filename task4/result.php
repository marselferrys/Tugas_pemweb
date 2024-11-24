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

    <style>
   body {
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-image: url('http://if.itera.ac.id/wp-content/uploads/2020/10/Photoshoot-_ITERA2020-34-min-scaled.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;
    color: #333;
}

h1 {
    b
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 24px;
    text-align: center;
    color: #006400;
}

table {
    width: 50%;
    border-collapse: collapse;
    text-align: left;
    font-size: 16px;
    margin-top: 10px;
}

th, td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
    font-weight: bold;
}

tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tbody tr:nth-child(even) {
    background-color: #e7fbe7;
}

tbody tr:hover {
    background-color: #d4ebd4;
    transition: background-color 0.3s ease;
}

ul {
    padding-left: 20px;
    list-style-type: disc;
    margin: 0;
}

ul li {
    padding: 5px 0;
    line-height: 1.6;
}

   </style>

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
