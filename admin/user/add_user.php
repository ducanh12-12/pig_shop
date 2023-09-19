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
    <div class="flex" >
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
			<div class="card">
    			<div class="card-body">
					Danh sách người dùng / Thêm mới
				</div>
  			</div>
			</br>
			<div class="card">
    			<div class="card-body mb-3 mt-3 ">
					<h2 align="center"> Nhập thông tin mới </h2> <br>
				  <form name="frm_add_user" action="add_user_connect.php" method="post" enctype="multipart/form-data">
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
											<input type="text" class="form-control form-control" id="name" placeholder="Nhập họ và tên" name="txt_name">
										</div>
									</td> 	
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Ngày sinh:</div></td>
									<td width="130">
										<div class="mb-3 mt-3 ">
											<input type="date" class="form-control" id="date" placeholder="Ngày sinh" name="txt_date">
										</div>
									</td> 
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Giới tính:</div> </td>
									<td width="130">
										<div class="mb-3 mt-3 w-50">
											<select name="gender" class="form-control">
												<option value="Nam">Nam</option>
												<option value="Nữ">Nữ</option>
											</select>
										</div>
									</td> 
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">SĐT:</div> </td>
									<td width="130">
										<div class="mb-3 mt-3">
											<input type="number" class="form-control" id="phone" placeholder="Nhập SĐT" name="txt_phone">
										</div>
									</td> 	
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Email:</div></td>
									<td width="130">
										<div class="mb-3 mt-3">
											<input type="email" class="form-control" id="email" placeholder="Nhập email" name="txt_email">
										</div>
									</td> 	
								</tr>
								<tr>
									<td colspan="2" width="260">
                                		<div class="mb-3 mt-3">
                                    		<input type="file" name="avatar" id="avatar" onchange="displayImage()">
                                		</div>
                            		</td>
									<td width="130"><div class="mb-3 mt-3 ">Trạng thái:</div></td> 
									<td width="130">
										<div class="mb-3 mt-3 ">
											<input type="radio"	name="status" value="Live"> Live
											<input type="radio" name="status" value="Block"> Block
										</div>
									</td> 	
								</tr>
								<tr>
									<td colspan="4" width="520" align="center">
										<input type="submit" class="btn btn-success" name="save" value="Lưu lại"/>
										<input type="submit" class="btn btn-danger" name="exit" value="Hủy bỏ" formaction="list_user.php" formnovalidate>    
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