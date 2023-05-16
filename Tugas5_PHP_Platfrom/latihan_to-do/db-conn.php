<?php

//Function ini biar mmpermudh pemabgian kodingnya sehingga ini merupakan fungsi aja dari insert dll yang tinggal dipanggl
// koneksi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn =  mysqli_connect("localhost", "root", "", "mydb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//   echo "Connected successfully tan";

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
    $list = $_POST["list"];

    
    // query insert data
    $query = "INSERT INTO todo VALUES('','$list')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM todo WHERE id= $id");
    return mysqli_affected_rows($conn);
    
}

function selesai($id){
    global $conn;
    // $id = $data["id"];
    // $list = htmlspecialchars($data["list"]);
    
    
    mysqli_query($conn, "UPDATE todo SET list='selesai' WHERE id= $id");
    return mysqli_affected_rows($conn);
}

function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudh ada atau belu
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
    username = '$username'");

    //cek username dh terdafat
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar')
        </script>";
        return false;
    }

    // cek konfirmasi password
        if( $password != $password2){
            echo" <script>
                    alert('konfirmasi password tidak sesuai');
                 </script>";
            return false;
        }
        // enskripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        mysqli_query($conn, "INSERT INTO user VALUES('$username', '$password','')");


        return mysqli_affected_rows($conn);
    }

