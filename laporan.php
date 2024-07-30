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
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulanan</title>
    
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>Laporan Bulanan</h1>
    <button onclick="printReport()">Cetak Laporan</button>

    <form method="GET" action="">
        <label for="bulan">Pilih Bulan:</label>
        <select name="bulan" id="bulan">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>

        <label for="tahun">Pilih Tahun:</label>
        <select name="tahun" id="tahun">
            <?php
            $currentYear = date("Y");
            for ($i = 2020; $i <= $currentYear; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>

        <button type="submit">Tampilkan Laporan</button>
    </form>

    <?php
    include 'database.php';

    if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        $sql = "SELECT p.nama_produk, SUM(t.jumlah) AS total_jumlah, SUM(t.jumlah * p.harga) AS total_harga 
                FROM transaksi t 
                JOIN produk p ON t.id_produk = p.id_produk 
                WHERE MONTH(t.tanggal) = $bulan AND YEAR(t.tanggal) = $tahun 
                GROUP BY p.nama_produk";
        $result = $conn->query($sql);

        $total_transaksi = 0;
        $total_nilai = 0;

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Total Jumlah</th>
                        <th>Total Harga</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nama_produk"] . "</td>
                        <td>" . $row["total_jumlah"] . "</td>
                        <td>" . number_format($row["total_harga"], 2, ',', '.') . "</td>
                      </tr>";
                $total_transaksi += $row["total_jumlah"];
                $total_nilai += $row["total_harga"];
            }
            echo "</table>";
            echo "<p>Total Jumlah Transaksi: " . $total_transaksi . "</p>";
            echo "<p>Total Nilai Transaksi: Rp " . number_format($total_nilai, 2, ',', '.') . "</p>";
        } else {
            echo "<p>Tidak ada hasil untuk bulan dan tahun yang dipilih</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
</body>
</html>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tahunan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>Laporan Tahunan</h1>
    <button onclick="printReport()">Cetak Laporan</button>

    <form method="GET" action="">
        <label for="tahun">Pilih Tahun:</label>
        <select name="tahun" id="tahun">
            <?php
            $currentYear = date("Y");
            for ($i = 2020; $i <= $currentYear; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>
        <button type="submit">Tampilkan Laporan</button>
    </form>

    <?php
    include 'database.php';

    if (isset($_GET['tahun'])) {
        $tahun = $_GET['tahun'];

        $sql = "SELECT p.nama_produk, SUM(t.jumlah) AS total_jumlah, SUM(t.jumlah * p.harga) AS total_harga 
                FROM transaksi t 
                JOIN produk p ON t.id_produk = p.id_produk 
                WHERE YEAR(t.tanggal) = $tahun 
                GROUP BY p.nama_produk";
        $result = $conn->query($sql);

        $total_transaksi = 0;
        $total_nilai = 0;

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Total Jumlah</th>
                        <th>Total Harga</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nama_produk"] . "</td>
                        <td>" . $row["total_jumlah"] . "</td>
                        <td>" . number_format($row["total_harga"], 2, ',', '.') . "</td>
                      </tr>";
                $total_transaksi += $row["total_jumlah"];
                $total_nilai += $row["total_harga"];
            }
            echo "</table>";
            echo "<p>Total Jumlah Transaksi: " . $total_transaksi . "</p>";
            echo "<p>Total Nilai Transaksi: Rp " . number_format($total_nilai, 2, ',', '.') . "</p>";
        } else {
            echo "<p>Tidak ada hasil untuk tahun yang dipilih</p>";
        }
    }

    $conn->close();
    ?>

</body>


</html>

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