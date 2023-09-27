<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id=$_GET["id"];
	$full_name=$_POST["txt_name"];
	$date_of_birdth=$_POST["txt_date"];
	$phone_number=$_POST["txt_phone"];
	$email=$_POST["txt_email"];
	$gender=$_POST["txt_gender"];
	$pass=$_POST["txt_pass"];
	$status=$_POST["txt_status"];
	
	//Xử lý ảnh tải lên
	$uploadDir_img_logo = "./images/";
    
    $file_tmp = isset($_FILES['avatar']['tmp_name']) ? $_FILES['avatar']['tmp_name'] : ""; 
    $file_name = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : ""; 
    $file_type = isset($_FILES['avatar']['type']) ? $_FILES['avatar']['type'] : ""; 
    $file_size = isset($_FILES['avatar']['size']) ? $_FILES['avatar']['size'] : ""; 
    $file_error = isset($_FILES['avatar']['error']) ? $_FILES['avatar']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $file__name__=$dmyhis.$file_name;
    copy($file_tmp, $uploadDir_img_logo . $file__name__);
	$link = $uploadDir_img_logo . $file__name__;

	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
	//Chọn CSDL để làm việc
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
	//Tạo câu truy vấn
	$sql="UPDATE `users` SET full_name ='$full_name', phone_number='$phone_number', email='$email', date_of_birdth='$date_of_birdth', gender='$gender',pass='$pass', status ='$status', avatar='$link' WHERE `users`.`id` = $id";
	mysqli_query($conn,$sql);
	header("Location: list_user.php");
	
	?>
</body>
</html>