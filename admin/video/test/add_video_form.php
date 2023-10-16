<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<form action="add_video_conn.php" method="post">
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
            <input type="text" class="form-control" id="txt_title" name="txt_title">
          </div>
          <div class="mb-3">
            <label for="">Đường dẫn (link):</label>
            <input type="text" class="form-control" id="txt_links" name="txt_links">
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