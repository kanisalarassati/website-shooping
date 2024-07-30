<?php
session_start(); // Memulai sesi
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Mengarahkan ke login jika belum masuk
}
include 'database.php'; // Meng-include konfigurasi database

// Menjalankan query untuk mendapatkan semua produk
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #BBDED6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #61C0BF;
        }
        tr:nth-child(even) {background-color: #EDFAFD;}
        a {
            text-decoration: none;
            color: #0275d8;
        }
        a:hover {
            color: #61C0BF;
        }
        .header {
            background-color: #6EB5C0;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .add-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #EDFAFD;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-btn:hover {
            background-color: #EDFAFD;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Produk Kami</h1>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                <th>produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Tambah ke Keranjang</th>
                    <th> Update</th>
                    <th> Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><img src="./assets/images/<?=htmlspecialchars($row["image"]); ?>" alt= " <?=htmlspecialchars($row["name"]);?>"style="max-width: 100px;"></td>
                            <td><?= htmlspecialchars($row["name"]); ?></td>
                            <td>Rp<?= number_format($row["price"], 2, ',', '.'); ?></td>
                            <td>
                                <a href='cart_action.php?action=add&id=<?= $row["id"]; ?>' class="add-to-cart">Tambah </a>
                            </td>
                            <td>
                                <a href='edit_product.php?action=add&id=<?= $row["id"]; ?>' class="add-to-cart">Update </a>
                            </td>
                            <td>
                                <a href='delete_product.php?action=add&id=<?= $row["id"]; ?>' class="add-to-cart">Delete </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan='3'>Belum ada produk yang ditambahkan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="checkout.php" class="checkout-btn">Checkout</a>
    </div>
</body>
</html>
