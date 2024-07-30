<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Kanisa Mobil Padang</title>
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
    <div class="container">
        <div class="cart-icon">>
            <h1>Keranjang Belanja</h1>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th> Id Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id => $item) {
                        $name = " " . htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
                        $quantity = htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8');
                        $price = htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8');
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td>$name</td>";
                        echo "<td>$quantity</td>";
                        echo "<td>$price</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Keranjang Anda kosong.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="total-price">
            Total: <span id="total-price">Rp0</span>
        </div>

        <a href="checkout.php" class="checkout-btn">Checkout</a>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            const totalPriceElement = document.getElementById('total-price');

            function calculateTotalPrice() {
                let total = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const itemPrice = checkbox.parentElement.parentElement.querySelector('.item-price').innerText;
                        total += parseInt(itemPrice.replace('Rp', '').replace(/\./g, ''));
                    }
                });
                totalPriceElement.innerText = Rp${total.toLocaleString()};
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotalPrice);
            });
        });
    </script>
</body>
</html>