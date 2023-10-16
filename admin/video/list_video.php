<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>
<body>
	<?php
		$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
		//Chọn CSDL để làm việc
		mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
		//Tạo câu truy vấn
		$sql="Select * from `videos`";
		$result=mysqli_query($conn,$sql);
		$tong_bg=mysqli_num_rows($result);// đếm số bản ghi
			//echo $tong_bg; die;
		$stt=0;
		while($row=mysqli_fetch_object($result))
		{
			$stt++;
			$id[$stt]=$row->id;
			$title[$stt]=$row->title;
			$link[$stt]=$row->links;
		}
	?>
    <div class="flex" >
        <?php include("../navbar.php") ?>
        <div class="container mt-3">
			<div class="card">
    			<div class="card-body">
					Danh sách video
				</div>
  			</div>
			<br>
			<div class="card">
    			<div class="card-body">
					<form >
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#videoaddModal">Thêm mới</button>
						<?php
						{
						?>
						<div class="modal fade" id="videoaddModal" tabindex="-1" aria-labelledby="videoaddModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Thông tin video</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							  </div>
							  <form action="add_video_connect.php" method="post" id="add_video">
								<div class="modal-body">
								  
								  <div class="mb-3">
									<label for="">Tiêu đề:</label>
									<input type="text" class="form-control" id="txt_title" name="txt_title1" value="">
								  </div>
								  <div class="mb-3">
									<label for="">Đường dẫn (link):</label>
									<input type="text" class="form-control" id="txt_links" name="txt_links1" value="">
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
						<?php
						}
						?>
						<hr>
							<table width="547" border="1" align="center" class="table table-bordered" enctype="multipart/form-data">
								<thead class="table-danger">
									<tr>
										<th class="text-center">STT</th>
										<th class="text-center">Tiêu đề</th>
										<th class="text-center">Link</th>
										<th class="text-center">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<?php
									  for ($i=1;$i<=$tong_bg;$i++)
									  {
								    ?>
									<tr>
										<th class="text-center"><?php echo $i?></th>
										<th class="text-center"><?php echo $title[$i]?></th>
										<th class="text-center"><?php echo $link[$i]?></th>
										<th class="text-center">
											<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editVideoModal<?php echo $id[$i] ?>">Sửa</button>
											<a href="del_video.php?id=<?php echo $id[$i]?>">
												<button  type='button' class='btn btn-danger' name='delete' value='<?php $row[0] ?>'>Xóa</button>
											</a>
										</th>
									</tr>
									<?php
									  }
								    ?>
							</tbody>
						</table>
						
						
						<?php
							for ($i = 1; $i <= $tong_bg; $i++) {
							?>
							<!-- Modal để chỉnh sửa video -->
							<div class="modal fade" id="editVideoModal<?php echo $id[$i] ?>" tabindex="-1" aria-labelledby="editVideoModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa video</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								  </div>
								  <form action="edit_video_connect.php?id=<?php echo $id[$i] ?>" method="post">
									<div class="modal-body">
									  <!-- Nội dung chỉnh sửa video ở đây -->
									  <div class="mb-3">
										<label for="txt_title<?php echo $id[$i] ?>">Tiêu đề:</label>
										<input type="text" class="form-control" id="txt_title<?php echo $id[$i] ?>" name="txt_title" value="<?php echo $title[$i] ?>">
									  </div>
									  <div class="mb-3">
										<label for="txt_links<?php echo $id[$i] ?>">Đường dẫn (link):</label>
										<input type="text" class="form-control" id="txt_links<?php echo $id[$i] ?>" name="txt_links" value="<?php echo $link[$i] ?>">
									  </div>
									</div>
									<div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
									  <button type="submit" class="btn btn-success" name="save">Lưu</button>
									</div>
								  </form>
								</div>
							  </div>
							</div>
							<?php
							}
							?>
					</form>
				</div>
  			</div>
        </div>
    </div>
</body>

</html>