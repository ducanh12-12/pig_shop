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
    <div class="w-full p-6">
        <div class="card">
            <div class="card-body">
                Quản lí sản phẩm
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between items-center gap-10">
                    <form class=" flex min-w-[500px] gap-2 items-center" method="post"
                        action="dssp.php?srearch=<?php isset($_REQUEST['title']) ? $_REQUEST['title'] : '' ?>"
                        enctype="multipart/form-data">
                        <input class="form-control" type="search"
                            value="<?php isset($_REQUEST['title']) ? $_REQUEST['title'] : '' ?>" name="title"
                            placeholder="Nhập từ khóa tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success text-base w-[200px]" type="submit">Tìm kiếm</button>
                    </form>
                    <a class="!no-underline" style="color: white !important;"
                        href="/pig_shop/admin/product/themsp.php"><button class="btn btn-primary">Thêm sản phẩm
                        </button></a>
                </div>
                <?php
                $search = isset($_REQUEST['title']) ? $_REQUEST['title'] : '';
                $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
                mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
                $sql = "Select * from `pigs` where title like '$search%'";
                $result = mysqli_query($conn, $sql);
                $tong_bg = mysqli_num_rows($result);
                $stt = 0;
                while ($row = mysqli_fetch_object($result)) {

                    $stt++;
                    $id[$stt] = $row->id;
                    $title[$stt] = $row->title;
                    $avatar[$stt] = $row->avatar;
                    $description[$stt] = $row->description;
                    $category_id[$stt] = $row->category_id;
                    $size[$stt] = $row->size;
                    $price[$stt] = $row->price;

                }
                ?>
                <table class="table table-border mt-3 table-hover" width="600" border="1">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Mô tả sản phẩm</th>
                            <th scope="col">ID danh mục</th>
                            <th scope="col">Size sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
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
                                <td><img width="80" height="80" src="../../images/<?php echo $avatar[$i] ?>"></td>
                                <td>
                                    <?php echo $description[$i] ?>
                                </td>
                                <td>
                                    <?php echo $category_id[$i] ?>
                                </td>
                                <td>
                                    <?php echo $size[$i] ?>
                                </td>
                                <td>
                                    <?php echo $price[$i] ?>
                                </td>

                                <td><a href="/pig_shop/admin/product/xoasp.php?idhang=<?php echo $id[$i] ?>"> <button
                                            class="btn btn-danger">Xoá</button></a></td>
                                <td><a href="/pig_shop/admin/product/suasp1.php?idhang=<?php echo $id[$i] ?>"><button
                                            class="btn btn-success">Sưả</button></td>
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