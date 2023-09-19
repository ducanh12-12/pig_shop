<!doctype html>
<html><head>
<meta charset="utf-8">
<title>Untitled Document</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container mt-3">
		<form action="upload.php" method="post" enctype="multipart/form-data"> <!-- Sử dụng enctype để hỗ trợ upload file -->
			<h1 align="center"> Thêm mới thông tin </h1>
			<div class="mb-3 mt-3 w-25 ">
				Họ và tên:
				<input type="text" class="form-control form-control-lg" id="name" placeholder="Nhập họ và tên" name="name">
			</div>
			<div class="mb-3 mt-3 w-25">
				Ngày sinh:
				<input type="date" class="form-control-sm" id="date" placeholder="Ngày sinh" name="date">
			</div>
			<div class="mb-3 mt-3 w-25">
				Giới tính:
				<select name="gender" class="form-control-sm">
					<option value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
				</select>
			</div>
			<div class="mb-3 mt-3 w-25">
				Số điện thoại:
				<input type="number" class="form-control-sm" id="phone" placeholder="Nhập SĐT" name="phone">
			</div>
			<div class="mb-3 mt-3 w-25">
				Địa chỉ email:
				<input type="email" class="form-control-sm" id="email" placeholder="Nhập email" name="email">
			</div>
			<div class="mb-3 mt-3 w-25">
				Trạng thái:
				<input type="radio" name="status" value="Live"> Live
				<input type="radio" name="status" value="Block"> Block
			</div>
			<div class="mb-3 mt-3 w-25">
                Ảnh đại diện:
                <input type"file" class="form-control-sm" id="avatar" name="avatar">
            </div>
			<input type="submit" class="btn btn-success" name="save" value="Lưu lại"/>
			<input type="submit" class="btn btn-danger" name="exit" value="Hủy bỏ" formaction="list_user.php" formnovalidate> 
		</form>
	</div>
</body>
</html>	 