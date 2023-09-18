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
    <div>
        <h2 class="uppercase text-prim text-[1.5rem] mt-8 font-[900] pb-3 mb-3 border-b border-[#02c4c1] text-center">
            Lợn Hồng
            Hottrend</h2>
        <div class="grid grid-cols-4 ">
            <?php
            $arr = [
                [
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/07/gau-bong-teddy-monpink-500x500.jpg',
                    'title' => 'Gấu Bông Teddy MonPink',
                    'sizes' => [
                        [
                            'size' => '40cm',
                            'price' => '195.000đ'
                        ],
                        [
                            'size' => '90cm',
                            'price' => '295.000đ'
                        ],
                        [
                            'size' => '110cm',
                            'price' => '395.000đ'
                        ],
                    ]
                ],
                [
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/07/gau-bong-teddy-monpink-500x500.jpg',
                    'title' => 'Gấu Bông Teddy MonPink 1',
                    'sizes' => [
                        [
                            'size' => '40cm',
                            'price' => '195.000đ'
                        ],
                        [
                            'size' => '90cm',
                            'price' => '295.000đ'
                        ],
                        [
                            'size' => '110cm',
                            'price' => '395.000đ'
                        ],
                    ]
                ],
                [
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/07/gau-bong-teddy-monpink-500x500.jpg',
                    'title' => 'Gấu Bông Teddy MonPink 2',
                    'sizes' => [
                        [
                            'size' => '40cm',
                            'price' => '195.000đ'
                        ],
                        [
                            'size' => '90cm',
                            'price' => '295.000đ'
                        ],
                        [
                            'size' => '110cm',
                            'price' => '395.000đ'
                        ],
                    ]
                ],
                [
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/07/gau-bong-teddy-monpink-500x500.jpg',
                    'title' => 'Gấu Bông Teddy MonPink 3',
                    'sizes' => [
                        [
                            'size' => '40cm',
                            'price' => '195.000đ'
                        ],
                        [
                            'size' => '90cm',
                            'price' => '295.000đ'
                        ],
                        [
                            'size' => '110cm',
                            'price' => '395.000đ'
                        ],
                    ]
                ]
            ];
            foreach ($arr as $item) {
                ?>
                <div class="px-[0.935rem]">
                    <div class="flex flex-col item-product text-center items-center rounded-[10px]">
                        <img class="w-full object-cover rounded-t-[10px] h-[60%]" src="<?php echo $item['avatar'] ?>" />
                        <h4 class="text-base my-2 font-semibold">
                            <?php echo $item['title'] ?>
                        </h4>
                        <p class="<?php echo khongdau($item['title']) ?> price mb-2 text-prim font-semibold">
                            <?php echo $item['sizes'][0]['price'] ?>
                        </p>
                        <div class="list-btn-<?php echo khongdau($item['title']) ?>  pt-2 pb-4"
                            class="w-full px-3 py-2 mb-2 items-center justify-center flex gap-2">
                            <?php foreach ($item['sizes'] as $size) { ?>
                                <button
                                    onclick="handleSelectPrice('<?php echo khongdau($item['title']) ?>', '<?php echo $size['price'] ?>','<?php echo 'btn-' . khongdau($item['title']) . $size['size'] ?>')"
                                    class="btn-<?php echo khongdau($item['title']) . $size['size'] ?> btn border btn-sm !border-[#ff6683] p-1 rounded-[5px]">
                                    <?php echo $size['size'] ?>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<script>
    function handleSelectPrice(value, price, buttonId) {
        const textPrice =document.querySelector(`.${value}`);
        const button = document.querySelector(`.${buttonId}`);
        const listButton = document.querySelectorAll(`.list-btn-${value} button`);
        listButton.forEach((item) => {
            item.classList.remove('active');
        })
        button.classList.add('active');
        textPrice.innerHTML = price;
    }
</script>

</html>