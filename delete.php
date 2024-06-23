<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'connect.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM `sanpham` WHERE `id` = '$id'";

    if ($result = $con->query($sql)) {
        echo '<div class="alert alert-success" role="alert">
                <h1>Xoá sản phẩm thành công! Click vào <a href="list-product.php">đây</a> để về trang danh sách</h1>
              </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <h1>Có lỗi xảy ra! Click vào <a href="list-product.php">đây</a> để về trang danh sách</h1>
              </div>';
    }

    
    ?>
</body>
</html>