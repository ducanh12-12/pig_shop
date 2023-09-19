<!DOCTYPE html>
<html lang="en">
<style>
    .slider {
        /* transition: all 1s ease-in-out; */
        transition-delay: 0.5s;
        transition-duration: 0.5s ;
    }
</style>

<body>
    <div class="w-full overflow-x-hidden">
        <div class="w-max flex slider max-h-[800px]">
            <?php
            $banners = [
                [
                    'title' => 'Image',
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/09/thang-9_Banner-DC_HN.jpg',
                    'link' => '/'
                ],
                [
                    'title' => 'Image',
                    'link' => '/',
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/09/thang-9_Banner-BST-Metoo-copy-1.jpg'
                ],
                [
                    'title' => 'Image',
                    'avatar' => 'https://gaubongonline.vn/wp-content/uploads/2023/09/Banner-thuong_banner-dien-gau-1-scaled.jpg',
                    'link' => '/',
                ],
            ];
            foreach ($banners as $banner) {
                ?>
                <a href="<?php echo $banner['link'] ?>" _blank>
                    <img class="banner object-cover" src="<?php echo $banner['avatar'] ?>"
                        alt="<?php echo $banner['title'] ?>" />
                </a>
            <?php } ?>
        </div>
    </div>
</body>
<script>
    const banners = document.querySelectorAll('.banner');
    const slider = document.querySelector('.slider');
    let index = 1;
    let widthWindow = window.innerWidth;
    banners.forEach((banner) => {
        banner.style.width = window.innerWidth + 'px';
    })
    window.addEventListener("resize", () => {
        widthWindow = window.innerWidth;
        banners.forEach((banner) => {
            banner.style.width = window.innerWidth + 'px';
        })
    });
    window.setInterval(function () {
        slider.style.transform = `translateX(${-widthWindow * index}px)`;
        ++index;
        if (index > 3) {
            index = 0;
            slider.style.transform = `translateX(0px)`;
        }
    }, 3000);
</script>

</html>