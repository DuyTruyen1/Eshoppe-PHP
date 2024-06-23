<?php
session_start();
include 'connect.php';

if ($_POST) {
    if (isset($_POST['id']) && isset($_POST['xx'])) {
        $id = $_POST['id'];
        $xx = $_POST['xx'];

        $sql = "SELECT * FROM sanpham WHERE id = '$id'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $product['qty'] = 1;
            // Kiểm tra xem giỏ hàng đã được khởi tạo chưa, nếu chưa thì khởi tạo
            if ($xx == 1) {
                echo "ID da co trong tangQty(): $id";
                tangQty($id);
            } elseif ($xx == 2) {
                echo "ID da co trong giamQty(): $id";
                giamQty($id);
            } elseif ($xx == 3) {
                echo "ID da co trong xoaSanPham(): $id";
                xoaSanPham($id);
            } else {
                echo 'Có Lỗi Xảy ra ';
                exit;
            }
        }
    }
}

function tangQty($id) {
        if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty']++;
        updateTotalQuantity();

    } else {
        $_SESSION['cart'][$id]['qty'] = 1;
    }
}


function giamQty($id) {
    if (isset($_SESSION['cart'][$id]) && $_SESSION['cart'][$id]['qty'] > 1) {
        $_SESSION['cart'][$id]['qty']--;
        if ($_SESSION['cart'][$id]['qty'] === 0) {
            // sp == 0 thì xoá
            unset($_SESSION['cart'][$id]);
        }
        updateTotalQuantity();
    }
}

function xoaSanPham($id) {
    if(isset($_SESSION['cart'][$id])){
        var_dump($_SESSION['cart'][$id]);
        unset($_SESSION['cart'][$id]);
        updateTotalQuantity();
        exit;   
    }
}


function updateTotalQuantity() {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $product) {
            $_SESSION['cart'][$id]['total_price'] = $product['qty'] * $product['price'];
            var_dump( $_SESSION['cart'][$id]['total_price']);
        }
    }
    echo json_encode($_SESSION['cart'][$id]['total_price']);
    exit;
}

?>
