<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: indek.php");
    exit;
}
require 'db-conn.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT * FROM user WHERE password = '$password'");
    
    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
      
        if (mysqli_num_rows($result2) === 1) {

            // Login berhasil, lakukan tindakan yang diperlukan
            // sebelum ke indek harus set session terlebih dahulu
            $_SESSION["login"] = true;
            header("Location: indek.php");
            exit;
        } else {
            $error = "Pasword Salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            margin-top: 100px;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <h2 class="text-center">Silakan login</h2>
                    <?php if (isset($error)) : ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <form method="POST" action="login.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
