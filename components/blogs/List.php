<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
$sql = "Select * from `blogs`";
$result = mysqli_query($conn, $sql);
$tong_bg = mysqli_num_rows($result);
$stt = 0;
while ($row = mysqli_fetch_object($result)) {

    $stt++;
    $id[$stt] = $row->id;
    $title[$stt] = $row->title;
    $description[$stt] = $row->description;
    $thumnail[$stt] = $row->thumnail;
    $created_at[$stt] = $row->created_at;
}
?>

<body>
    <?php
    for ($i = 1; $i <= $tong_bg; $i++) { ?>
        <a href="detail.php/?id=<?php echo $id[$i] ?> " class="grid grid-cols-12 gap-2 py-3 border-b border-gray-200">
            <img src="../images/<?php echo $thumnail[$i] ?>" class="col-span-2 w-full object-cover" />
            <div class="col-span-10" >
                <p class="font-bold text-[1.25rem]">
                    <?php echo $title[$i] ?>
                </p>
                <span class="text-gray-400 text-[1rem]">
                    <?php $created = new DateTime($created_at[$i]);
                    echo $created->format('Y-m-d H:i:s') ?>
                </span>
                <p class="">
                    <?php echo $description[$i] ?>
                </p>
            </div>
        </a>
    <?php } ?>
</body>

</html>