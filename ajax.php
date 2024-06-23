<?php
session_start();

include 'connect.php';

if ($_POST) {
    if (isset($_POST['getID']) && $_POST['getID'] === 'addToCart') {
        $productId = $_POST['xx'];

        // Lấy thông tin của sản phẩm từ db
        $sql = "SELECT * FROM sanpham WHERE id = '$productId'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $product['qty']=1;
            if (isset($_SESSION['cart'][$productId])) {
               
                // có sp rồi thì, tăng số lượng lên 1
                $_SESSION['cart'][$productId]['qty']++;
            } 
            else {
                // Nếu  chưa có, thêm vào giỏ hàng với số lượng là 1
                $_SESSION['cart'][$productId] = $product;
            }


        }
    }
    // echo "<pre>";
    // var_dump( $_SESSION['cart']);
}


?>
