<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM users WHERE id = '$userId'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("Pengguna tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Kanisa Mobil Padang</title>
</head>
<body>
    <h2>Profile Pengguna</h2>
    <form action="update_profile.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
        
        <!-- Tambahkan field lain sesuai kebutuhan -->
        
        <input type="submit" value="Update Profil">
    </form>
</body>
<style>
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color:#2a0308;
        }
        form {
            max-width: 300px;
            margin: 20px auto;
            background: #008B8B;
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


