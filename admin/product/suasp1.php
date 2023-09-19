<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<?php 
	$id = $_REQUEST['idhang'];
	$conn =mysqli_connect("localhost","root","") or die ("Khong connect duoc voi may chu");
    mysqli_select_db($conn ,"web") or die ("Khong tim thay co so du lieu");
	$sql = "SELECT * from pigs where id = $id";
	$qr = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_array($qr);
	?>
<form name ="frm_nhap" action ="suasp.php"  method="post">
<table width ="wrap" border="1" align="center">
        <body>
        <tr>
            <td colspan="5" align="center">SỬA SẢN PHẨM</td>
        
        </tr>
        <tr>
            <td>id</td>    
            <td>title</td>
            <td>image</td>
            <td>description</td>
        </tr>
        <tr>
            
            <td><input type="bidint"  name= "txtid" value="<?php echo $rows['id']?>"></td>
            <td><input type="text"  name= "txttitle" value="<?php echo $rows['title']?>"></td>
            <td><input type="text" name= "txtimage" value="<?php echo $rows['image']?>"></td>
            <td><input type="text" name= "txtdescription "value="<?php echo $rows['description']?>"></td>
            
        </tr>
        <tr>
           <td colspan="4" align="center"><input type ="submit" name= "sửa" value="Sửa"></td> 
        </tr>
        </body>
    </table>  
</form>
</body>
</html>