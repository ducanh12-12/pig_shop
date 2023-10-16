<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gấu Bông Lợn Hồng Giá Rẻ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
</head>
<script>
</script>
<?php include('slug.php') ?>

<body>
    <?php include("header.php") ?>
    <?php include("components/home/Banner.php") ?>
    <div class="container">
        <?php include("components/home/Category.php") ?>
        <?php include("components/home/list/Item.php") ?>
        <?php include("components/home/list/Item.php") ?>
        <?php include("components/home/list/Item.php") ?>
        <?php include("components/home/list/Item.php") ?>
		<?php include("admin/video/view_video.php")?>
		</br>
		<div class="container mt-3" align="center" >
			<button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Xem thêm</button>
		</div> 
		</br>
    </div>
    <?php include("footer.php") ?>
</body>

</html>
