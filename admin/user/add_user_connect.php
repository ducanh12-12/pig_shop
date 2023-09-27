<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	$full_name=$_REQUEST["txt_name"];
	$date_of_birdth=$_REQUEST["txt_date"];
	$phone_number=$_REQUEST["txt_phone"];
	$email=$_REQUEST["txt_email"];
	$pass=$_REQUEST["txt_pass"];
	$gender=$_REQUEST["txt_gender"];
	$status=$_REQUEST["txt_status"];
	//echo $tenhang; echo $xx;
	
	
	//Xử lý ảnh tải lên
	$uploadDir_img_logo = "./images/";
    
    $file_tmp = isset($_FILES['avatar']['tmp_name']) ? $_FILES['avatar']['tmp_name'] : ""; 
    $file_name = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : ""; 
    $file_type = isset($_FILES['avatar']['type']) ? $_FILES['avatar']['type'] : ""; 
    $file_size = isset($_FILES['avatar']['size']) ? $_FILES['avatar']['size'] : ""; 
    $file_error = isset($_FILES['avatar']['error']) ? $_FILES['avatar']['error'] : "";

    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $file__name__=$dmyhis.$file_name;
    copy ( $file_tmp, $uploadDir_img_logo.$file__name__);
	$link=$uploadDir_img_logo.$file__name__;
echo $link;
//	
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	// Câu truy vấn thêm dữ liệu được lưu vào biến $sql_insert_hangxs
$sql="INSERT INTO users (full_name,phone_number,email,date_of_birdth,gender,pass,status,avatar) VALUES ( '$full_name','$phone_number', '$email','$date_of_birdth','$gender','$pass','$status','$link')";
	//echo $sql_insert_hangxs; die;
	// THực hiện truy vấn
mysqli_query($conn,$sql);
	header("Location: list_user.php");
	?>
	
</body>
</html>