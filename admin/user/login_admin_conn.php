<?php
if (isset($_POST['login_admin'])) {
    $user = $_POST['txt_user'];
    $pass = $_POST['txt_pass'];

   if($user == "tkadmin" && $pass =="admin123@")
   {
	   header("Location: ../index.php");
	   exit();
   }
	else
	{
		header("Location: login_admin.php?error=Tên đăng nhập hoặc mật khẩu không chính xác");
        exit();
	}
}
?>
