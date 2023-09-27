<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Định dạng cho hình ảnh */
        #selected-image {
            max-width: 100%;
            height: auto;
            display: none; /* Ẩn ảnh ban đầu */
        }
    </style>
</head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>
<body>
	<?php 
		// Kết nối cơ sở dữ liệu
		$conn = mysqli_connect("localhost","root","","pig_shop");
		$id =$_GET["id"];
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
	
	// in danh sách dữ liệu
	while($row = mysqli_fetch_assoc($result))
	{
		$id=$row["id"];
		$full_name=$row["full_name"];
		$phone_number=$row["phone_number"];
		$email=$row["email"];
		$date_of_birdth=$row["date_of_birdth"];
		$gender=$row["gender"];
		$status=$row["status"];
		$avatar=$row["avatar"];
	}
	?>
    <div class="flex" >
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
			<div class="card">
    			<div class="card-body">
					Danh sách người dùng / Sửa
				</div>
  			</div>
			</br>
			<div class="card">
    			<div class="card-body mb-3 mt-3 ">
					<h2 align="center"> Nhập thông tin mới </h2> <br>
				  <form name="frm_add_user" action="edit_user_connect.php" method="post" enctype="multipart/form-data" class="was-validated" >
					<table border="1" cellspacing="0" cellpadding="0" align="center" class="table table-bordered w-50" >
						<thead class="table-danger">
						<tr>
							<td width="130" colspan="2" align="center">Ảnh đại diện</td>
							<td width="130" colspan="2" align="center">Thông tin</td> 
						</tr>
							<tbody>
								<tr>
									<td rowspan="5" colspan="2" width="260">
										<!-- Thẻ div để hiển thị ảnh -->
										<div id="image-container">
											<img id="selected-image" src="" alt="Ảnh đại diện">
										</div>
                            		</td>
									<td width="130"><div class="mb-3 mt-3 ">Họ và tên:</div></td> 
									<td width="130">
										<div class="mb-3 mt-3 ">
											<input type="text" class="form-control" id="name" placeholder="Nhập họ và tên" name="txt_name" value="<?php echo $full_name?>" required>
      										<div class="invalid-feedback">Điền đầy đủ tên.</div>
										</div>
									</td> 	
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Ngày sinh:</div></td>
									<td width="130">
										<div class="mb-3 mt-3 ">
											<input type="date" class="form-control" id="date" placeholder="Ngày sinh" name="txt_date" value="<?php echo $date_of_birdth?>" required>
      										<div class="invalid-feedback">Chọn ngày sinh.</div>
										</div>
									</td> 
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Giới tính:</div> </td>
									<td width="130">
										<div class="mb-3 mt-3">
												<input type="radio"	name="txt_gender" value="Nam"<?php echo $gender=='Nam'?> required> Nam
												<input type="radio" name="txt_gender" value="Nữ"<?php echo $gender=='Nữ'?> required> Nữ
												</br>
												<div class="invalid-feedback">Chọn giới tính.</div>
										</div>
									</td> 
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">SĐT:</div> </td>
									<td width="130">
										<div class="mb-3 mt-3">
											<input type="number" class="form-control" id="phone" placeholder="Nhập SĐT" name="txt_phone" value="<?php echo $phone_number?>" required>
      										<div class="invalid-feedback">Điền SĐT.</div>
										</div>
									</td> 	
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Email:</div></td>
									<td width="130">
										<div class="mb-3 mt-3">
											<input type="email" class="form-control" id="email" placeholder="Nhập email" name="txt_email" value="<?php echo $email?>" required>
      										<div class="invalid-feedback">Điền đúng định dạng email.</div>
										</div>
									</td> 	
								</tr>
								<tr>
									<td colspan="2" width="260">
                                		<div class="mb-3 mt-3">
                                    		<input type="file" name="avatar" id="avatar" value="<?php echo $avatar?>" onchange="displayImage()" required><br>
											<div class="invalid-feedback">Chọn ảnh.</div>
                                		</div>
                            		</td>
									<td width="130"><div class="mb-3 mt-3 ">Trạng thái:</div></td> 
									<td width="130">
										<div class="mb-3 mt-3 ">
											<input type="radio"	name="txt_status" value="Live"<?php echo $status=='Live'?>  checked> Live
											<input type="radio" name="txt_status" value="Block"<?php echo $status=='Block'?> disabled> Block
										</div>
									</td> 	
									</td> 
								</tr>
								<tr>
									<td colspan="4" width="520" align="center">
										<input type="submit" class="btn btn-success" name="save1" value="Lưu lại"/>
										<input type="submit" class="btn btn-danger" name="exit1" value="Thoát" formaction="list_user.php" formnovalidate>    
									</td>
								</tr>
							</tbody>
						</thead>
					</table>
				  </form>
				</div>
			</div>
		</div>
	</div>
<script>
        // Hàm hiển thị ảnh sau khi chọn tệp từ nút tải lên (upload)
        function displayImage() {
            const input = document.getElementById('avatar');
            const selectedImage = document.getElementById('selected-image');

            // Kiểm tra xem người dùng đã chọn tệp ảnh hay chưa
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Hiển thị ảnh trong thẻ img và bỏ ẩn
                    selectedImage.src = e.target.result;
                    selectedImage.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</body>
</html>