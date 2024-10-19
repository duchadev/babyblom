<?php

@define('_lib', './libraries/');
include_once _lib . "config.php"; // Tệp cấu hình kết nối cơ sở dữ liệu
session_start();
// Bắt đầu kết nối với cơ sở dữ liệu
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

// Khởi tạo biến để lưu thông báo lỗi
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra xem người dùng nhập số điện thoại hay email
    if (!empty($phone)) {
        // Kiểm tra đăng nhập bằng số điện thoại
        $query = $conn->prepare("SELECT * FROM Customer WHERE phone = ?");
        $query->bind_param("s", $phone);
    } else {
        // Kiểm tra đăng nhập bằng email
        $query = $conn->prepare("SELECT * FROM Customer WHERE email = ?");
        $query->bind_param("s", $email);
    }

    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            $_SESSION['user_id'] = $user['id']; // Giả sử bảng Customer có trường 'id'
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // Chuyển hướng đến trang chính
            exit();
        } else {
            $errorMessage = "Mật khẩu không đúng!";
        }
    } else {
        $errorMessage = "Người dùng không tồn tại!";
    }

    $query->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .login-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .login-container img {
        max-width: 150px;
        margin-bottom: 20px;
    }

    .divider {
        margin: 20px 0;
        border-bottom: 1px solid #ccc;
    }

    .form-control {
        border-radius: 50px;
        padding-left: 20px;
    }

    .input-group-text {
        background-color: transparent;
        border: none;
    }

    .social-login a {
        font-size: 30px;
        margin: 0 10px;
        color: #6c757d;
    }

    .social-login a:hover {
        color: #495057;
    }

    .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #f8f9fa;
        border-color: #dee2e6 #dee2e6 #fff;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="./images/ss2.jpg" alt="Baby Bloom Logo" />
        <h2>ĐĂNG NHẬP</h2>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger">
            <?php echo $errorMessage; ?>
        </div>
        <?php endif; ?>

        <form action="" method="post">
            <ul class="nav nav-tabs d-flex justify-content-between mb-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="phone-tab" data-bs-toggle="tab" data-bs-target="#phone"
                        type="button" role="tab" aria-controls="phone" aria-selected="true">Số điện thoại</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button"
                        role="tab" aria-controls="email" aria-selected="false">Email</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="phone" role="tabpanel" aria-labelledby="phone-tab">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại của bạn"
                            aria-label="phone-number" />
                    </div>
                </div>
                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email của bạn"
                            aria-label="Email" />
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu"
                    required />
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">ĐĂNG NHẬP</button>
        </form>
        <div class="d-flex justify-content-between mt-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="rememberMe" />
                <label class="form-check-label" for="rememberMe">Ghi nhớ mật khẩu</label>
            </div>
            <a href="/BabyBloom/forgot-password" class="forgot-password">Quên mật khẩu?</a>
        </div>
        <p class="register mt-3">Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>