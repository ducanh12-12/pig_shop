<!DOCTYPE html>
<html lang="en">
<style>
    .form-control:focus {
        box-shadow: 0 0 0 0.15rem #f48ea1;
    }
</style>
<?php
$full_name = '';
$phone_number = '';
$content = '';
if (isset($_REQUEST['form_comment'])) {
    if (isset($_REQUEST['full_name'])) {
        $full_name = $_REQUEST["full_name"];
    }
    if (isset($_REQUEST['phone_number'])) {
        $phone_number = $_REQUEST["phone_number"];
    }
    if (isset($_REQUEST['content'])) {
        $content = $_REQUEST["content"];
    }
    if (!$full_name) {
        echo 'alert("Vui lòng nhập tên")';
        return;
    }
    if (!$phone_number) {
        echo 'alert("Vui lòng số điện thoại")';
        return;
    }
    if (!$content) {
        echo 'alert("Vui lòng nhập nội dung")';
        return;
    }
    $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
    mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
    if ($blog_id) {
        $sql = "INSERT INTO `comment` (`blog_id`, `content`, `full_name`,`phone_number`) VALUES ('$blog_id', '$content', '$full_name','$phone_number')";
        mysqli_query($conn, $sql);
        echo '<script>window.location.href = "/pig_shop/blogs/detail.php/?id='.$blog_id.'";</script>';
    } else if ($pig_id) {
        $sql = "INSERT INTO `comment` (`pig_id`, `content`, `full_name`,`phone_number`) VALUES ('$pig_id', '$content', '$full_name','$phone_number')";
    }
    }
?>

<body>
    <form class="w-full mt-3 grid grid-cols-10 gap-5 justify-between" autocomplete="off" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="form_comment" value="1">
        <textarea class="form-control col-span-7 !border-[#f48ea1]" name="content"
            placeholder="Nội dung bình luận (*)"></textarea>
        <div class="col-span-3">
            <div class="mb-3">
                <input placeholder="Họ tên (*)" name="full_name"
                    class="form-control forcus:!border-[#f48ea1] !border-[#f48ea1]" />
            </div>
            <div class="mb-3">
                <input placeholder="Số điện thoại (*)" name="phone_number"
                    class="form-control forcus:!border-[#f48ea1] !border-[#f48ea1]" />
            </div>
            <button type="submit" class="btn btn-primary text-white !border-[#f48ea1] !bg-[#f48ea1] mb-3">Gửi bình
                luận</button>
        </div>
    </form>
</body>

</html>