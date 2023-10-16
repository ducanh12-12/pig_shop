<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php
	$title1=$_REQUEST["txt_title1"];
	$links1=$_REQUEST["txt_links1"];
	//echo $tenhang; echo $xx;
	
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	// Câu truy vấn thêm dữ liệu được lưu vào biến $sql_insert_hangxs
$sql="INSERT INTO videos (title,links) VALUES ( '$title1','$links1')";
	//echo $sql_insert_hangxs; die;
	// THực hiện truy vấn
mysqli_query($conn,$sql);
	header("Location: list_video.php");
	?>
	
</body>
</html>