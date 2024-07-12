<?php
include 'koneksi.php';

// Read
$sql = "SELECT * FROM Pinjaman";
$result = $conn->query($sql);
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Read Pinjaman</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        function openRekapPopup() {
            var year = document.getElementById("year").value;
            var popup = window.open("rekap.php?year=" + year, "Rekap Pinjaman", "width=800,height=600");
            popup.focus();
            return false;
        }
    </script>
</head>
<body>
    <div class="header">
    <h2>Read Pinjaman</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="createPinjaman.php">Add Pinjaman</a></li>
        </ul>
    <table border="1">
        <tr>
            <th>No Pinjaman</th>
            <th>ID User</th>
            <th>Tanggal Pinjaman</th>
            <th>Nominal</th>
            <th>Tenor</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row["no_pinjaman"]."</td>
                <td>".$row["id_user"]."</td>
                <td>".$row["tgl_pinjaman"]."</td>
                <td>".$row["nominal"]."</td>
                <td>".$row["tenor"]."</td>
                <td>
                            <a href='updatePinjaman.php?no_pinjaman=".$row["no_pinjaman"]."'>Edit</a> |
                            <a href='delete.php?no_pinjaman=".$row["no_pinjaman"]."'>Delete</a>
                        </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        ?>
    </table>
    <form method="post" onsubmit="return openRekapPopup();">
        <label for="year">Masukkan Tahun:</label>
        <input type="number" name="year" id="year" required>
        <input type="submit" value="Cetak">
    </form>
</body>
</html>
