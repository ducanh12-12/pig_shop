<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="../css/dssp.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon/ckeditor.js"></script> -->
	<?php
	$title = "";
	if (isset($_POST["form_add_categories"])) {
		$title = $_POST["title"];
		$slug = $_POST["slug"];
	}
	if ($title != "" ) {
		$conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ"); //tạo kết nối với servers
		mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
		$sql = "INSERT INTO `categories` ( `title`,`slug`) VALUES ( '$title', '$slug')";

		mysqli_query($conn, $sql);
		header('location:http://localhost/pig_shop/admin/categories');
	}
	?>
</head>

<body class="flex">
	<?php include("../navbar.php") ?>

	<div class="flex-grow-1 flex">
		<form name="them_categories" class="w-[1200px] mx-auto my-auto p-6 border border-gray-400" method="post"
			action="themcategories.php" enctype="multipart/form-data">
			<input type="hidden" name="form_add_categories" value="1">
			<div class="mb-3">
				<label for="title" class="form-label">Tiêu đề danh mục</label>
				<input class="form-control" name="title" id="title" oninput="setSlug()" aria-describedby="">
			</div>
			<div class="mb-3">
				<label for="" class="form-label">Đường dẫn danh mục</label>
				<input readonly class="form-control" name="slug" id="slug" aria-describedby="">
			</div>
			<button type="submit" class="btn btn-primary">Thêm danh mục</button>
			<a href="\pig_shop\admin\categories">Xem danh sách danh mục</a>
		</form>
	</div>
<script>
	function setSlug() {
		const title=document.querySelector('#title');
		const slug=document.querySelector('#slug');
		slug.value=slugify(title.value);

	}
	function slugify(text) {
    // Đổi chữ hoa thành chữ thường
    let slug = text.toLowerCase();

    // Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    // Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    // Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, '_');
    // Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    // Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '_');
    slug = slug.replace(/\-\-\-\-/gi, '_');
    slug = slug.replace(/\-\-\-/gi, '_');
    slug = slug.replace(/\-\-/gi, '_');
    // Xóa các ký tự gạch ngang ở đầu và cuối
    slug = `@${slug}@`;
    slug = slug.replace(/\@\-|\-\@|\@/gi, '').replace(/--/gi, '_');
    return slug;
}
</script>
</html>