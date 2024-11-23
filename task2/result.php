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
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('Photoshoot-_ITERA2020-34-min-scaled.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .table {
            width: 60%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.9); /* Translucent background for readability */
            border-radius: 8px;
            overflow: hidden;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #e8f7e8;
        }

        .table tbody tr:hover {
            background-color: #c9e4ca;
        }

        .nested-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .nested-table th, .nested-table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .nested-table th {
            background-color: #f2f2f2;
        }

        .nested-table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div>
        <h1>Hasil Pendaftaran</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
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
                    <td>Browser/Sistem Operasi</td>
                    <td><?= htmlspecialchars($formData['browserInfo']) ?></td>
                </tr>
                <tr>
                    <td>Isi File</td>
                    <td>
                        <table class="nested-table">
                            <thead>
                                <tr>
                                    <th>Baris</th>
                                    <th>Konten</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($formData['fileData'] as $lineNumber => $lineContent): ?>
                                    <tr>
                                        <td><?= $lineNumber + 1 ?></td>
                                        <td><?= htmlspecialchars($lineContent) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
