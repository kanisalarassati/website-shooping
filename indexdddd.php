<?php
include 'database.php'; // Memasukkan file konfigurasi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Kanisa Mobil Padang</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
</head>
<body>
    <header>
        <h1>Selamat Datang Di Kanisa Mobil Padang</h1>
        <h1>Mobil Padang Murah</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Produk</a></li>
                <li><a href="add_product.php">Tambah Produk</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contact.php">Kontak</a></li>
                <li><a href="indeex.php">Laporan</a></li>
                <select name="laporan.php" id="laporan.php">
  <option value="laporan_harian.php">Hari</option>
  <option value="laporan_bulanan.php">Bulan</option>
  <option value="laporan_tahunan.php">Tahun</option>
  <option value="laporan_stok.php">Stok</option>
</select>
                <li><a href="profile.php">Profil</a></li>
                
               
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured-products">
            <h2>Produk Unggulan</h2>
            <div class="products">
                <?php
                // Query untuk mendapatkan produk unggulan
                $query = "SELECT * FROM products LIMIT 5";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='assets/images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3>" . $row["name"] . "</h3>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<p>Rp" . $row["price"] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada produk unggulan saat ini.</p>";
                }
                ?>
            </div>
        </section>
    </main>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #87ceeb;
            color:#2a0308;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            background: #f0f8ff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* Makes sure the padding does not affect the total width of the inputs */
        }
        input[type="submit"] {
            background-color: #2a0308;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #01447e;
        }
        form br {
            display: none;
        }
    </style>

    <footer>
        <p>&copy; 2024 Kanisa Mobil Padang. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
