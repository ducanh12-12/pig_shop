<!DOCTYPE html>
<html lang="en">

<body>
    <div class="modal fade" id="<?php echo 'item_' . $rows['id'] ?>" aria-labelledby="exampleModalLabel"
        aria-hidden="false" tabindex="-1">
        <div class="modal-dialog modal-xl max-w-[1000px]">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="flex gap-3">
                        <img class="w-1/2" src="./images/<?php echo $rows['avatar'] ?>">
                        <div class="flex flex-col gap-3">
                            <div class="text-[1.5rem] font-bold">
                                <?php echo $rows['title'] ?>
                            </div>
                            <div class="text-[1.5rem] font-bold text-[#02c4c1]">
                                <?php echo 10.000 . 'đ' ?>
                            </div>
                            <form class="form-order flex flex-col gap-y-3 needs-validation" action="/pig_shop/components/cart/Submit.php" novalidate
                                >
                                <input type="hidden" name="pig_id" value="<?php echo $rows['id'] ?>">
                                <div class="row row-sm">
                                    <div class="col-6 col-sm form-group">
                                        <input class="form-control" type="text" name="name"
                                            placeholder="Họ và tên người mua" required>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập tên !
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm form-group">
                                        <input class="form-control" type="text" name="phone_number"
                                            placeholder="Số điện thoại người mua" required>
                                            <div class="invalid-feedback">
                                            Vui lòng nhập số điện thoại !
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="address"
                                        placeholder="Địa chỉ nhận hàng" required>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập điạ chỉ !
                                        </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description"
                                        placeholder="Yêu cầu thêm (Ví dụ: Gói quà, hút chân không, viết giúp thiệp, giấu tên người gửi, thời gian nhận hàng...)"></textarea>
                                </div>
                                <button class="btn btn-lg w-full !text-white !bg-[#ff6683]" type="submit">Mua
                                    hàng</button>

                            </form>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>100% bông trắng tinh khiết</div>
                                </div>
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>100% ảnh chụp tại shop</div>
                                </div>
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>Bảo hành đường chỉ trọn đời</div>
                                </div>
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>Bảo hành Bông gấu 6 tháng</div>
                                </div>
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>Miễn phí Gói quà </div>
                                </div>
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>Miễn phí Tặng thiệp </div>
                                </div>
                                <div class="">
                                    <div class="reason"><i class="ion-checkmark"></i>Miễn phí Nén chân không gấu </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>