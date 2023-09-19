<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SỬA SẢN PHẨM</title>
</head>

<body>				
	<?php
	$id=$_REQUEST["idhang"];
  $id=$_REQUEST["txtid"];
  $image=$_REQUEST["txtimage"];
  $title=$_REQUEST["txttitle"];
  $description=$_REQUEST["txtdescription"];
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
//Chọn CSDL để làm việc
mysqli_select_db($conn,"web") or die ("Không tìm thấy CSDL");
//Tạo câu truy vấn
$sql_update_pigs="UPDATE pigs SET id='$id',title='$title' ,image='$image',description='$description' WHERE pigs . id=$id";
mysqli_query($conn,$sql_update_pigs);
header("Location: dssp.php ")
?>
</body>
</html>