<?php
include 'koneksi.php';
//Update
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $no_pinjaman = $_GET['no_pinjaman'];
    $sql = "SELECT * FROM Pinjaman WHERE no_pinjaman='$no_pinjaman'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No pinjaman found";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_pinjaman = $_POST['no_pinjaman'];
    $id_user = $_POST['id_user'];
    $tgl_pinjaman = $_POST['tgl_pinjaman'];
    $nominal = $_POST['nominal'];
    $tenor = $_POST['tenor'];

    $sql = "UPDATE Pinjaman SET id_user='$id_user', tgl_pinjaman='$tgl_pinjaman', nominal='$nominal', tenor='$tenor' WHERE no_pinjaman='$no_pinjaman'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
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
    <title>Update Pinjaman</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header">
    <h2>Update Pinjaman</h2>
    </div>

    <form method="post" action="" style=" margin: 20px;">
        No Pinjaman: <input type="text" name="no_pinjaman" value="<?php echo $row['no_pinjaman']; ?>"><br><br>
        ID User: <input type="text" name="id_user" value="<?php echo $row['id_user']; ?>"><br><br>
        Tanggal Pinjaman: <input type="date" name="tgl_pinjaman" value="<?php echo $row['tgl_pinjaman']; ?>"><br><br>
        Nominal: <input type="text" name="nominal" value="<?php echo $row['nominal']; ?>"><br><br>
        Tenor: <input type="text" name="tenor" value="<?php echo $row['tenor']; ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <a href="./pinjaman.php">Kembali</a>
</body>
</html>