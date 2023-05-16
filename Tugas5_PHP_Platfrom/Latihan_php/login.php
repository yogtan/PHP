<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected sucewijoicessfully";

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["passsword"];
  
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = ('username')");
  
  //cek username
  if (mysqli_num_rows($result) === 1) {
    
    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      header("location: myDB.php");
      exit;
    }
  }
  $error = true;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>

<body>
  <h1>Login</h1>

  <?php if (isset($eror)) : ?>
    <p style="color:red">Username/Passowrd Salah</p>
  <?php endif; ?>
  <form action="" method="post">

      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="passsword" name="password">
    </form>
    <br>
    <button type="submit" name="login">Login</button>

</body>

</html>

