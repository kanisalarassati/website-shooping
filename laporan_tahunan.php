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
