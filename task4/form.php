<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        .container {
            width: 50%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type=text], input[type=email], input[type=password], input[type=tel], input[type=file] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="process.php" method="post" enctype="multipart/form-data" id="registrationForm">
            <h1>Form Data Diri</h1>

            <label for="fullname">Nama Lengkap:</label>
            <input type="text" id="fullname" name="name" required minlength="3">
            <div class="error" id="fullnameError"></div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <div class="error" id="emailError"></div>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required minlength="8">
            <div class="error" id="passwordError"></div>

            <label for="phone">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,13}">
            <div class="error" id="phoneError"></div>

            <label for="uploadFile">Upload File (Teks):</label>
            <input type="file" id="uploadFile" name="uploadFile" required accept=".txt">
            <div class="error" id="fileError"></div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            const fullname = document.getElementById('fullname').value;
            const password = document.getElementById('password').value;
            const fileInput = document.getElementById('uploadFile').files[0];

            let hasError = false;

            // Clear previous errors
            document.querySelectorAll('.error').forEach(el => el.textContent = '');

            // Validate full name
            if (fullname.length < 3) {
                document.getElementById('fullnameError').textContent = "Nama Lengkap minimal 3 karakter.";
                hasError = true;
            }

            // Validate password
            if (password.length < 8) {
                document.getElementById('passwordError').textContent = "Password minimal 8 karakter.";
                hasError = true;
            }

            // Validate file input
            if (fileInput) {
                if (fileInput.size > 2 * 1024 * 1024) {
                    document.getElementById('fileError').textContent = "Ukuran file maksimal 2 MB.";
                    hasError = true;
                }
                if (fileInput.type !== "text/plain") {
                    document.getElementById('fileError').textContent = "Hanya file teks yang diperbolehkan.";
                    hasError = true;
                }
            }

            if (hasError) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
