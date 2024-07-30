<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Harian</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<h1>Laporan Transaksi Harian</h1>
<form method="get" id="form-input">
    <label for="tanggal">Pilih Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d'); ?>">
    <br><br>
    <label for="pimpinan">Nama Pimpinan:</label>
    <input type="text" id="pimpinan" name="pimpinan" value="<?php echo isset($_GET['pimpinan']) ? $_GET['pimpinan'] : ''; ?>">
    <br><br>
    <button type="submit">Tampilkan</button>
</form>
<button onclick="printReport()">Cetak Laporan</button>

<?php
include 'database.php';

$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$pimpinan = isset($_GET['pimpinan']) ? $_GET['pimpinan'] : '';

$sql = "SELECT p.nama_produk, t.jumlah, t.tanggal FROM transaksi t 
        JOIN produk p ON t.id_produk = p.id_produk 
        WHERE t.tanggal = '$tanggal'";
$result = $conn->query($sql);

echo "<h2>Transaksi pada $tanggal</h2>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>Nama Produk</th><th>Jumlah</th><th>Tanggal</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nama_produk"]. "</td><td>" . $row["jumlah"]. "</td><td>" . $row["tanggal"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada transaksi pada tanggal ini.";
}

if ($pimpinan) {
    echo "<div class='signature'>";
    echo "<h3>Disetujui oleh:</h3>";
    echo "<p><strong>$pimpinan</strong></p>";
    echo "<br><br>";
    echo "<p>_______________________</p>";
    echo "<p>Tanda Tangan</p>";
    echo "</div>";
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