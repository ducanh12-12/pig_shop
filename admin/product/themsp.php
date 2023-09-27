<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="../css/dssp.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon/ckeditor.js"></script>
	<?php
$title = "";
if (isset($_POST["form_add_product"])) {
	$title = $_POST["title"];
	$description = $_POST["description"];
}
if ($title != "" && $description != "") {
	$uploadDir_img = "../../images/";

	$file_tmp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : "";
	$file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : "";
	$file_type = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : "";
	$file_size = isset($_FILES['image']['size']) ? $_FILES['image']['size'] : "";
	$file_error = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "";

	$dmyhis = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s"); ///Lay gio cua he thong
	$file__name__ = $dmyhis . $file_name;
	copy($file_tmp, $uploadDir_img . $file__name__);
	$link = $file__name__;

	$conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ"); //tạo kết nối với servers
	mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");

	$sql = "INSERT INTO `pigs` (`image`, `title`, `description`) VALUES ('$link', '$title', '$description')";
	mysqli_query($conn, $sql);
	header('location:http://localhost/pig_shop/admin/product/dssp.php');
}
?>
</head>
<body class="flex">
	<?php include("../navbar.php") ?>
		<form name="them_sp" class="w-[1200px] mx-auto my-auto p-6 border border-gray-400" method="post"
			action="themsp.php" enctype="multipart/form-data">
			<input type="hidden" name="form_add_sp" value="1">
			<div class="mb-3">
				<label for="title" class="form-label">Tên sản phẩm</label>
				<input class="form-control" name="title" id="title" aria-describedby="">
			</div>
			<div class="mb-3">
				<label for="avatar" class="form-label">Ảnh sản phẩm</label>
				<input type="file" class="form-control" name="image">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Mô sản phẩm</label>
				<input class="form-control" name="description" id="description" aria-describedby="">
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">Nội dung</label>
				<textarea id="content" onchange="getData()" name="content"></textarea>
			</div>
			<div class="mb-3">
				<label for="category_id" class="form-label">ID danh mục</label>
				<input class="form-control" name="category_id" id="category_id" aria-describedby="">
			</div>
			<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
			<a href="dssp.php">Xem danh sách sản phẩm</a>
		</form>
	</div>
		
		 <!-- <select class="custom-select" id="inputGroupSelect01">
	

		<option selected>Choose...</option>
			<option value="</option>
			<option value="2">Two</option>
			<option value="3">Three</option>
		</select> -->
</body>
<script>
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
			options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
				{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
				{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
				{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
				{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
			]
		},
		// https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
		placeholder: 'Nhập nội dung',
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
			allow: [
				{
					name: /.*/,
					attributes: true,
					classes: true,
					styles: true
				}
			]
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
			feeds: [
				{
					marker: '@',
					feed: [
						'@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
						'@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
						'@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
						'@sugar', '@sweet', '@topping', '@wafer'
					],
					minimumCharacters: 1
				}
			]
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

</html>