<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id=$_REQUEST["id"];
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
	//Chọn CSDL để làm việc
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
	//Tạo câu truy vấn
	$sql="DELETE FROM videos WHERE `videos`.`id` = $id";
	mysqli_query($conn,$sql);
	header("Location: list_video.php");	
	?>
</body>
</html>