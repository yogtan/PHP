<?php
session_start();
if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'db-conn.php';
// require 'tambah.php';

// $sql = "CREATE TABLE user (
//    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    username VARCHAR(255) NOT NULL,
//     password VARCHAR(255) NOT NULL
//    )";

//   if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }


$todo = query("SELECT * FROM todo");
$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDoList</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin: 0;
            padding: 0;
        }

        input {
            width: 100%;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">To Do List</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        <h1>To Do List</h1>

        <form action="tambah.php" method="POST">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="list" id="list" placeholder="Enter a to-do item" class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>List</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todo as $row) : ?>
                    <tr>
                        <td><?= $row["list"]; ?></td>
                        <td>
                            <a href="selesai.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Kamu yakin?')">Selesai</a>
                            <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Kamu yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
