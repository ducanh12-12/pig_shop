<?php
//	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
	//Chọn CSDL để làm việc
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
	//Tạo câu truy vấn
	if(isset($_POST['delete_cb']))
	{
		$chkarr = $_POST['cb_id'];
		foreach($chkarr as $id)
		{
			mysqli_query($conn,"Delete From users Where id=".$id);
		}
		header("Location: list_user.php");
	}
	mysqli_close($conn);
	?>