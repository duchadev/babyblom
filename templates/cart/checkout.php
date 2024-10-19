<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "username", "password", "database");

    $name = $_POST['name'];
    $address = $_POST['address'];
    $total = 0;

    foreach ($_SESSION['cart'] as $cartItem) {
        $total += $cartItem['gia'] * $cartItem['soluong'];
    }

    $sql = "INSERT INTO orders (name, address, total) VALUES ('$name', '$address', '$total')";
    $conn->query($sql);

    $orderId = $conn->insert_id;

    foreach ($_SESSION['cart'] as $cartItem) {
        $productId = $cartItem['id'];
        $quantity = $cartItem['soluong'];
        $price = $cartItem['gia'];

        $sql = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES ('$orderId', '$productId', '$quantity', '$price')";
        $conn->query($sql);
    }

    unset($_SESSION['cart']);
    echo "Đơn hàng của bạn đã được đặt thành công!";
}
?>

<form method="post" action="checkout.php">
    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" required>

    <label for="address">Địa chỉ:</label>
    <input type="text" id="address" name="address" required>

    <button type="submit">Thanh toán</button>
</form>