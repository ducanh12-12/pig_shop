<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
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
	<script>
		function togglePasswordVisibility() 
		{
			var passwordField = document.getElementById("pass");
			var passwordToggle = document.getElementById("passwordToggle");

			if (passwordField.type === "password") 
			{
				passwordField.type = "text";
				passwordToggle.innerHTML = '<span class="bi bi-eye-slash"></span>';
			} 
			else 
			{
				passwordField.type = "password";
				passwordToggle.innerHTML = '<span class="bi bi-eye"></span>';
			}
		}
	</script>	
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
				  <form name="frm_add_user" action="add_user_connect.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate >
					<table border="1" cellspacing="0" cellpadding="0" align="center" class="table table-bordered w-50" >
						<thead class="table-danger">
						<tr>
							<td width="130" colspan="2" align="center">Ảnh đại diện</td>
							<td width="130" colspan="2" align="center">Thông tin</td> 
						</tr>
							<tbody>
								<tr>
									<td rowspan="6" colspan="2" width="260">
										<!-- Thẻ div để hiển thị ảnh -->
										<div id="image-container">
											<img id="selected-image" src="" alt="Ảnh đại diện">
										</div>
                            		</td>
									<td width="130"><div class="mb-3 mt-3 ">Họ và tên:</div></td> 
									<td width="130">
										<div class="mb-3 mt-3 has-validation">
											<input type="text" class="form-control" id="name" placeholder="Nhập họ và tên" name="txt_name" required>
											<div class="valid-feedback"></div>
      										<div class="invalid-feedback">Điền đầy đủ tên.</div>
										</div>
									</td> 	
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Ngày sinh:</div></td>
									<td width="130">
										<div class="mb-3 mt-3 has-validation">
											<input type="date" class="form-control" id="date" placeholder="Ngày sinh" name="txt_date" required>
											<div class="valid-feedback"></div>
      										<div class="invalid-feedback">Chọn ngày sinh.</div>
										</div>
									</td> 
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Giới tính:</div> </td>
									<td width="130">
										<div class="mb-3 mt-3 has-validation">
												<input type="radio"	name="txt_gender" class="form-check-input" value="Nam" required> Nam
												<input type="radio" name="txt_gender" class="form-check-input" value="Nữ" required> Nữ
												</br>
												<div class="valid-feedback"></div>
												<div class="invalid-feedback">Chọn giới tính.</div>
										</div>
									</td> 
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">SĐT:</div> </td>
									<td width="130">
										<div class="mb-3 mt-3 has-validation">
											<input type="number" class="form-control" id="phone" placeholder="Nhập SĐT" name="txt_phone" required>
											<div class="valid-feedback"></div>
      										<div class="invalid-feedback">Điền SĐT.</div>
										</div>
									</td> 	
								</tr>
								<tr>
									<td style="width: 120px;"><div class="mb-3 mt-3 ">Email:</div></td>
									<td width="130">
										<div class="mb-3 mt-3 has-validation">
											<input type="email" class="form-control" id="email" placeholder="Nhập email" name="txt_email" required>
											<div class="valid-feedback"></div>
      										<div class="invalid-feedback">Điền đúng định dạng email.</div>
										</div>
									</td> 	
								</tr>
								<tr>
									<td width="130"><div class="mb-3 mt-3 ">Mật khẩu:</div></td>
									<td width="130">
										<div class="mb-3 mt-3 has-validation">
											<div class="input-group mb-3">
												<input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="txt_pass" required>
												<button type="button" class="btn btn-success" name="passwordToggle" id="passwordToggle" onclick="togglePasswordVisibility()" ><span class="bi bi-eye"></span></button>
												<div class="valid-feedback"></div>
      											<div class="invalid-feedback">Điền mật khẩu.</div>
											</div> 
										</div>
									</td> 	
								</tr>
								<tr>
									<td colspan="2" width="260">
                                		<div class="mb-3 mt-3 has-validation">
                                    		<input type="file" name="avatar" id="avatar" onchange="displayImage()" required><br>
											<div class="valid-feedback"></div>
											<div class="invalid-feedback">Chọn ảnh.</div>
                                		</div>
                            		</td>
									<td width="130"><div class="mb-3 mt-3 ">Trạng thái:</div></td> 
									<td width="130">
										<div class="mb-3 mt-3 ">
											<input type="radio"	name="txt_status" class="form-check-input" value='1' checked> active
											<input type="radio" name="txt_status" class="form-check-input" value='0' disabled> unactive
										</div>
									</td> 	
									</td> 
								</tr>
								<tr>
									<td colspan="4" width="520" align="center">
										<input type="submit" id="submit_save" class="btn btn-success" name="save" value="Lưu lại"/>
										<input type="submit" id="submit_exit" class="btn btn-danger" name="exit" value="Thoát" formaction="list_user.php" formnovalidate>    
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
	
	(() => {
    'use strict'

    const submitSaveButton = document.getElementById('submit_save');

    if (submitSaveButton) {
        submitSaveButton.addEventListener('click', event => {
            const form = event.target.closest('form');

            if (form && !form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    }
})();
</script>
</body>
</html>