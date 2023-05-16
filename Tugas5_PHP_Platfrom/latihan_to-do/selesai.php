<?php

require 'db-conn.php';


//AMbil data dari url
$id = $_GET["id"];
// $query = "INSERT INTO todo VALUES('$list')";
    // mysqli_query($conn, $query);
    $query = "UPDATE todo SET list='selesai' WHERE id= $id";
    mysqli_query($conn, $query);
// $mhs = query("SELECT * FROM todo WHERE id = $id"[0]);
header("location: indek.php");
    // if (selesai($_POST) > 0 ){
    //     echo" <script>
    //     alert('Data Berhasil Diubah');
    //     document.location.href = 'indek.php';
    //     </script>";
    // }else {
    //     echo" <script>
    //     alert('Data Gagal Diubah');
    //     document.location.href = 'indek.php';
    //     </script>";
    // }
 

?>
