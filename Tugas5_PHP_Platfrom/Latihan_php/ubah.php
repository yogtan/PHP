<?php
require 'function.php';


//AMbil data dari url
$id = $_GET["id"];

$mhs = query("SELECT * FROM myGuests WHERE id = $id")[0];


 if( isset($_POST["submit"])) {

    if (ubah($_POST) > 0 ){
        echo" <script>
        alert('Data Berhasil Diubah');
        document.location.href = 'myDB.php';
        </script>";
    }else {
        echo" <script>
        alert('Data Gagal Diubah');
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
        <label for="id">ID : </label>
        <input type="hidden" name="id" id="id"required value="<?= $mhs["id"]; ?>">
    </li>
    <li>
        <label for="nim">NIM : </label>
        <input type="text" name="nim" id="nim"required value="<?= $mhs["nim"]; ?>">
    </li>
    <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
    </li>
    <li>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
    </li>
    <li>
        <label for="hobby">Hobby : </label>
        <input type="text" name="hobby" id="hobby" required value="<?= $mhs["hobby"]; ?>">
    </li>
    <li>
        <button type="submit" name="submit">Ubah Data</button>
    </li>
</ul>

</form>
    
</body>
</html>