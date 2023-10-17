<?php
$name = "";
$name = $_REQUEST["name"];
$pig_id = $_REQUEST["pig_id"];
$description = $_REQUEST["description"];
$phone_number = $_REQUEST["phone_number"];
$address = $_REQUEST["address"];
if ($name != "") {
    $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ"); //tạo kết nối với servers
    mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");

    $sql = "INSERT INTO `orders` (`name`, `pig_id`, `description`,`phone_number`,`address`) VALUES ('$name','$pig_id' , '$description', '$phone_number','$address')";
    mysqli_query($conn, $sql);
    header('location:http://localhost/pig_shop/detail.php?id=' . $pig_id. '&cart=success');
}
?>