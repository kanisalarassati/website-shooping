<!DOCTYPE html>
<html>
<head>
    <title>Menu Laporan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Menu Laporan</h1>
    <nav>
        <ul>
            <li><a href="laporan_harian.php">Laporan Harian</a></li>
            <li><a href="laporan_stok.php">Laporan Stok</a></li>
            <li><a href="laporan_bulanan.php">Laporan Bulanan</a></li>
            <li><a href="laporan_tahunan.php">Laporan Tahunan</a></li>
        </ul>
        
    </nav>
</body>
</html>
</main>
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

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Kanisa Mobil Padang. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
