<?php
include '../database.php'; // Memasukkan konfigurasi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Produk - Kanisa Mobil Padang</title>
</head>
<body>
    <h1>Semua Produk</h1>
    <div class="products">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='../assets/images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h3><a href='detail.php?id=" . $row["id"] . "'>" . $row["name"] . "</a></h3>";
                echo "<p>Rp" . number_format($row["price"], 2, ',', '.') . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada produk yang ditambahkan.</p>";
        }
        ?>
    </div>
</body>
<style>
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f9;
            color:#2a0308;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            background: #81ace8;
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
</html>
