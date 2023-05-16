<?php
//Function ini biar mmpermudh pemabgian kodingnya sehingga ini merupakan fungsi aja dari insert dll yang tinggal dipanggl
// koneksi
$conn =  mysqli_connect("localhost", "root", "", "mydb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $hobby = htmlspecialchars($data["hobby"]);
    
    // query insert data
    $query = "INSERT INTO myGuests VALUES('','$nim', '$nama', '$jurusan', '$hobby')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM myGuests WHERE id= $id");
    return mysqli_affected_rows($conn);
    
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $hobby = htmlspecialchars($data["hobby"]);
    
    $query = "UPDATE MyGuests SET 

            nim = '$nim',
            nama = '$nama',
            jurusan = '$jurusan',
            hobby = '$hobby'
            WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>