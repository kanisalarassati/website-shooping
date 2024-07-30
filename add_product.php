<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #87CEFA;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            background: white;
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
            background-color: #0275d8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1e90off;
        }
        form br {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Tambah Produk Baru</h1>
    <form action="process_add_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required></textarea>
        
        <label for="price">Harga:</label>
        <input type="text" id="price" name="price" required>
        
        <label for="image">Gambar Produk:</label>
        <input type="file" id="image" name="image" required>
        
        <input type="submit" value="Tambah Produk">
    </form>
</body>
</html>
<footer>
        <p>&copy; <?php echo date("Y"); ?> Kanisa Mobil Padang. Semua hak dilindungi.</p>
    </footer>
</body>
</html>