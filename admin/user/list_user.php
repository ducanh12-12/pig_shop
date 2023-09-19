<?php
//	$dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>
<body>
	<?php
		$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
		//Chọn CSDL để làm việc
		mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
		//Tạo câu truy vấn
		$sql="Select * from `users`";
		$result=mysqli_query($conn,$sql);
		$tong_bg=mysqli_num_rows($result);// đếm số bản ghi
			//echo $tong_bg; die;
		$stt=0;
		while($row=mysqli_fetch_object($result))
		{
			$stt++;
			$id[$stt]=$row->id;
			$full_name[$stt]=$row->full_name;
			$phone_number[$stt]=$row->full_name;
			$email[$stt]=$row->email;
			$date_of_birth[$stt]=$row->date_of_birth;
			$gender[$stt]=$row->gender;
			$status[$stt]=$row->status;
			$avatar[$stt]=$row->avatar;
		}
	?>
    <div class="flex" >
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
<!--
			<div >
				<h1 align="center" >Danh sách người dùng</h1>
			</div>
-->
			<div class="card">
    			<div class="card-body">
					Danh sách người dùng
				</div>
  			</div>
			<br>
			<div class="card">
    			<div class="card-body">
					<form>
						<button type="submit" class="btn btn-success" name="add" formaction="add_user.php" formnovalidate>Thêm mới</button>
						<button type="button" class="btn btn-danger" name="delete">Xóa</button>
						<hr>
						<div class="d-flex justify-content-end">
							<div class="input-group input-group-sm mb-3 w-25" justify-content-end>
								<input type="text" class="form-control" placeholder="Tìm kiếm">
								<button class="btn btn-success" type="submit">Tìm kiếm</button> 	
							</div>
						</div>
							<table width="547" border="1" align="center" class="table table-bordered" enctype="multipart/form-data">
								<thead class="table-danger">
									<tr>
										<th></th> <!-- Thêm cột trống để chứa checkbox -->
										<th class="text-center">STT</th>
										<th class="text-center">Họ và tên</th>
										<th class="text-center">Ảnh</th>
										<th class="text-center">Ngày sinh</th>
										<th class="text-center">Giới tính</th>
										<th class="text-center">SĐT</th>
										<th class="text-center">Gmail</th>
										<th class="text-center">Trạng thái</th>
										<th class="text-center">Chức năng</th>
			<!--							<th><?php echo $dmyhis  ?>    </th>-->
									</tr>
								</thead>
								<tbody>
									<?php
									  for ($i=1;$i<=$tong_bg;$i++)
									  {
								    ?>
									<tr>
										<th>
											<input type='checkbox' name='selected[]' value='{$row[0]}'/>
										</th> <!-- Thêm cột trống để chứa checkbox -->
										<th class="text-center"><?php echo $i?></th>
										<th class="text-center"><?php echo $full_name[$i]?></th>
										<th class="text-center"><img style="width: 55px;height: 70px" src="<?php echo $avatar[$i]?>"></th>
										<th class="text-center"><?php echo $date_of_birth[$i]?></th>
										<th class="text-center"><?php echo $gender[$i]?></th>
										<th class="text-center"><?php echo $phone_number[$i]?></th>
										<th class="text-center"><?php echo $email[$i]?></th>
										<th class="text-center"><?php echo $status[$i]?></th>
										<th class="text-center">
											<button  type='submit' class='btn btn-warning' name='edit' value='<?php $row[0] ?>'>Sửa</button>
											<a href="del_user.php?id=<?php echo $id[$i]?>">
												<button  type='button' class='btn btn-danger' name='delete' value='<?php $row[0] ?>'>Xóa</button>
											</a>
										</th>
									</tr>
									<?php
									  }
								    ?>
							</tbody>
							</table>
						</form>
				</div>
  			</div>
			
        </div>
    </div>
</body>

</html>