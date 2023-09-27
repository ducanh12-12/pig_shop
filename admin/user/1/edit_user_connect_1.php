<?php
//Kết nối dến cơ sở dữ liệu
$conn = mysqli_connect("localhost","root","","pig_shop");
//Kiểm tra khi người dùng submit form
if (isset($_POST["save1"]))
{
	// Lấy dữ liệu trên form => Lưu vào biến
	$id = $_POST["id"];
	$full_name=$_POST["txt_name"];
	$phone_number=$_POST["txt_phone"];
	$email=$_POST["txt_email"];
	$date_of_birdth=$_POST["txt_date"];
	$gender=$_POST["txt_gender"];
	$status=$_POST["txt_status"];
	$avatar=$_POST["avatar"];
	
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
}
// Truy vấn dữ liệu
$sql = "UPDATE users SET full_name ='$full_name', phone_number='$phone_number', email='$email', date_of_birdth='$date_of_birdth', gender='$gender', status ='$status', avatar='$link' Where id ='$id'";
if (mysqli_query($conn,$sql)) 
{
	header('location: list_user.php');
}
else{
	$result = "Cập nhật thất bại" . mysqli_error($conn);
}