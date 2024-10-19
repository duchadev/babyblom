// File: remove_from_cart.php
<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    foreach ($_SESSION['cart'] as $key => $cartItem) {
        if ($cartItem['id'] == $id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

header("Location: view_cart.php");
?>