<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nút Sửa hoặc Xóa được bấm
    if (isset($_POST["edit"])) {
        // Xử lý thao tác Sửa ở đây
        // Trong trường hợp này, bạn có thể lấy ID người dùng từ $_POST["edit"] để biết người dùng nào được chọn để chỉnh sửa
        $userIdToEdit = $_POST["edit"];
        
        // Thực hiện các thao tác chỉnh sửa ứng với $userIdToEdit
    } elseif (isset($_POST["delete"])) {
        // Xử lý thao tác Xóa ở đây
        // Trong trường hợp này, bạn có thể lấy ID người dùng từ $_POST["delete"] để biết người dùng nào được chọn để xóa
        $userIdToDelete = $_POST["delete"];
        
        // Thực hiện các thao tác xóa ứng với $userIdToDelete
        // Ví dụ: Xóa người dùng có ID là $userIdToDelete từ cơ sở dữ liệu (nếu có)
        
        // Sau khi xóa xong, bạn có thể chuyển hướng trở lại trang list_user.php hoặc làm bất kỳ điều gì cần thiết.
        header("Location: list_user.php");
        exit();
    }
}
?>
