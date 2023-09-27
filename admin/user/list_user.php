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
			$phone_number[$stt]=$row->phone_number;
			$email[$stt]=$row->email;
			$date_of_birdth[$stt]=strtotime($row->date_of_birdth);
			$gender[$stt]=$row->gender;
			$pass[$stt]=$row->pass;
			$status[$stt]=$row->status;
			$avatar[$stt]=$row->avatar;
		}
	?>
	<?php
		$conn = mysqli_connect("localhost", "root","","pig_shop");
		if(isset($_GET["search"]) && !empty($_GET["search"]))
		{
			$key=$_GET["search"];
			$sql = "SELECT * FROM `users` WHERE full_name LIKE '%$key%' OR phone_number LIKE '%$key%' OR email LIKE '%$key%' OR gender LIKE '%$key%' OR status LIKE '%$key%'";
		}
		else{
			$sql = "SELECT * FROM `users`";
		}
		$result = mysqli_query($conn,$sql);
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
					<form action="del_list_connect.php" method="post" >
						<button type="submit" class="btn btn-success" name="add" formaction="add_user.php" formnovalidate>Thêm mới</button>
						<button type="submit" class="btn btn-danger" name="delete_cb">Xóa</button>
						<hr>
						<div class="d-flex justify-content-end">
							<form class="search-form" action="" method="get">
								<div class="input-group input-group-sm mb-3 w-25" justify-content-end>
									<input type="text" name="search" class="form-control" placeholder="Tìm kiếm" value="<?php if(isset($_GET["search"])) {echo $_GET["search"];} ?>">
									<input type="submit" class="btn btn-success" value="Tìm kiếm">
									<input type="button" class="btn btn-secondary" value="Tất cả" onClick="window.location.href = '/pig_shop/admin/user/list_user.php'"> 		
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
										<th class="text-center">Mật khẩu</th>
										<th class="text-center">Trạng thái</th>
										<th class="text-center">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<?php
									  for ($i=1;$i<=$tong_bg;$i++)
									  {
								    ?>
									<tr>
										<th>
											<input type='checkbox' name='cb_id[]' class="form-check-input" value="<?php echo $id[$i]?>" />
										</th> <!-- Thêm cột trống để chứa checkbox -->
										<th class="text-center"><?php echo $i?></th>
										<th class="text-center"><?php echo $full_name[$i]?></th>
										<th align="center">
											<?php
											$defaultAvatar = 'images/null.jpg'; // Đặt đường dẫn mặc định ở đây
											if (empty($avatar[$i])) {
												echo '<div class="d-flex justify-content-center"><img style="width: 55px; height: 70px" src="' . $defaultAvatar . '"></div>';
											} else {
												echo '<div class="d-flex justify-content-center"><img style="width: 55px; height: 70px" src="' . $avatar[$i] . '"></div>';
											}
											?>
										</th>
										
										<th class="text-center">
											<?php 
											if (empty($date_of_birdth[$i])) {
												echo "~Trống~";
											} else {
												echo date('d-m-Y',$date_of_birdth[$i]);
											}
											?>
										</th>
										<th class="text-center">
											<?php 
											if (empty($gender[$i])) {
												echo "~Trống~";
											} elseif ($gender[$i] == "Nam") {
												echo "Nam";
											} elseif ($gender[$i] == "Nữ") {
												echo "Nữ";
											} else {
												echo "Không xác định";
											}
											?>
										</th>
										<th class="text-center"><?php echo $phone_number[$i]?></th>
										<th class="text-center"><?php echo $email[$i]?></th>
										<th align="center" class="text-center" style="width: 120px;">
    										<input class="form-control-sm" type="password" value="<?php echo $pass[$i]?>" readonly style="width: 100%; background-color: transparent; text-align: center;" disabled>
										</th>
										<th class="text-center">
											<?php
											if ($status[$i] == 1) {
												echo '<span class="text-success">active</span>';
											} elseif ($status[$i] == 0) {
												echo '<span class="text-danger">unactive</span>';
											} else {
												echo '<span class="text-muted">Không xác định</span>';
											}
											?>
										</th>
										<th class="text-center">
											<a href="edit_user.php?id=<?php echo $id[$i]?>">
												<button  type='button' class='btn btn-warning' formnovalidate>Sửa</button>
											</a>
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
						</form>
				</div>
  			</div>
			
        </div>
    </div>
</body>

</html>