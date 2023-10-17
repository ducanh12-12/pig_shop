<?php
$id = $_GET["id"];
$full_name = $_POST["txt_name"];
$date_of_birdth = $_POST["txt_date"];
$phone_number = $_POST["txt_phone"];
$email = $_POST["txt_email"];
$gender = $_POST["txt_gender"];
$pass = $_POST["txt_pass"];
$status = $_POST["txt_status"];
$link = '';
// Xử lý ảnh tải lên
$uploadDir_img_logo = "./images/";
if ($_FILES['avatar']['name']) {
    $file_tmp = isset($_FILES['avatar']['tmp_name']) ? $_FILES['avatar']['tmp_name'] : "";
    $file_name = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : "";
    $file_type = isset($_FILES['avatar']['type']) ? $_FILES['avatar']['type'] : "";
    $file_size = isset($_FILES['avatar']['size']) ? $_FILES['avatar']['size'] : "";
    $file_error = isset($_FILES['avatar']['error']) ? $_FILES['avatar']['error'] : "";
    
    $dmyhis = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s");
    $file__name__ = $dmyhis . $file_name;
    copy($file_tmp, $uploadDir_img_logo . $file__name__);
    $link = $uploadDir_img_logo . $file__name__;
}

$conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
// Chọn CSDL để làm việc
mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");

// Kiểm tra sự tồn tại của Email và Phone trong CSDL
$email_check_query = "SELECT * FROM users WHERE email='$email' AND id != $id";
$phone_check_query = "SELECT * FROM users WHERE phone_number='$phone_number' AND id != $id";

$email_result = mysqli_query($conn, $email_check_query);
$phone_result = mysqli_query($conn, $phone_check_query);

if((mysqli_num_rows($email_result) > 0) && (mysqli_num_rows($phone_result) > 0)){
	header("Location: edit_user.php?id=$id&error=Số điện thoại và email đã tồn tại.");
    exit();
}elseif (mysqli_num_rows($email_result) > 0) {
    // Nếu Email đã tồn tại, báo lỗi
    header("Location: edit_user.php?id=$id&error=Email đã tồn tại.");
    exit();
} elseif (mysqli_num_rows($phone_result) > 0) {
    // Nếu Phone đã tồn tại, báo lỗi
    header("Location: edit_user.php?id=$id&error=Số điện thoại đã tồn tại.");
    exit();
} 
if (!preg_match("/^0[0-9]{9}$/", $phone_number)) {
    // Nếu SĐT không hợp lệ, báo lỗi
    header("Location: edit_user.php?id=$id&error=Số điện thoại không hợp lệ (VD: 0969566789).");
    exit();
}
if (strlen($pass) < 6 || strlen($pass) > 16) {
    // Nếu mật khẩu không đủ từ 6 đến 16 ký tự, báo lỗi
    header("Location: edit_user.php?id=$id&error=Mật khẩu phải từ 6 đến 16 ký tự.");
    exit();
}

// Nếu không có lỗi về Email và Phone, thực hiện câu truy vấn UPDATE
if ($link) {
    $sql = "UPDATE `users` SET full_name ='$full_name', phone_number='$phone_number', email='$email', date_of_birdth='$date_of_birdth', gender='$gender', pass='$pass', status ='$status', avatar='$link' WHERE `users`.`id` = $id";
} else {
    $sql = "UPDATE `users` SET full_name ='$full_name', phone_number='$phone_number', email='$email', date_of_birdth='$date_of_birdth', gender='$gender', pass='$pass', status ='$status' WHERE `users`.`id` = $id";
    
}
mysqli_query($conn, $sql);
header("Location: list_user.php");
?>
