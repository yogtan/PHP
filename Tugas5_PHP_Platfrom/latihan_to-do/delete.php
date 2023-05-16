<?php
session_start();

require 'db-conn.php';


$id= $_GET["id"];

if (delete($id) > 0 ){
    echo" <script>
    alert('Data Berhasil Dihapus');
    document.location.href = 'indek.php';
    </script>";
}else {
    echo" <script>
    alert('Data Gagal');
    document.location.href = 'indek.php';
    </script>";
}
// header("location: index.php")

?>