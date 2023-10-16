<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<body>
	<?php
	$id=$_REQUEST["id"];
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
	//Chọn CSDL để làm việc
	mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
	//Tạo câu truy vấn
	$sql="Select * from `videos` WHERE `videos`.`id` = $id";
	$result_se=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result_se);
	$id=$row->id;
	$title=$row->title;
	$links=$row->links;
	?>
<form action="edit_video_connect.php?id=<?php echo $id ?>" method="post">
<div class="modal fade" id="videoaddModal" tabindex="-1" aria-labelledby="videoaddModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="add_video">
        <div class="modal-body">
          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger error" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
          <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success sucess" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
          <?php } ?>
          <div class="mb-3">
            <label for="">Tiêu đề:</label>
            <input type="text" class="form-control" id="txt_title" name="txt_title" value="<?php echo $title?>">
          </div>
          <div class="mb-3">
            <label for="">Đường dẫn (link):</label>
            <input type="text" class="form-control" id="txt_links" name="txt_links" value="<?php echo $links?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-success" id="add_video" name="add">Thêm</button>
        </div>
      </form>
    </div>
  </div>
</div>
	</form>
</body>
</html>