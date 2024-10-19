// File: add_to_cart.php
<?php
session_start();
$conn = new mysqli("localhost", "username", "password", "database");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, ten_vi, giamoi FROM table_product WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();

    if ($product) {
        $item = [
            "id" => $product['id'],
            "ten" => $product['ten_vi'],
            "gia" => $product['giamoi'],
            "soluong" => 1
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $isFound = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $item['id']) {
                $cartItem['soluong']++;
                $isFound = true;
                break;
            }
        }

        if (!$isFound) {
            $_SESSION['cart'][] = $item;
        }
    }
}

header("Location: view_cart.php");
?>