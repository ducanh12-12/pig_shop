<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
    .video-container {
        display: flex;
        justify-content: space-between;
    }

    .video {
        flex-basis: 30%;
        margin: 5px;
        text-align: center; /* Thêm lệnh này để căn giữa tiêu đề */
    }

    .video iframe {
        margin-bottom: 10px; /* Thêm khoảng cách giữa video và tiêu đề */
    }
</style>
</head>

<body>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "") or die("Không thể kết nối đến máy chủ");
mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Truy vấn cơ sở dữ liệu để lấy danh sách video theo id giảm dần
$sql = "SELECT id, title, links FROM videos ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="grid">';
    echo '<h2 class="uppercase text-prim text-[1.5rem] mt-8 font-[900] pb-3 mb-3 border-b border-[#02c4c1] text-center">Video của Lợn</h2>';
    echo '<div class="video-container">';
    
    while ($row = $result->fetch_assoc()) {
        $embed_link = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $row["links"]);
        $title = $row["title"];
        echo '<div class="video">';
        echo '<iframe width="350" height="196" src="' . $embed_link . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        echo '<strong>' . $title . '</strong>';
        echo '</div>';
    }
    
    echo '</div>';
    echo '</div>';
} else {
    echo "Không tìm thấy video.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
</body>
</html>
