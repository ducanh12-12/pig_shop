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
        $conn = mysqli_connect("localhost", "root", "", "pig_shop") or die("Không thể kết nối đến máy chủ");
        mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
        
        // Số người dùng trên mỗi trang
        $usersPerPage = 10; // Thay đổi số này để hiển thị 5 người dùng trên mỗi trang
        
        // Trang hiện tại
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        
        // Tạo truy vấn dựa trên tìm kiếm
        $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
        $searchCondition = empty($search) ? '' : "WHERE full_name LIKE '%$search%' OR phone_number LIKE '%$search%' OR email LIKE '%$search%' OR gender LIKE '%$search%' OR status LIKE '%$search%'";
        
        // Tổng số người dùng
        $totalUsersQuery = "SELECT COUNT(id) AS total FROM users $searchCondition";
        $result = mysqli_query($conn, $totalUsersQuery);
        $totalUsers = mysqli_fetch_assoc($result)['total'];
        
        // Tổng số trang
        $totalPages = ceil($totalUsers / $usersPerPage);
        
        // Đảm bảo trang hiện tại hợp lệ
        if ($page < 1) {
            $page = 1;
        } elseif ($page > $totalPages) {
            $page = $totalPages;
        }
        
        // Xác định vị trí bắt đầu của người dùng
        $start = ($page - 1) * $usersPerPage;
        
        // Truy vấn CSDL với phân trang
        $query = "SELECT * FROM users $searchCondition LIMIT $start, $usersPerPage";
        $result = mysqli_query($conn, $query);
    ?>
    
    <div class="flex">
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    Quản lí người dùng
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <form method="post">
<!--
                        <div class="d-flex justify-content-end">
                            <form class="search-form" action="" method="get">
                                <div class="input-group input-group-sm mb-3 w-25">
                                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" value="<?php echo $search; ?>">
                                    <input type="submit" class="btn btn-success" value="Tìm kiếm">
                                    <input type="button" class="btn btn-secondary" value="Tất cả" onClick="window.location.href = '/pig_shop/admin/user/list_qtv.php'">
                                </div>
                            </form>
                        </div>
-->
                        <table class="table table-bordered" enctype="multipart/form-data">
                            <thead class="table-danger">
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Họ và tên</th>
                                    <th class="text-center">Ảnh</th>
                                    <th class="text-center">Ngày sinh</th>
                                    <th class="text-center">Giới tính</th>
                                    <th class="text-center">SĐT</th>
                                    <th class="text-center">Gmail</th>
                                    <th class="text-center">Mật khẩu</th>
                                    <th class="text-center">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = ($page - 1) * $usersPerPage; // Tính toán STT bắt đầu của trang hiện tại
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $stt++;
                                ?>
                                    <tr>
                                        <th class="text-center"><?php echo $stt; ?></th>
                                        <th class="text-center"><?php echo $row['full_name']; ?></th>
                                        <th align="center">
                                            <?php
                                            $defaultAvatar = 'images/null.jpg';
                                            $avatar = $row['avatar'];
                                            if (empty($avatar)) {
                                                echo '<div class="d-flex justify-content-center"><img style="width: 55px; height: 70px" src="' . $defaultAvatar . '"></div>';
                                            } else {
                                                echo '<div class "d-flex justify-content-center"><img style="width: 55px; height: 70px" src="' . $avatar . '"></div>';
                                            }
                                            ?>
                                        </th>
                                        <th class="text-center">
                                            <?php
                                            $date_of_birdth = strtotime($row['date_of_birdth']);
                                            if (empty($date_of_birdth)) {
                                                echo "~Trống~";
                                            } else {
                                                echo date('d-m-Y', $date_of_birdth);
                                            }
                                            ?>
                                        </th>
                                        <th class="text-center">
                                            <?php
                                            $gender = $row['gender'];
                                            if (empty($gender)) {
                                                echo "~Trống~";
                                            } elseif ($gender == "Nam") {
                                                echo "Nam";
                                            } elseif ($gender == "Nữ") {
                                                echo "Nữ";
                                            } else {
                                                echo "Không xác định";
                                            }
                                            ?>
                                        </th>
                                        <th class="text-center"><?php echo $row['phone_number']; ?></th>
                                        <th class="text-center"><?php echo $row['email']; ?></th>
                                        <th align="center" class="text-center" style="width: 120px;">
                                            <input class="form-control-sm" type="password" value="<?php echo $row['pass']; ?>" readonly style="width: 100%; background-color: transparent; text-align: center;" disabled>
                                        </th>
                                        <th class="text-center">
                                            <?php
                                            $status = $row['status'];
                                            if ($status == 1) {
                                                echo '<span class="text-success">active</span>';
                                            } elseif ($status == 0) {
                                                echo '<span class="text-danger">unactive</span>';
                                            } else {
                                                echo '<span class="text-muted">Không xác định</span>';
                                            }
                                            ?>
                                        </th>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
			<br>
            <div class="pagination">
                <?php
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='list_qtv.php?page=1&search=$search'>Trước</a></li>";
                }
                for ($i = max($page - 5, 1); $i <= min($page + 5, $totalPages); $i++) {
                    if ($i == $page) {
                        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='list_qtv.php?page=$i&search=$search'>$i</a></li>";
                    }
                }
                if ($page < $totalPages) {
                    echo "<li class='page-item'><a class='page-link' href='list_qtv.php?page=$totalPages&search=$search'>Sau</a></li>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
