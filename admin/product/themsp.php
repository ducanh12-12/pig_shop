<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet"  href="../css/dssp.css">
</head>
	<?php
	$title = "";
	if(isset($_POST["form_add_product"])){
		$title=$_POST["title"];
		$description=$_POST["description"];
	}
	if( $title!=""&& $description !=""){
			$uploadDir_img = "../../images/";

			$file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : "";
			$file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : "";
			$file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : "";
			$file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : "";
			$file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";
		
			$dmyhis = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s"); ///Lay gio cua he thong
			$file__name__ = $dmyhis . $file_name;
			copy($file_tmp, $uploadDir_img. $file__name__);
			$link = $file__name__;
		
			$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với servers
			mysqli_select_db($conn,"web") or die ("Không tìm thấy CSDL");
			
			$sql="INSERT INTO `pigs` (`image`, `title`, `description`) VALUES ('$link', '$title', '$description')";
			mysqli_query($conn,$sql);
			header('location:http://localhost/chichi/admin/product/dssp.php');
		}
	?>
<form name="them_sp"  method="post" action="themsp.php" enctype="multipart/form-data" >
<input type="hidden" name="form_add_product" value="1"/>	
<table width="600" border="1" align="center">
        <tr>
        <td colspan="2" align="center">THÊM SẢN PHẨM</td>
        </tr>
		
	<tr>
		<td width="149">Tên sản phẩm</td>
		<td width="149"><input type="text" name="title"></td>
	</tr>
	<tr>
		<td width="149">Ảnh mô tả sản phẩm</td>
		<td width="149"><input type="file" name="image"></td>
	</tr>
	
	<tr>
		<td width="149">Mô tả sản phẩm</td>
		<td width="149"><input type="text" name="description" value="" required></td>
	</tr>

	<tr>
      <td calign="center"><button type = "submit">Gửi</button>
		  <input type="reset"></td>
    </tr>
	<tr>
	  <td colspan="4" align="center"><a href="\chichi\admin\product\dssp.php" >Xem danh sách sản phẩm</a></td>	
	</tr>
	</table>
		</form>
<body>
</body>
</html>