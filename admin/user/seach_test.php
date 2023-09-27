<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "") or die("Không connect được với máy chủ");
        // Chọn CSDL để làm việc
        mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");

        // Xử lý tìm kiếm nếu nút tìm kiếm được nhấn
        if (isset($_POST['search_btn'])) {
            $searchTerm = $_POST['search'];
            // Tạo câu truy vấn tìm kiếm
            $sql = "SELECT * FROM `users` WHERE `full_name` LIKE '%$searchTerm%'";
            $result = mysqli_query($conn, $sql);
        } else {
            // Nếu không có tìm kiếm, hiển thị tất cả người dùng
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
        }

        $tong_bg = mysqli_num_rows($result); // Đếm số bản ghi
        $stt = 0;
    ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 align="center">Danh sách người dùng</h1>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form class="search-form" action="del_list_connect.php" method="post">
                    <button type="submit" class="btn btn-success" name="add" formaction="add_user.php"
                            formnovalidate>Thêm mới
                    </button>
                    <button type="submit" class="btn btn-danger" name="delete_cb">Xóa</button>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <div class="input-group input-group-sm mb-3 w-25" justify-content-end>
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm"
                                   value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
                            <input type="submit" class="btn btn-success" value="Tìm kiếm" name="search_btn">
                            <input type="button" class="btn btn-secondary" value="Tất cả"
                                   onClick="window.location.href = '/pig_shop/admin/user/seach_test.php'">
                        </div>
                    </div>
                    <table width="547" border="1" align="center" class="table table-bordered"
                           enctype="multipart/form-data">
                        <thead class="table-danger">
                        <tr>
                            <th></th> <!-- Thêm cột trống để chứa checkbox -->
                            <th class="text-center">STT</th>
                            <th class="text-center">Họ và tên</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">SĐT</th>
                            <th class="text-center">Gmail</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_object($result)) {
                            $stt++;
                            $id = $row->id;
                            $full_name = $row->full_name;
                            $phone_number = $row->phone_number;
                            $email = $row->email;
                            $gender = $row->gender;
                            $status = $row->status;
                            $avatar = $row->avatar;
                            ?>
                            <tr>
                                <td>
                                    <input type='checkbox' name='cb_id[]' class="form-check-input"
                                           value="<?php echo $id ?>"/>
                                </td>
                                <td class="text-center"><?php echo $stt ?></td>
                                <td class="text-center"><?php echo $full_name ?></td>
                                <td align="center">
                                    <div class="d-flex justify-content-center">
                                        <img style="width: 55px;height: 70px" src="<?php echo $avatar ?>">
                                    </div>
                                </td>
                                <td class="text-center"><?php echo $gender ?></td>
                                <td class="text-center"><?php echo $phone_number ?></td>
                                <td class="text-center"><?php echo $email ?></td>
                                <td class="text-center"><?php echo $status ?></td>
                                <td class="text-center">
                                    <a href="edit_user.php?id=<?php echo $id ?>">
                                        <button type='button' class='btn btn-warning' formnovalidate>Sửa</button>
                                    </a>
                                    <a href="del_user.php?id=<?php echo $id ?>">
                                        <button type='button' class='btn btn-danger' name='delete'
                                                value='<?php $row[0] ?>'>Xóa
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
