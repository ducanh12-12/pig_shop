<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SỬA SẢN PHẨM</title>
</head>

<body>				
	<?php
  $id=$_REQUEST["idhang"];
  $title=$_REQUEST["title"];
  $description=$_REQUEST["description"];
  $price=$_REQUEST["price"];
  $size=$_REQUEST["size"];
  $category_id = $_POST["category_id"];

	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
//Chọn CSDL để làm việc
mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
//Tạo câu truy vấn
$sql_update_pigs="UPDATE pigs SET id='$id',title='$title' ,avatar='$avatar',description='$description',category_id='$category_id' ,size='$size',price='$price'WHERE pigs . id=$id";
mysqli_query($conn,$sql_update_pigs);
header("Location: dssp.php ")
?>
</body>
</html>