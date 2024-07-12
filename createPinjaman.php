<?php
include 'koneksi.php';

// Create
if(isset($_POST['create'])){
    $no_pinjaman = $_POST['no_pinjaman'];
    $id_user = $_POST['id_user'];
    $tgl_pinjaman = $_POST['tgl_pinjaman'];
    $nominal = $_POST['nominal'];
    $tenor = $_POST['tenor'];

    $sql = "INSERT INTO Pinjaman (no_pinjaman, id_user, tgl_pinjaman, nominal, tenor) VALUES ('$no_pinjaman', '$id_user', '$tgl_pinjaman', '$nominal', '$tenor')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: pinjaman.php");
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Pinjaman</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header">
    <h2>Create Pinjaman</h2>
    </div>
    
    <form method="post" action="" style=" margin: 20px;">
        No Pinjaman: <input type="text" name="no_pinjaman"><br><br>
        ID User: <input type="text" name="id_user"><br><br>
        Tanggal Pinjaman: <input type="date" name="tgl_pinjaman"><br><br>
        Nominal: <input type="text" name="nominal"><br><br>
        Tenor: <input type="text" name="tenor"><br><br>
        <input type="submit" name="create" value="Create">
    </form>
    <a href="./pinjaman.php">Kembali</a>
</body>
</html>