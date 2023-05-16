<?php
require 'function.php';
// koneksi udha din fungsi 
// $conn =  mysqli_connect("localhost", "root", "", "mydb");
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";

// cek apakah tombil submit sudah diteka atau belum/udh jadi fungsi
 if( isset($_POST["submit"])) {
    var_dump($_POST);
    // ambil data tiap elemen dalama form
    // $nim = $_POST["nim"];
    // $nama = $_POST["nama"];
    // $jurusan = $_POST["jurusan"];
    // $hobby = $_POST["hobby"];
    
    // // query insert data
    // $query = "INSERT INTO myGuests VALUES('','$nim', '$nama', '$jurusan', '$hobby')";
    // mysqli_query($conn, $query);

    // Cek apakah data berhasil ditambah
    if (tambah($_POST) > 0 ){
        echo" <script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'myDB.php';
        </script>";
    }else {
        echo" <script>
        alert('Data Gagal');
        document.location.href = 'myDB.php';
        </script>";
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post">

<ul>
    <li>
        <label for="nim">NIM : </label>
        <input type="text" name="nim" id="nim"required>
    </li>
    <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama">
    </li>
    <li>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan">
    </li>
    <li>
        <label for="hobby">Hobby : </label>
        <input type="text" name="hobby" id="hobby">
    </li>
    <li>
        <button type="submit" name="submit">Tambah Data</button>
    </li>
</ul>

</form>
    
</body>
</html>