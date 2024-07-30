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
include 'database.php';

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
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(135, 206, 250);
        }
        h2 {
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color:  #ADD8E6;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        textarea {
            width: 96%;
            height: 100px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        input[type="submit"] {
            display: block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color:  #dc8f8f;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:  #a4aaf9;
        }
    </style>
</head>
<body>
</body>
</html>