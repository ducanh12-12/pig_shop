<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon-block/ckeditor.js"></script>

</head>
	<?php 
	$id = $_REQUEST['idhang'];
	$conn =mysqli_connect("localhost","root","") or die ("Khong connect duoc voi may chu");
    mysqli_select_db($conn ,"pig_shop") or die ("Khong tim thay co so du lieu");
	$sql = "SELECT * from categories where id = $id";
	$qr = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($qr);
   
	?>
<body class="flex">
	<?php include("../navbar.php") ?>
	<div class="flex-grow-1 flex">
		<form name="sua_categories" class="w-[1200px] mx-auto my-auto p-6 border border-gray-400" method="post"
			action="suacategories.php?idhang=<?php echo $id ?>" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="title" class="form-label">Tiêu đề danh mục</label>
				<input class="form-control" name="title" value="<?php echo $rows['title'] ?>" id="title" oninput="setSlug()"  aria-describedby="">
				<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
			</div>
			<div class="mb-3">
				<label for="slug" class="form-label">Đường dẫn danh mục</label>
				<input readonly class="form-control" name="slug" value="<?php echo $rows['slug'] ?>" id="slug" aria-describedby="">
				<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
			</div>
			<button type="submit" class="btn btn-primary">Sửa danh mục</button>
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