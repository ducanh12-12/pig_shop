<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="display: flex;">
<?php include("../navbar.php") ?>
<div class="flex-grow-1 p-6">
    <div class="button flex justify-end"><button class="btn btn-primary"><a style="color: white !important;" href="/pig_shop/admin/categories/themcategories.php">Thêm danh mục</a></button></div>
    <?php
        $conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
        mysqli_select_db($conn,"pig_shop") or die ("Không tìm thấy CSDL");
        $sql="Select * from `categories`";
        $result=mysqli_query($conn,$sql);
        $tong_bg=mysqli_num_rows($result);
        $stt=0;
    while($row=mysqli_fetch_object($result))
    {
    
        $stt++;
        $id[$stt]=$row->id;
        $title[$stt]=$row->title;
        $slug[$stt]=$row->slug;
    }
    ?>	
    <table class="table table-border table-hover" width="600" border="1">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tiêu đề</th>
          <th scope="col">Đường dẫn</th>
          <th scope="col"></th>
          <th scope="col"></th>
          
        </tr>
      </thead>
      <tbody>
      <?php
                for ($i = 1; $i <= $tong_bg; $i++) {
                ?>
                    <tr>
                        <td><?php echo $id[$i]; ?></td>
                        <td><?php echo $title[$i] ?></td>
                        <td><?php echo $slug[$i] ?></td>
                        <td><a href="/pig_shop/admin/categories/xoacategories.php?idhang=<?php echo $id[$i] ?>"> Xoá</td>
                        <td><a href="/pig_shop/admin/categories/suacategories1.php?idhang=<?php echo $id[$i] ?>">Sửa</td>
                        
    
                    </tr>
                <?php
                }
                ?>
    </table>
</div>
</body>
</html>