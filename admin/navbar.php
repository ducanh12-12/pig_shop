<?php
session_start(); 

if (isset($_SESSION['currentUserRole'])) {
    $currentUserRole = $_SESSION['currentUserRole'];
} else {
	header("Location: http://localhost/pig_shop/admin/user/login_admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class=" min-h-screen px-6 flex-shrink-0" style="background-image: url(../../images/bg.jpg);">
        <div class="site-logo px-2 my-3">
            <a href="/pig_shop" class="flex !no-underline" rel="home">
                <span class="d-none d-md-block text-[1.2rem] decoration-none text-black font-[900] ml-2">Lợn Hồng Online</span>
            </a>
        </div>
        <ul class="navbar-menu flex flex-col p-0 font-bold text-lg">
        <!-- Kiểm tra và hiển thị mục quản lý người dùng dựa trên vai trò -->
        <?php 
        if ($currentUserRole === 'is_super_admin') { 
        ?>
				<li class="nav-item">
					<a href="/pig_shop/admin/admin" class="!text-white block py-2 !no-underline">Trang chủ</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/user/list_user.php" class="!text-white block py-2 !no-underline">Quản lý người dùng</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/blogs" class="!text-white block py-2 !no-underline">Quản lí bài viết</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/product/dssp.php" class="!text-white block py-2 !no-underline">Quản lí sản phẩm</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/categories" class="!text-white block py-2 !no-underline">Quản lí danh mục</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/video/list_video.php" class="!text-white block py-2 !no-underline">Quản lí video</a>
				</li>
			<?php 
			} 
			elseif ($currentUserRole === 'is_admin') 
			{
			?>
				<li class="nav-item">
					<a href="/pig_shop/admin/admin" class="!text-white block py-2 !no-underline">Trang chủ</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/user/list_qtv.php" class="!text-white block py-2 !no-underline">Danh sách người dùng</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/product/dssp.php" class="!text-white block py-2 !no-underline">Quản lí lợn hồng</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/categories" class="!text-white block py-2 !no-underline">Quản lí danh mục</a>
				</li>
				<li class="nav-item">
					<a href="/pig_shop/admin/blogs" class="!text-white block py-2 !no-underline">Quản lí bài viết</a>
				</li>
				<li class="nav-item">
					<a href="video/list_video.php" class="!text-white block py-2 !no-underline">Quản lí video</a>
				</li>
			<?php
			} 
			?>
		</ul>
	</div>
</body>

</html>
