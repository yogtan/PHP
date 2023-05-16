<?php
require 'function.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo " 
    <script>
    alert('Data Berhasil Dihapus');
    document.location.href = 'myDB.php';
</script>";
} else {
    echo " 
    <script>
    alertFF('Tidak berhasil dihapus');
    document.location.href = 'myDB.php';
</script>";
}
