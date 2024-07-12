<?php
include 'koneksi.php';

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$sql = "SELECT User.id_user, User.username, COUNT(Pinjaman.no_pinjaman) AS jumlah_pinjaman, SUM(Pinjaman.nominal) AS total_pinjaman, MAX(Pinjaman.tgl_pinjaman) AS pinjaman_terakhir 
        FROM User
        LEFT JOIN Pinjaman ON User.id_user = Pinjaman.id_user AND YEAR(Pinjaman.tgl_pinjaman) = $year
        GROUP BY User.id_user, User.username";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rekapan Pinjaman Anggota</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2 style="text-align: center;">REKAPAN PINJAMAN ANGGOTA</h2>
    <p style="text-align: center;">Periode tahun <b><?php echo $year; ?></b></p>
    <table border="1">
        <tr>
            <th>ID USER</th>
            <th>Username</th>
            <th>Jumlah Pinjaman</th>
            <th>Total Pinjaman</th>
            <th>Pinjaman Terakhir</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row["id_user"]."</td>
                <td>".$row["username"]."</td>
                <td>".$row["jumlah_pinjaman"]." kali</td>
                <td>".($row["total_pinjaman"] ?: 0)."</td>
                <td>".($row["pinjaman_terakhir"] ?: '-')."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        ?>
    </table>
    <p>Tanggal cetak : <?php echo('31 Mei 2024'); ?></p>
    <!-- <p>Tanggal cetak : <?php echo date('d F Y'); ?></p> -->
</body>
</html>
