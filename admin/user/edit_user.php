<!DOCTYPE html>
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
            display: block; /* Ẩn ảnh ban đầu */
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
    <?php
    $id = $_REQUEST["id"];
    $conn = mysqli_connect("localhost", "root", "") or die ("Không connect đc với máy chủ");
    // Chọn CSDL để làm việc
    mysqli_select_db($conn, "pig_shop") or die ("Không tìm thấy CSDL");
    // Tạo câu truy vấn
    $sql = "Select * from `users` WHERE `users`.`id` = $id";
    $result_se = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result_se);
    $id = $row->id;
    $full_name = $row->full_name;
    $date_of_birdth = $row->date_of_birdth;
    $gender = $row->gender;
    $phone_number = $row->phone_number;
    $email = $row->email;
    $pass = $row->pass;
    $status = $row->status;
    $avatar = $row->avatar;
    $roles = $row->roles;
    ?>
    <div class="flex">
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    Danh sách người dùng / Sửa
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body mb-3 mt-3">
                    <h2 align="center"> Nhập thông tin mới </h2> <br>
					<?php if (isset($_GET['error'])) 
					{
					?>
						<div class="alert alert-danger error" role="alert" align="center">
							<?php echo $_GET['error']; ?>
						</div>				
					<?php 
					}
					?>
					<br>
                    <form name="frm_add_user" action="edit_user_connect.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        <table border="1" cellspacing="0" cellpadding="0" align="center" class="table table-bordered w-50">
                            <thead class="table-danger">
                                <tr>
                                    <td width="130" colspan="2" align="center">Ảnh đại diện</td>
                                    <td width="130" colspan="2" align="center">Thông tin</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="6" colspan="2" width="260">
                                        <!-- Thẻ div để hiển thị ảnh -->
                                        <div id="image-container">
                                            <img id="selected-image" src="<?php echo $avatar?>" alt="Ảnh đại diện">
                                        </div>
                                    </td>
                                    <td width="130"><div class="mb-3 mt-3 ">Họ và tên:</div></td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên" name="txt_name" value="<?php echo $full_name?>" required>
                                            <div class="invalid-feedback">Điền đầy đủ tên.</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130"><div class="mb-3 mt-3 ">Ngày sinh:</div></td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="date" class="form-control" id="date" placeholder="Ngày sinh" name="txt_date" value="<?php echo $date_of_birdth?>" required>
                                            <div class="invalid-feedback">Chọn ngày sinh.</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130"><div class="mb-3 mt-3 ">Giới tính:</div> </td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="radio" name="txt_gender" value="Nam" class="form-check-input" <?php echo $gender == "Nam" ? 'checked' : '' ?> required> Nam
                                            <input type="radio" name="txt_gender" value="Nữ" class="form-check-input" <?php echo $gender == "Nữ" ? 'checked' : '' ?> required> Nữ
                                            <br>
                                            <div class="invalid-feedback">Chọn giới tính.</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130"><div class="mb-3 mt-3 ">SĐT:</div> </td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="number" class="form-control" id="phone" placeholder="Nhập SĐT" name="txt_phone" value="<?php echo $phone_number?>" required>
                                            <div class="invalid-feedback">Điền SĐT.</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130"><div class="mb-3 mt-3 ">Email:</div></td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="email" class="form-control" id="email" placeholder="Nhập email" name="txt_email" value="<?php echo $email?>" required>
                                            <div class="invalid-feedback">Điền đúng định dạng email.</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="130"><div class="mb-3 mt-3 ">Mật khẩu:</div></td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="txt_pass" value="<?php echo $pass?>" required>
                                                <button type="button" class="btn btn-success" name="passwordToggle" id="passwordToggle" onclick="togglePasswordVisibility()"><span class="bi bi-eye"></span></button>
                                                <div class="invalid-feedback">Điền mật khẩu.</div>
                                            </div> 
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="260">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="file" name="avatar" id="avatar" onchange="displayImage()"><br>
                                            <div class="invalid-feedback">Chọn ảnh.</div>
                                        </div>
                                    </td>
                                    <td width="130"><div class="mb-3 mt-3 ">Trạng thái:</div></td>
                                    <td width="130">
                                        <div class="mb-3 mt-3 has-validation">
                                            <input type="radio" name="txt_status" class="form-check-input" value="1" <?php echo $status == '1' ? 'checked' : '' ?> required> active
                                            <input type="radio" name="txt_status" class="form-check-input" value="0" <?php echo $status == '0' ? 'checked' : '' ?> <?php echo $roles === 'is super admin' ? 'disabled' : '' ?> required> unactive
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" width="520" align="center">
                                        <input type="submit" id="submit_save" class="btn btn-success" name="save" value="Lưu lại"/>
                                        <input type="submit" id="submit_exit" class="btn btn-danger" name="exit" value="Thoát" formaction="list_user.php" formnovalidate>    
                                    </td>
                                </tr>
                            </tbody>
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
