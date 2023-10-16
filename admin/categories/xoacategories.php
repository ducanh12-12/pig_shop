<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id =$_REQUEST["idhang"];
    $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
    //Chọn CSDL để làm việc
    mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
    $sql="DELETE FROM categories  WHERE id  = $id";
    mysqli_query($conn,$sql);
    header('Location: http://localhost/pig_shop/admin/categories');
    ?>
</body>
</html>