<?php
include_once '../../libraries/config.php';

// Kết nối cơ sở dữ liệu
$conn = new mysqli($config['database']['localhost'], $config['database']['root'], $config['database']['password'], $config['database']['bambinispa']);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy sản phẩm từ database
$sql = "SELECT id, ten_vi, giacu, giamoi, photo FROM table_product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị danh sách sản phẩm
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>
                <img src='" . htmlspecialchars($row["photo"]) . "' alt='" . htmlspecialchars($row["ten_vi"]) . "' />
                <h3>" . htmlspecialchars($row["ten_vi"]) . "</h3>
                <p>Giá cũ: " . htmlspecialchars($row["giacu"]) . " - Giá mới: " . htmlspecialchars($row["giamoi"]) . "</p>
                <a href='add_to_cart.php?id=" . htmlspecialchars($row["id"]) . "'>Thêm vào giỏ hàng</a>
              </div>";
    }
} else {
    echo "Không có sản phẩm nào!";
}

$conn->close();
?>