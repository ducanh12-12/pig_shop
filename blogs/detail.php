<!DOCTYPE html>
<html lang="en">
</head>
<?php
$id = $_REQUEST['id'];
$conn = mysqli_connect("localhost", "root", "") or die("Khong connect duoc voi may chu");
mysqli_select_db($conn, "pig_shop") or die("Khong tim thay co so du lieu");
$sql = "SELECT * from blogs where id = $id";
$qr = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($qr);
$content = str_replace('&', '&', $rows['content']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>
        <?php echo $rows['title'] ?>
    </title>
    <style>
        h2 {
            font-size: 2rem !important;
        }
    </style>
</head>
<body>
    <?php include("../header.php") ?>
    <div class="container my-2">
        <p class="text-[1.5rem] mb-3" >
            <?php echo $rows['title'] ?>
        </p>
        <span class="text-gray-400 text-[1rem] mb-3">
            <?php $created = new DateTime($rows['created_at']);
            echo $created->format('Y-m-d | H:i') ?>
        </span>
        <span class="text-[#000080] block" >
            <?php echo $rows['description'] ?>
        </span>
        <div class="ck-blurred ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline" >
            <?php echo  str_replace( '&', '&', $rows['content'])?>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>

</html>