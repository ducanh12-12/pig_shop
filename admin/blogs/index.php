<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="display: flex;">
    <?php include("../navbar.php") ?>
    <div class="flex-grow-1 p-6">
        <div class="card">
            <div class="card-body">
                Quản lí bài viết
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between">
                    <form class="form-inline min-w-[500px] gap-2 flex justify-end" method="post" action="index.php"
                        enctype="multipart/form-data">
                        <input class="form-control mr-sm-2" type="search" name="title" placeholder="Nhập từ khóa tìm kiếm"
                            aria-label="Search">
                        <button class="btn btn-outline-success w-[200px] my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                    <div class="button flex"><a style="color: white !important;"
                                href="/pig_shop/admin/blogs/themblog.php"><button class="btn btn-primary">Thêm bài viết </button></a></div>
                </div>
                <?php
                $search = isset($_REQUEST['title']) ? $_REQUEST['title'] : '';
                $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
                mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
                $sql = "Select * from `blogs`where title like '$search%'";
                $result = mysqli_query($conn, $sql);
                $tong_bg = mysqli_num_rows($result);
                $stt = 0;
                while ($row = mysqli_fetch_object($result)) {

                    $stt++;
                    $id[$stt] = $row->id;
                    $title[$stt] = $row->title;
                    $content[$stt] = $row->content;
                    $description[$stt] = $row->description;
                    $thumnail[$stt] = $row->thumnail;
                }
                ?>
                <table class="table table-border mt-3 table-hover" width="600" border="1">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i <= $tong_bg; $i++) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $id[$i]; ?>
                                </td>
                                <td>
                                    <?php echo $title[$i] ?>
                                </td>
                                <td><img width="80" height="80" src="../../images/<?php echo $thumnail[$i] ?>"></td>
                                <td>
                                    <?php echo $description[$i] ?>
                                </td>
                                <td class="">Dài quá ko show ra đâu</td>
                                <td><a href="/pig_shop/admin/blogs/xoablog.php?idhang=<?php echo $id[$i] ?>"><button class="btn btn-danger">Xoá</button></td>
                                <td><a href="/pig_shop/admin/blogs/suasp1.php?idhang=<?php echo $id[$i] ?>"><button class="btn btn-success">Sưả</button></td>

                            </tr>
                            <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>