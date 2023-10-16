<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
<style>
    .container {
        max-width: 1200px;
    }
</style>

<body>
    <div class="container px-0 py-3 flex justify-between items-center">
        <div class="site-logo">
            <a href="/" class="flex" rel="home">
                <img loading="lazy" class="max-w-[3.125rem] object-cover" src="https://gaubongonline.vn/wp-content/uploads/2022/04/GBO_Original-120x80-1.png"
                    alt="Gấu Bông Online">
                <span class="d-none d-md-block text-[1.5rem] text-[#fdafbc] font-[900] ml-2">Lợn Hồng Online</span>
            </a>
        </div>
        <div class="input-group" style="width: 25rem;">
            <input type="text" class="form-control" placeholder="Tìm kiếm" />
            <button class="btn btn-outline-secondary" type="button">Button</button>
        </div>
        <div class="text-xl font-bold text-[#fdafbc]">
            039.3214.111
        </div>
    </div>
    <div class="bg-[#fdafbc] text-white font-lg">
        <?php $menu = [
            [
                "title" => "TRANG CHỦ",
                "link" => "/pig_shop",
            ],
            [
                "title" => "BỘ SƯU TẬP LỢN HỒNG",
                "link" => "/admin",
            ],
            [
                "title" => "BÀI VIẾT",
                "link" => "/pig_shop/blogs/list.php",
                "link" => "/admin",
            ],
            [
                "title" => "HÀNG MỚI VỀ",
                "link" => "/admin",
            ],
            [
                "title" => "QUẢN TRỊ",
                "link" => "/pig_shop/admin/user/login_admin.php",
            ],
            [
                "title" => "ĐĂNG NHẬP",
                "link" => "/pig_shop/admin/user/login.php",
            ],
        ] ?>
        <ul class="nav nav-tabs container py-2 justify-between">
            <?php foreach ($menu as $item) { ?>
                <li class="nav-item">
                    <a class="cursor-pointer !text-white" href="<?php echo $item['link'] ?>">
                    <?php echo $item['title'] ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>

</html>