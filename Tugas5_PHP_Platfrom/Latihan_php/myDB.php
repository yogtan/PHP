<?php
require 'function.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection/ udah di 
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// Create database
// $sql = "CREATE DATABASE firstDB";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// $sql = "CREATE TABLE MyGuests (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   nim VARCHAR(30) NOT NULL,
//   nama VARCHAR(30) NOT NULL,
//   jurusan VARCHAR(30) NOT NULL,
//   hobby VARCHAR(50)
//   )";

//   if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }

// Insert
// $sql = "INSERT INTO myGuests (nim, nama, jurusan, hobby)
// VALUES ('211011', 'Johaens', 'informatika', 'Coding')";
// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// tAMPILIN
$myGuests = query("SELECT * FROM myGuests");


// Delte
// $sql = "DELETE FROM myGuests WHERE nim=21105";
// if ($conn->query($sql) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>
  <table border="1" cellpadding="10" cellspacing="1">
    <tr>
      <td>No</td>
      <td>Aksi</td>
      <td>Nim</td>
      <td>Nama</td>
      <td>Jurusan</td>
      <td>Hobby</td>
    </tr>
    <?php $i = 1;?>
    <?php foreach ($myGuests as $row) : ?>
      <tr>
        <td>
          <?= $i++; ?>
        </td>
        <td>
          <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin')">hapus</a>
        </td>

        <td><?= $row["nim"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
        <td><?= $row["hobby"]; ?></td>

      </tr>
    <?php endforeach;  ?>
  </table>


</body>

</html>