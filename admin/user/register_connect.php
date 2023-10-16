	<?php
	$conn = mysqli_connect("localhost", "root", "") or die("Không thể kết nối với máy chủ"); // Kết nối tới máy chủ MySQL
mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL"); // Chọn CSDL để làm việc
if (isset($_POST['register'])){
if (isset($_POST['txt_email']) && isset($_POST['txt_phone'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $phone = $_POST['txt_phone'];
    $password = $_POST['txt_pass'];
    $password1 = $_POST['txt_pass1'];

    // Kiểm tra xem email và số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
    $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $phone_check_query = "SELECT * FROM users WHERE phone_number='$phone' LIMIT 1";

    $email_result = mysqli_query($conn, $email_check_query);
    $phone_result = mysqli_query($conn, $phone_check_query);

    $user_email = mysqli_fetch_assoc($email_result);
    $user_phone = mysqli_fetch_assoc($phone_result);

    // Kiểm tra xem mật khẩu và xác nhận mật khẩu có trùng nhau không
    if ($user_email && $user_phone) {
        // Nếu cả email và số điện thoại đã tồn tại, báo lỗi
        header("Location: register.php?error=Email và Số điện thoại đã tồn tại.");
        exit();
    }elseif ($password !== $password1) {
        header("Location: register.php?error=Nhập lại mật khẩu không chính xác.");
        exit();
    } elseif ($user_email) {
        // Nếu email đã tồn tại, báo lỗi
        header("Location: register.php?error=Email đã tồn tại.");
        exit();
    } elseif ($user_phone) {
        // Nếu số điện thoại đã tồn tại, báo lỗi
        header("Location: register.php?error=Số điện thoại đã tồn tại.");
        exit();
    }

    // Nếu mật khẩu và xác nhận mật khẩu trùng khớp và email/số điện thoại không trùng, thực hiện đăng ký
    $query = "INSERT INTO users (full_name, email, phone_number, pass) VALUES ('$name', '$email', '$phone', '$password1')";
    mysqli_query($conn, $query);

    // Báo thành công và chuyển hướng đến trang đăng nhập
    header("Location: register.php?success=Đăng ký thành công.");
    exit();
} else {
    header("Location: register.php");
    exit();
}
}
?>