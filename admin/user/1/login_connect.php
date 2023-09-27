<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<?php		
//Xử lý đăng nhập
	if (isset($_POST['login']))
	{
		$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
		mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc

		//Lấy dữ liệu nhập vào
		$email1 = addslashes($_POST['txt_email1']);
		$pass1 = addslashes($_POST['pass1']);

		//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
		if (!$email1 || !$pass1) {
		}


		//Kiểm tra tên đăng nhập có tồn tại không
		$query = "SELECT email, pass FROM users WHERE email='$email1'";
		$result = mysqli_query($connect, $query) or die( mysqli_error($connect));

		if (!$result) {
			header("Location: login.php?error=Email hoặc mật khẩu không chính xác");
			exit;
		} else {
			header("Location: list_user.php");
		}

		//Lấy mật khẩu trong database ra
		$row = mysqli_fetch_array($result);

		//So sánh 2 mật khẩu có trùng khớp hay không
		if ($pass1 != $row['pass']) {
			header("Location: login.php?error=Email hoặc mật khẩu không chính xác");
			exit;
		}

		$connect->close();
	}
	?>
<body>
</body>
</html>