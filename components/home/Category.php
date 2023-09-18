<!DOCTYPE html>
<html lang="en">
<style>
    .image-category:hover {
        scale: 1.23;
    }
</style>
<body>
    <div>
        <h2 class="text-[#ff6683] font-[900] text-[1.5rem] leading-6 text-center my-2">LONHONGNLINE - SHOP LỢN HỒNG ĐẸP
            VÀ CAO CẤP TẠI HÀ NỘI</h2>
        <div class="grid grid-cols-5 items-center mt-3">
            <?php
            $arr = [
                [
                    'title' => 'Giao hàng tận nhà',
                    'link' => '/pig_shop',
                    'image' => 'images/category-1.png'
                ],
                [
                    'title' => 'Bọc quà giá rẻ',
                    'link' => '/pig_shop',
                    'image' => 'images/category-2.png'
                ],
                [
                    'title' => 'Tặng thiệp miễn phí',
                    'link' => '/pig_shop',
                    'image' => 'images/category-3.png'
                ],
                [
                    'title' => 'Giặt lợn hồng',
                    'link' => '/pig_shop',
                    'image' => 'images/category-4.png'
                ],
                [
                    'title' => 'Nén nhỏ lợn',
                    'link' => '/pig_shop',
                    'image' => 'images/category-5.png'
                ]
            ];
            foreach ($arr as $category) {
                ?>
                <div class="flex flex-col items-center justify-center">
                    <img class="w-[60px] h-[60px] object-cover" src="<?php echo $category['image'] ?>" />
                    <p class="uppercase mt-2 my-4 font-semibold">
                        <?php echo $category['title'] ?>
                    </p>
                </div>
            <?php } ?>
        </div>
        <div class="grid grid-cols-3 gap-4">
        <?php
            $arr = [
                [
                    'title' => 'Giao hàng tận nhà',
                    'link' => '/pig_shop',
                    'image' => 'https://gaubongonline.vn/wp-content/uploads/2021/06/gaubong5.png'
                ],
                [
                    'title' => 'Bọc quà giá rẻ',
                    'link' => '/pig_shop',
                    'image' => 'https://gaubongonline.vn/wp-content/uploads/2021/06/gaubong5.png'
                ],
                [
                    'title' => 'Tặng thiệp miễn phí',
                    'link' => '/pig_shop',
                    'image' => 'https://gaubongonline.vn/wp-content/uploads/2021/06/gaubong5.png'
                ],
                [
                    'title' => 'Giặt lợn hồng',
                    'link' => '/pig_shop',
                    'image' => 'https://gaubongonline.vn/wp-content/uploads/2021/06/gaubong5.png'
                ],
                [
                    'title' => 'Nén nhỏ lợn',
                    'link' => '/pig_shop',
                    'image' => 'https://gaubongonline.vn/wp-content/uploads/2021/06/gaubong5.png'
                ],
                [
                    'title' => 'Nén nhỏ lợn',
                    'link' => '/pig_shop',
                    'image' => 'https://gaubongonline.vn/wp-content/uploads/2021/06/gaubong5.png'
                ]
            ];
            foreach ($arr as $category) {
                ?>
                <div class="flex flex-col items-center justify-center">
                    <img class="w-full image-category h-auto rounded-[5px] object-cover" src="<?php echo $category['image'] ?>" />
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>