<?php

require 'db-conn.php';

// cek apakah tombil submit sudah diteka atau belum/udh jadi fungsi
if(isset($_POST["submit"])) {
    var_dump($_POST);
    
    // ambil data tiap elemen dalama form
    // $list = $_POST["list"];
   
    
    // // query insert data
    // $query = "INSERT INTO todo VALUES('$list')";
    // mysqli_query($conn, $query);

    // Cek apakah data berhasil ditambah
    if (tambah($_POST) > 0 ){
        echo" <script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'indek.php';
        </script>";
    }else {
        echo" <script>
        alert('Data Gagal');
        document.location.href = 'indek.php';
        </script>";
    }
  
 }

 ?>

