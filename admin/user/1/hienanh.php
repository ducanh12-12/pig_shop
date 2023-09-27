<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="utf-8">
    <title>Untitled Document</title>

    <style>
        /* Định dạng cho hình ảnh */
        #selected-image {
            max-width: 100%;
            height: auto;
            display: none; /* Ẩn ảnh ban đầu */
        }
    </style>
</head>
<body>
    <div class="flex">
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    Danh sách người dùng / Thêm người dùng
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body mb-3 mt-3">
                    <table border="1" cellspacing="0" cellpadding="0" align="center" class="table table-bordered w-50">
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
                                <div class="mb-3 mt-3">
                                    <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên" name="name">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <!-- ... Các dòng thông tin khác ... -->
                        </tr>
                        <tr>
                            <td colspan="2" width="260">
                                <div class="mb-3 mt-3">
                                    <input type="file" name="avatar" id="avatar" onchange="displayImage()">
                                </div>
                            </td>
                            <!-- ... Các dòng thông tin khác ... -->
                        </tr>
                        </tbody>
                        </thead>
                    </table>
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
