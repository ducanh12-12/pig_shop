<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gấu Bông Lợn Hồng Giá Rẻ</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
</head>
<script>
</script>
<?php include('slug.php') ?>

<body>
    <?php include("header.php") ?>
    <?php include("components/home/Banner.php") ?>
    <div class="container">
        <?php include("components/home/Category.php") ?>
        <?php
        $search = isset($_REQUEST['title']) ? $_REQUEST['title'] : '';
        $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
        mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
        $sql = "Select * from `categories`";
        $result = mysqli_query($conn, $sql);
        $tong_bg = mysqli_num_rows($result);
        $stt = 0;
        while ($categories = mysqli_fetch_object($result)) {

            $stt++;
            $id[$stt] = $categories->id;
            $title[$stt] = $categories->title;
            $slug[$stt] = $categories->slug;
        }
        ?>
        <?php
        for ($i = 1; $i <= $tong_bg; $i++) {
            ?>
            <?php include("components/home/list/Item.php") ?>
        <?php } ?>
    </div>
    <?php include("footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
</body>

</html>