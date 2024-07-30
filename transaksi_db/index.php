<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transaksi_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data transaksi
$sql = "SELECT id_transaksi, tanggal, nama_pelanggan, total_harga FROM transaksi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tampilkan data dalam bentuk tabel
    echo "<table border='1'>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Total Harga</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_transaksi"]. "</td>
                <td>" . $row["tanggal"]. "</td>
                <td>" . $row["nama_pelanggan"]. "</td>
                <td>" . $row["total_harga"]. "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 hasil";
}

$conn->close();
?>