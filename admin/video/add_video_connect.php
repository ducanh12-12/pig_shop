<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
    $title1 = $_POST["txt_title1"];
    $links1 = $_POST["txt_links1"];

    $conn = mysqli_connect("localhost", "root", "") or die("Không thể kết nối đến máy chủ");
    mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");

    // Kiểm tra xem link video đã tồn tại trong CSDL hay chưa
    $check_query = "SELECT * FROM `videos` WHERE `links` = '$links1'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Nếu link video đã tồn tại, thông báo lỗi
        header("Location: list_video.php?error=Link video đã tồn tại");
        exit();
    } else {
        // Nếu link video chưa tồn tại, thêm vào CSDL
        $insert_query = "INSERT INTO `videos` (`title`, `links`) VALUES ('$title1', '$links1')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            // Nếu thêm thành công, thông báo thành công và chuyển hướng trở lại trang danh sách video
            header("Location: list_video.php?success=Thêm video thành công");
            exit();
        } else {
            // Nếu thêm không thành công, thông báo lỗi
            header("Location: list_video.php?error=Thêm video thất bại");
            exit();
        }
    }

?>	
</body>
</html>
