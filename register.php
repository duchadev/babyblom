<?php
@define('_lib', './libraries/');
include_once _lib . "config.php";
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$conn = new mysqli(
    $config['database']['servername'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['database']
);

// Check connection
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$tbEmail = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if ($password !== $password_confirmation) {
        echo "Mật khẩu không trùng khớp!";
    } else {
        // Check if email already exists
        $checkEmailQuery = $conn->prepare("SELECT * FROM Customer WHERE email = ?");
        if (!$checkEmailQuery) {
            die("Error preparing statement: " . $conn->error);
        }
        $checkEmailQuery->bind_param("s", $email);
        $checkEmailQuery->execute();
        $result = $checkEmailQuery->get_result();

        if ($result->num_rows > 0) {
            $tbEmail = "Email đã tồn tại!";
        } else {
            // Prepare insert query
            $insertQuery = $conn->prepare("INSERT INTO Customer (username, phone, email, `password`) VALUES (?, ?, ?, ?)");
            if (!$insertQuery) {
                die("Error preparing insert statement: " . $conn->error);
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery->bind_param("ssss", $username, $phone, $email, $hashedPassword);

            if ($insertQuery->execute()) {
                // Successful registration, redirect to login
                header("Location: login.php");
                exit();
            } else {
                echo "Đã có lỗi xảy ra khi đăng ký!";
            }
        }

        $checkEmailQuery->close();

        // Close insertQuery if it was created
        if (isset($insertQuery)) {
            $insertQuery->close();
        }
    }
}

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

    .register-container img {
        max-width: 150px;
        margin-bottom: 20px;
    }

    .register-container h2 {
        margin-bottom: 20px;
        font-weight: bold;
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

    .login-link,
    .register {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .login-link a:hover,
    .register a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="register-container">
        <img src="./images/ss2.jpg" alt="Baby Bloom Logo" />

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
                <br>

            </div>
            <div>
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