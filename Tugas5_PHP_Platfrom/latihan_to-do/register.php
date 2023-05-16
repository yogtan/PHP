<?php

require 'db-conn.php';

if (isset($_POST["register"])) {

    if (register($_POST) > 0) {
        echo" <script>
            alert('User Berhasil DiBuat');
            document.location.href = 'login.php';
            </script>";
        }else {
            echo mysqli_error($conn); 
        }
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registrasi</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Registrasi</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
