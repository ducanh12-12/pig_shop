<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>SỬA DANH MỤC</title>
</head>

<body>
  <?php
  $id = $_REQUEST["idhang"];
  $title = $_REQUEST["title"];
  $slug = $_REQUEST["slug"];
  $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
  mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
  //Tạo câu truy vấn
  $sql_update_pigs = "UPDATE categories SET id='$id',title='$title',slug='$slug' WHERE categories . id=$id";
  mysqli_query($conn, $sql_update_pigs);
  header("Location: index.php ")
  ?>
</body>
</html>