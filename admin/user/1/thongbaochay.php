<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Untitled Document</title>
    <style>
        /* Định dạng cho thông báo */
        .alert-slide-up {
            display: none;
            position: fixed;
            bottom: -100px; /* Bắt đầu ẩn thông báo ở dưới cùng */
            right: 10px;
            z-index: 9999;
            transition: bottom 1s; /* Thời gian và hiệu ứng chuyển động */
        }
        .alert-slide-up.show {
            bottom: 10px; /* Hiển thị thông báo lên */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div id="alert-container" class="position-fixed bottom-0 end-0 p-3 ">
			<div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Thành công!</strong> Chúc mừng bạn đã thêm thành công.
			</div>
        </div>
    </div>

    <script>
        // Hiển thị thông báo và chạy từ từ từ dưới lên
        $("#alert-container").addClass("show");

        // Tự động ẩn thông báo sau một khoảng thời gian
        setTimeout(function() {
            $("#alert-container").alert("close");
        }, 4000); // Thời gian hiển thị thông báo (đơn vị là mili giây)
    </script>
</body>
</html>
