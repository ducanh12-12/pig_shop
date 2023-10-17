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
  $content = $_POST["content"];
  $link = "";
  if ($_FILES['image']['name']) {
	  $uploadDir_img = "../../images/";
	
	  $file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : "";
	  $file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : "";
	  $file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : "";
	  $file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : "";
	  $file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";
	
	  $dmyhis = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s"); ///Lay gio cua he thong
	  $file__name__ = $dmyhis . $file_name;
	  copy($file_tmp, $uploadDir_img . $file__name__);
	  $link = $file__name__;
  }
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
//Chọn CSDL để làm việc
mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
//Tạo câu truy vấn
if ($link) {
	$sql_update_pigs="UPDATE pigs SET id='$id',title='$title' ,avatar='$link',content = '$content',description='$description',category_id='$category_id',size='$size',price='$price' WHERE pigs . id=$id";
} else  {
	$sql_update_pigs="UPDATE pigs SET id='$id',title='$title',description='$description',content = '$content',category_id='$category_id',size='$size',price='$price' WHERE pigs . id=$id";
}
mysqli_query($conn,$sql_update_pigs);
header("Location: dssp.php ")
?>
</body>
</html>