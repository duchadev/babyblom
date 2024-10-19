// File: view_cart.php
<?php
session_start();

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo "<table>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>";
    $total = 0;
    foreach ($_SESSION['cart'] as $cartItem) {
        $subtotal = $cartItem['gia'] * $cartItem['soluong'];
        $total += $subtotal;
        echo "<tr>
                <td>" . $cartItem['ten'] . "</td>
                <td>" . $cartItem['gia'] . "</td>
                <td>" . $cartItem['soluong'] . "</td>
                <td>" . $subtotal . "</td>
                <td><a href='remove_from_cart.php?id=" . $cartItem['id'] . "'>Xóa</a></td>
              </tr>";
    }
    echo "<tr>
            <td colspan='3'>Tổng cộng:</td>
            <td>" . $total . "</td>
          </tr>
          </table>";
    echo "<a href='checkout.php'>Tiến hành thanh toán</a>";
} else {
    echo "Giỏ hàng của bạn trống!";
}
?>