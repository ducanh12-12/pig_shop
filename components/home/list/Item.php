<!DOCTYPE html>
<html lang="en">
<style>
    .item-product {
        box-shadow: 0 0.3125rem 0.625rem rgba(0, 0, 0, 0.2);
        transition: all 0.5s ease 0s;
        cursor: pointer;
    }

    h4 {
        transition: all 0.5s ease 0s;
    }

    .item-product:hover {
        box-shadow: 0 0.625rem 1.875rem rgba(0, 0, 0, 0.4);
    }

    .item-product:hover h4 {
        color: #02c4c1;
    }

    .active {
        background-color: #ff6683 !important;
        color: white !important;
    }
</style>

<body>
    <div class="container ">
        <h2 class="uppercase text-prim text-[1.5rem] mt-8 font-[900] pb-3 mb-3 border-b border-[#02c4c1] text-center">
            <?php echo $title[$i] ?>
        </h2>
        <div class="grid grid-cols-4 ">
            <div >
                <?php
                $conn = mysqli_connect("localhost", "root", "") or die("Không connect đc với máy chủ");
                mysqli_select_db($conn, "pig_shop") or die("Không tìm thấy CSDL");
                $sql = "Select * from `pigs` where category_id = '$id[$i]'";
                $result = mysqli_query($conn, $sql);
                $tong_bg = mysqli_num_rows($result);
                $stt = 0;
                $arrItem = [];
                while ($row = mysqli_fetch_object($result)) {
                    $stt++;
                    $arrItem[$stt]['id'] = $row->id;
                    $arrItem[$stt]['title'] = $row->title;
                    $arrItem[$stt]['avatar'] = $row->avatar;
                    $arrItem[$stt]['description'] = $row->description;
                }
                foreach ($arrItem as $item) {
                    ?>
                    <div class="px-[0.935rem] max-w-[270px] max-h-[370px]">
                        <a href="/pig_shop/detail.php?id=<?php echo $item['id'] ?>"
                            class="flex flex-col w-full h-full item-product text-center items-center rounded-[10px]">
                            <img class="w-full object-cover rounded-t-[10px] h-[70%]"
                                src="./images/<?php echo $item['avatar'] ?>" />
                            <h4 class="text-base my-2 font-semibold">
                                <?php echo $item['title'] ?>
                            </h4>
                            <p class="<?php echo khongdau($item['title']) ?> price mb-2 text-prim font-semibold">
                                <?php echo 10000 ?>
                            </p>
                            <div class="list-btn-<?php echo khongdau($item['title']) ?>  pt-2 pb-4"
                                class="w-full px-3 py-2 mb-2 items-center justify-center flex gap-2">
    
                            </div>
                        </a>
                        <?php include('components/cart/Model.php') ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    function handleSelectPrice(value, price, buttonId) {
        const textPrice = document.querySelector(`.${value}`);
        const button = document.querySelector(`.${buttonId}`);
        const listButton = document.querySelectorAll(`.list-btn-${value} button`);
        listButton.forEach((item) => {
            item.classList.remove('active');
        })
        button.classList.add('active');
        textPrice.innerHTML = price;
    }
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

</html>