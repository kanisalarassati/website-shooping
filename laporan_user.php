<!DOCTYPE html>
<html>
<head>

    <title>Laporan Harian</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1, h2 {
    color: #420afa;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    text-decoration: none;
    padding: 8px 16px;
    background-color: #079ad3;
    color: rgb(163, 213, 248);
    border-radius: 4px;
}

nav ul li a:hover {
    background-color: #0056b3;
}

form {
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
}

button {
    margin: 20px 0;
    padding: 10px 20px;
    background-color: #079ad3;
    color: rgb(209, 235, 253);
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #079ad3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #079ad3;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #079ad3;
}

tr:nth-child(even) {
    background-color: #079ad3;
}

tr:hover {
    background-color: #079ad3;
}

.signature {
    margin-top: 50px;
    text-align: right;
}

.signature p {
    margin: 0;
    padding: 0;
}

.signature p + p {
    margin-top: 10px;
}

/* Sembunyikan form saat cetak */
@media print {
    #form-input {
        display: none;
    }
}

    </style>
   
    <script>
        function printReport() {
            window.print();
        }
    </script>
<?php
// Koneksi ke database
include 'database.php';

// Query SQL untuk menghitung jumlah transaksi per user
$sql = "SELECT u.id, u.username, COUNT(o.order_id) AS jumlah_transaksi
        FROM users u
        LEFT JOIN orders o ON u.id = o.user_id
        GROUP BY u.id, u.username
        ORDER BY jumlah_transaksi DESC";

$result = $conn->query($sql);

 {
    echo "<h2>Laporan Jumlah Transaksi per User</h2>";
    echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Jumlah Transaksi</th>
            </tr>";
    
    // Output data of each row
     {
        echo "<tr>
             
              </tr>";
    }
    echo "</table>";
} {
    echo "Tidak ada hasil yang ditemukan";
}

// Menutup koneksi database
$conn->close();
?>
