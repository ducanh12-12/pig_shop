<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon-block/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<?php
$conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ"); //tạo kết nối với servers
mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
$sql = "Select * from `categories`";
$result = mysqli_query($conn, $sql);
$tong_bg = mysqli_num_rows($result);
$stt = 0;
while ($row = mysqli_fetch_object($result)) {

	$stt++;
	$idCate[$stt] = $row->id;
	$titleCate[$stt] = $row->title;
}
$id = $_REQUEST['idhang'];
$conn = mysqli_connect("localhost", "root", "") or die("Khong connect duoc voi may chu");
mysqli_select_db($conn, "pig_shop") or die("Khong tim thay co so du lieu");
$sql = "SELECT * from pigs where id = $id";
$qr = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($qr);
$content = str_replace('&', '&', $rows['content']);
?>

<body class="flex">
	<div class="flex-grow-1 flex">
		<form name="them_sp" class="w-[1200px] mx-auto my-auto p-6 border border-gray-400  needs-validation" novalidate method="post" action="suasp.php?idhang=<?php echo $id ?>" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="title" class="form-label">Tên sản phẩm</label>
				<input class="form-control" name="title" value="<?php echo $rows['title'] ?>" id="title" aria-describedby="" required>
				<div class="invalid-feedback">
				Vui lòng nhập thông tin.
			</div>
  			</div>
			<div class="mb-3">
				<label for="avatar" class="form-label">Ảnh sản phẩm</label>
				<input type="file" class="form-control" name="avatar" required>
				<div class="invalid-feedback">
				Vui lòng nhập thông tin.
			</div>
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Mô tả sản phảm</label>
				<input class="form-control" name="description" id="description" aria-describedby="">
				
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">Nội dung</label>
				<textarea id="content" onchange="getData()" name="content"><?php echo $content ?></textarea>
			</div>
			<div class="mb-3">
				<label for="size" class="form-label">Size sản phẩm</label>
				<input class="form-control" name="size" id="size" aria-describedby="" required>
				<div class="invalid-feedback">
				Vui lòng nhập thông tin.
			</div>
			</div>
			<div class="mb-3">
				<label for="price" class="form-label">Giá sản phảm</label>
				<input class="form-control" name="price" id="price" aria-describedby="" required>
				<div class="invalid-feedback">
				Vui lòng nhập thông tin.
			</div>
			</div>
			<div class="mb-3">
				<label for="category_id" class="form-label">ID danh muc</label>
				<select name="category_id" id="cars" class="form-control">
					<?php
					for ($i = 1; $i <= $tong_bg; $i++) {
					?>
						<option <?php echo $rows['category_id'] === $idCate[$i] ? 'selected' : '' ?> value="<?php echo $idCate[$i] ?>"><?php echo $titleCate[$i] ?></option><?php } ?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
			<a href="\pig_shop\admin\product">Xem danh sản phẩm</a>
		</form>
	</div>
</body>
<script>
	(function() {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function(form) {
				form.addEventListener('submit', function(event) {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
	})()

	ClassicEditor.create(document.getElementById("content"), {
		// https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
		toolbar: {
			items: [
				'exportPDF', 'exportWord', '|',
				'findAndReplace', 'selectAll', '|',
				'heading', '|',
				'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
				'bulletedList', 'numberedList', 'todoList', '|',
				'outdent', 'indent', '|',
				'undo', 'redo',
				'-',
				'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
				'alignment', '|',
				'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
				'specialCharacters', 'horizontalLine', 'pageBreak', '|',
				'textPartLanguage', '|',
				'sourceEditing'
			],
			shouldNotGroupWhenFull: true
		},
		// Changing the language of the interface requires loading the language file using the <script> tag.
		// language: 'es',
		list: {
			properties: {
				styles: true,
				startIndex: true,
				reversed: true
			}
		},
		// https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
		heading: {
			options: [{
					model: 'paragraph',
					title: 'Paragraph',
					class: 'ck-heading_paragraph'
				},
				{
					model: 'heading1',
					view: 'h1',
					title: 'Heading 1',
					class: 'ck-heading_heading1'
				},
				{
					model: 'heading2',
					view: 'h2',
					title: 'Heading 2',
					class: 'ck-heading_heading2'
				},
				{
					model: 'heading3',
					view: 'h3',
					title: 'Heading 3',
					class: 'ck-heading_heading3'
				},
				{
					model: 'heading4',
					view: 'h4',
					title: 'Heading 4',
					class: 'ck-heading_heading4'
				},
				{
					model: 'heading5',
					view: 'h5',
					title: 'Heading 5',
					class: 'ck-heading_heading5'
				},
				{
					model: 'heading6',
					view: 'h6',
					title: 'Heading 6',
					class: 'ck-heading_heading6'
				}
			]
		},
		// https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
		placeholder: 'Welcome to CKEditor&nbsp;5!',
		// https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
		fontFamily: {
			options: [
				'default',
				'Arial, Helvetica, sans-serif',
				'Courier New, Courier, monospace',
				'Georgia, serif',
				'Lucida Sans Unicode, Lucida Grande, sans-serif',
				'Tahoma, Geneva, sans-serif',
				'Times New Roman, Times, serif',
				'Trebuchet MS, Helvetica, sans-serif',
				'Verdana, Geneva, sans-serif'
			],
			supportAllValues: true
		},
		// https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
		fontSize: {
			options: [10, 12, 14, 'default', 18, 20, 22],
			supportAllValues: true
		},
		// Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
		// https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
		htmlSupport: {
			allow: [{
				name: /.*/,
				attributes: true,
				classes: true,
				styles: true
			}]
		},
		// Be careful with enabling previews
		// https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
		htmlEmbed: {
			showPreviews: true
		},
		// https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
		link: {
			decorators: {
				addTargetToExternalLinks: true,
				defaultProtocol: 'https://',
				toggleDownloadable: {
					mode: 'manual',
					label: 'Downloadable',
					attributes: {
						download: 'file'
					}
				}
			}
		},
		// https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
		mention: {
			feeds: [{
				marker: '@',
				feed: [
					'@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
					'@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
					'@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
					'@sugar', '@sweet', '@topping', '@wafer'
				],
				minimumCharacters: 1
			}]
		},
		// The "super-build" contains more premium features that require additional configuration, disable them below.
		// Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
		removePlugins: [
			// These two are commercial, but you can try them out without registering to a trial.
			// 'ExportPdf',
			// 'ExportWord',
			'CKBox',
			'CKFinder',
			'EasyImage',
			// This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
			// https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
			// Storing images as Base64 is usually a very bad idea.
			// Replace it on production pig_shopsite with other solutions:
			// https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
			// 'Base64UploadAdapter',
			'RealTimeCollaborativeComments',
			'RealTimeCollaborativeTrackChanges',
			'RealTimeCollaborativeRevisionHistory',
			'PresenceList',
			'Comments',
			'TrackChanges',
			'TrackChangesData',
			'RevisionHistory',
			'Pagination',
			'WProofreader',
			// Careful, with the Mathtype plugin CKEditor will not load when loading this sample
			// from a local file system (file://) - load this site via HTTP server if you enable MathType.
			'MathType',
			// The following features are part of the Productivity Pack and require additional license.
			'SlashCommand',
			'Template',
			'DocumentOutline',
			'FormatPainter',
			'TableOfContents',
			'PasteFromOfficeEnhanced'
		]
	});
</script>
</body>

</html>