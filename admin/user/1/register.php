<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url("images/user.png");
      background-size: cover; /* Để hình nền phủ kín phần diện tích của trang */
      background-repeat: no-repeat; /* Ngăn lặp lại hình nền */
      background-attachment: fixed; /* Giữ hình nền cố định khi cuộn trang */
    }
    
    .custom-card {
      margin-top: 200px; /* Đặt lề trên 10cm */
      margin-left: 50px; /* Đặt lề phải 5cm */
      max-width: 450px;
      width: 100%;
      height: auto;
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
	function togglePasswordVisibility1() 
	{
		var passwordField = document.getElementById("pass1");
		var passwordToggle = document.getElementById("passwordToggle1");

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
	<form action="register_connect.php" method="post" class="row g-3 needs-validation" novalidate>
	  <div class="card mx-auto custom-card">
		<div class="card-body">
		  <h2 align="center">Đăng Ký</h2>
			<?php if (isset($_GET['error'])) 
			{
			?>
				<div class="alert alert-danger error" role="alert">
    				<?php echo $_GET['error']; ?>
  				</div>				
			<?php 
			}
			?>
			<?php if (isset($_GET['success'])) 
			{
			?>
				<div class="alert alert-success sucess" role="alert">
    				<?php echo $_GET['success']; ?>
  				</div>				
			<?php 
			}
			?>
			<form >
				<div class="mb-3 mt-3 has-validation">
					<label for="email">Họ và tên:</label>
					<input type="text" class="form-control" id="name" placeholder="VD: Nguyễn Văn A" name="txt_name" required>
					<div class="invalid-feedback">Vui lòng nhập họ và tên.</div>
				</div>
				<div class="mb-3 mt-3 has-validation">
					<label for="phone">Số điện thoại:</label>
					<input type="number" class="form-control" id="phone" placeholder="VD: 0969399399 " name="txt_phone" required>
					<div class="invalid-feedback">Vui lòng nhập SĐT (tối đa 10 chữ số, số đầu tiên là số 0).</div>
				</div>
				<div class="mb-3 mt-3 has-validation">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="VD: demo@gmail.com" name="txt_email" required>
					<div class="invalid-feedback">Vui lòng nhập email.</div>
				</div>
				<div class="mb-3 mt-3 ">
					<label for="pwd">Mật khẩu:</label>
					<div class="input-group mb-3 has-validation">
						<input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="txt_pass" required>
						<button type="button" class="btn btn-success" name="passwordToggle" id="passwordToggle" onclick="togglePasswordVisibility()" ><span class="bi bi-eye"></span></button>
						<div class="invalid-feedback">Vui lòng nhập mật khẩu (tối thiểu 6 ký tự - tối đa 16 ký tự).</div>
					</div> 
				</div>
				<div class="mb-3 mt-3 ">
					<label for="pwd">Xác nhận mật khẩu:</label>
					<div class="input-group mb-3 has-validation">
						<input type="password" class="form-control" id="pass1" placeholder="Nhập lại mật khẩu" name="txt_pass1" required>
						<button type="button" class="btn btn-success" name="passwordToggle1" id="passwordToggle1" onclick="togglePasswordVisibility1()" ><span class="bi bi-eye"></span></button>
						<div class="invalid-feedback">Vui lòng nhập lại mật khẩu (Trùng mật khẩu nhập phía trên).</div>
					</div> 
				</div>
				<div class="container" align="right">
					Đã có tài khoản? 
					<a href="login.php" class="text-primary">Đăng nhập</a>
				</div>  
				<div class="container mt-3" >
					  <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">Đăng ký</button>
				</div>
			</form>
		</div>
	  </div>
	</form>
	<script>
	  (() => {
	    'use strict'

	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    const forms = document.querySelectorAll('.needs-validation')

	    // Loop over them and prevent submission
	    Array.from(forms).forEach(form => {
	      form.addEventListener('submit', event => {
	        if (!form.checkValidity()) {
	          event.preventDefault()
	          event.stopPropagation()
	        }

	        form.classList.add('was-validated')
	      }, false)
	    })
	  })()
	</script>
</body>
</html>
