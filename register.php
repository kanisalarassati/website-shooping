<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Kanisa Mobil Padang</title>
</head>
<body>
    <h2>Daftar Akun Baru</h2>
    <form action="process_register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Daftar">
    </form>
</body>
<style>
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
<footer>
        <p>&copy; <?php echo date("Y"); ?> Kanisa Mobil Padang. Semua hak dilindungi.</p>
    </footer>
</body>
</html>