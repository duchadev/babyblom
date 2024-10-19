<?php
// Kết nối đến cơ sở dữ liệu
require '../../libraries/config.php';

// Thiết lập kết nối với MySQL
$conn = new mysqli(
    $config['database']['servername'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['database']
);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$tbEmail = ''; // Biến thông báo lỗi email trùng

// Xử lý form đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    // Kiểm tra mật khẩu có trùng khớp
    if ($password !== $password_confirmation) {
        echo "Mật khẩu không trùng khớp!";
    } else {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
        $checkEmailQuery = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkEmailQuery->bind_param("s", $email);
        $checkEmailQuery->execute();
        $result = $checkEmailQuery->get_result();

        if ($result->num_rows > 0) {
            $tbEmail = "Email đã tồn tại!";
        } else {
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Chèn thông tin người dùng mới vào cơ sở dữ liệu
            $insertQuery = $conn->prepare("INSERT INTO users (username, phone, email, password) VALUES (?, ?, ?, ?)");
            $insertQuery->bind_param("ssss", $username, $phone, $email, $hashedPassword);
            if ($insertQuery->execute()) {
                echo "Đăng ký thành công!";
                // Chuyển hướng người dùng đến trang đăng nhập sau khi đăng ký thành công
                header("Location: login.php");
                exit();
            } else {
                echo "Đã có lỗi xảy ra khi đăng ký!";
            }
        }

        // Đóng các prepared statements
        $checkEmailQuery->close();
        $insertQuery->close();
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 500px;
        width: 100%;
    }

    .form-control {
        border-radius: 50px;
        padding-left: 20px;
    }
    </style>
</head>

<body>
    <div class="register-container">
        <h2>ĐĂNG KÝ</h2>
        <form action="register.php" method="post">
            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Tên tài khoản" required>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email của bạn" required>
                <span style="color:red;">
                    <?php echo $tbEmail; ?>
                </span>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu"
                    required>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">ĐĂNG KÝ</button>
        </form>
        <p class="mt-3">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
</body>

</html>