<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gấu Bông Lợn Hồng Giá Rẻ</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<script>
</script>
<?php include('slug.php') ?>

<body>
    <?php include("header.php") ?>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div class="rounded-md w-4 h-4 mr-5 bg-green-400" ></div>
                <strong class="me-auto">Thành công</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Cảm ơn bạn đã đặt hàng thành công. <br>
              Chúng tôi sẽ liên hệ để xác nhận đơn hàng với bạn !
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        $id = $_REQUEST['id'];
        $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
        mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
        $sql = "Select * from `pigs` where `id` = $id";
        $qr = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($qr);
        $rows['price'] = 1000;
        $rows['size'] = 100;
        $content = str_replace('&', '&', $rows['content']);
        ?>
        <div class="flex my-5">
            <img class="w-1/2 object-cover" src="./images/<?php echo $rows['avatar'] ?>" />
            <div class="flex flex-col p-6">
                <h1 class="font-bold text-[1.5rem]">
                    <?php echo $rows['title'] ?>
                </h1>
                <p class="font-bold text-[#02c4c1] text-[1.5rem]">
                    <?php echo $rows['price'] ?> đ
                </p>
                <p class=" text-[1rem]">
                    <?php echo $rows['size'] ?> cm
                </p>
                <button data-bs-toggle="modal" data-bs-target="#<?php echo 'item_' . $rows['id'] ?>"
                    class="btn btn-lg mb-3 w-full !text-white !bg-[#ff6683]" type="submit">Mua
                    hàng</button>
                <div class="grid grid-cols-2 gap-3">
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>100% bông trắng tinh khiết
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>100% ảnh chụp tại shop</div>
                    </div>
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>Bảo hành đường chỉ trọn đời
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>Bảo hành Bông gấu 6 tháng</div>
                    </div>
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>Miễn phí Gói quà </div>
                    </div>
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>Miễn phí Tặng thiệp </div>
                    </div>
                    <div class="w-full">
                        <div class="reason"><i class="ion-checkmark"></i>Miễn phí Nén chân không gấu
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="border-b-[2px] mb-4 border-[#EEE]">
                <div class="border-b-[4px] inline-block border-[#02c4c1]">
                    Thông tin sản phẩm
                </div>
            </div>
            <div>
                <?php echo $rows['content'] ?>
            </div>
        </div>
        <?php include('components/cart/Model.php') ?>
        <?php ?>
    </div>
    <?php include("footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
    <script>
        let queryParams = new URLSearchParams(window.location.search);
        if (queryParams.get('cart') == 'success') {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            })
            toastList.forEach(toast => toast.show())
        }
    </script>
</body>

</html>