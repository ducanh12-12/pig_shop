<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="display: flex;">
<?php include("../navbar.php") ?>
<div>
    <div class="button"><button><a href="/chichi/admin/product/themsp.php">Thêm sản phẩm</a></button></div>
    <?php
        $conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");
        mysqli_select_db($conn,"web") or die ("Không tìm thấy CSDL");
        $sql="Select * from `pigs`";
        $result=mysqli_query($conn,$sql);
        $tong_bg=mysqli_num_rows($result);
        $stt=0;
    while($row=mysqli_fetch_object($result))
    {
    
        $stt++;
        $id[$stt]=$row->id;
        $title[$stt]=$row->title;
        $image[$stt]=$row->image;
        $description[$stt]=$row->description;
    }
    ?>	
    <table class="table" width="600" border="1">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Description</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
                for ($i = 1; $i <= $tong_bg; $i++) {
                ?>
                    <tr>
                        <td><?php echo $id[$i]; ?></td>
                        <td><?php echo $title[$i] ?></td>
                        <td><img width="80" height="80" src="../../images/<?php echo $image[$i] ?>"></td>
                        <td><?php echo $description[$i] ?></td>
                        <td><a href="/chichi/admin/product/xoasp.php?idhang=<?php echo $id[$i] ?>"> Xoá</td>
                        <td><a href="/chichi/admin/product/suasp1.php?idhang=<?php echo $id[$i] ?>">Sửa</td>
    
                    </tr>
                <?php
                }
                ?>
    </table>
</div>
</body>
</html>