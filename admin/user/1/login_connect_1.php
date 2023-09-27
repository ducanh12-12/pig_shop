<?php
 //Lấy thông tin từ form đăng nhập
$email = $_REQUEST["txt_email"];
$pass = $_REQUEST["txt_pass"];

$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
 //Thực hiện truy vấn SQL để kiểm tra thông tin đăng nhập
$query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
$result = mysqli_query($conn, $query);
if ($result) {
    // Kiểm tra số lượng hàng trả về từ truy vấn
    if (mysqli_num_rows($result) == 1) {
        // Lấy thông tin người dùng từ CSDL
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['pass'];

        // Kiểm tra mật khẩu
        if (password_verify($pass, $hashed_password)) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
            header("Location: list_user.php");
            exit;
        } else {
            // Đăng nhập thất bại, chuyển hướng lại đến trang login.php với thông báo lỗi
            header("Location: login.php?error=Email hoặc mật khẩu không chính xác");
            exit();
        }
    } else {
        // Đăng nhập thất bại, chuyển hướng lại đến trang login.php với thông báo lỗi
        header("Location: login.php?error=Email hoặc mật khẩu không chính xác");
        exit;
    }
} else {
    // Lỗi trong quá trình thực hiện truy vấn
    die("Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn));
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>
