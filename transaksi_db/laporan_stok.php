<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<h1>Laporan Stok Tersedia dan Terjual</h1>
<button onclick="printReport()">Cetak Laporan</button>

<?php
include 'koneksi.php';

$sql = "SELECT p.nama_produk, p.stok_awal, p.stok_tersedia, 
        (p.stok_awal - p.stok_tersedia) AS terjual 
        FROM produk p";
$result = $conn->query($sql);

echo "<h2>Stok Produk</h2>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>Nama Produk</th><th>Stok Awal</th><th>Stok Tersedia</th><th>Terjual</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nama_produk"]. "</td><td>" . $row["stok_awal"]. "</td><td>" . $row["stok_tersedia"]. "</td><td>" . $row["terjual"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data stok.";
}
?>

</body>
</html>
