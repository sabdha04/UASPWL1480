<?php
include('koneksi.php');

$no_pinjaman = $_GET['no_pinjaman'];
$sql = "DELETE FROM Pinjaman WHERE no_pinjaman='$no_pinjaman'";

if ($conn->query($sql) === TRUE) {
    echo "pinjaman deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: pinjaman.php");
?>
