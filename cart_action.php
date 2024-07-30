<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'database.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    switch ($action) {
        case 'add':
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity']++;
                } else {
                    $_SESSION['cart'][$id] = [
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'quantity' => 1
                    ];
                }
            }
            break;
        
        case 'remove':
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
            break;
    }
}

header('Location: cart.php');
exit();