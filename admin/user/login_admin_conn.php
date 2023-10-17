<?php
session_start(); 

$conn = mysqli_connect("localhost", "root", "") or die("Không thể kết nối với máy chủ"); // Kết nối tới máy chủ MySQL
mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL"); // Chọn CSDL để làm việc

if (isset($_POST['login_admin'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    // Truy vấn SQL để kiểm tra xem email và mật khẩu có tồn tại trong cơ sở dữ liệu không
    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == 1) {
            $currentUserRole = $row['roles'];

            // Lưu giá trị $currentUserRole trong session
            $_SESSION['currentUserRole'] = $currentUserRole;

            // Tài khoản hợp lệ và có trạng thái = 1
            header("Location: ../index.php");
            exit();
        } else {
            // Tài khoản bị khóa, thông báo lỗi
            header("Location: login_admin.php?error=Tài khoản của bạn đã bị khóa");
            exit();
        }
    } else {
        // Đăng nhập thất bại, chuyển hướng trở lại login.php với thông báo lỗi
        header("Location: login_admin.php?error=Tên đăng nhập hoặc mật khẩu không chính xác");
        exit();
    }
} else {
    header("Location: login_admin.php");
    exit();
}
?>
