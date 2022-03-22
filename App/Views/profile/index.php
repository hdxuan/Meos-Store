<!-- <div>

</div> -->
<div class="container bootstrap snippets bootdey mt-5">
    <div class="profile-info mx-auto" style="width:90%">

        <div class="layout">
            <div class="layout1">
                <div>
                    <div class="bio-graph-info ">
                        <div class="bio-info">

                            <form action="<?= DOCUMENT_ROOT . DS . "profile/update"  ?>" method="POST">
                                <h2>Thông tin cá nhân</h2>
                                <div class="bio-info_list">
                                    <label class="d-flex justify-content-between" for="name">Họ tên: </label>
                                    <input type="text" name="name" value="<?= $_SESSION['user']['name']  ?>">

                                    <label for="email">Email: </label>
                                    <input type="text" name="email" value="<?= $_SESSION['user']['email']  ?>">

                                    <label for="phone">Số điện thoại: </label>
                                    <input type="text" name="phone" value="<?= $_SESSION['user']['phone']  ?>">


                                </div>
                                <button type="submit" class="btn btn--primary profile--btn">lưu</button>
                                <!-- </div> -->
                            </form>

                            <form action="<?= DOCUMENT_ROOT . DS . "profile/editAvatar"  ?>" method="POST" enctype="multipart/form-data">

                                <div class="avatar__user">
                                    <div class="avatar__user--info ">
                                        <div class="avatar__user--image ">
                                            <input type="text" hidden name="oldImage" value="<?= $_SESSION['user']['avatar'] ?>">

                                            <img onclick="triggerClick()" src="<?= IMAGES_URL . "/uploads/avatar/" .  (empty($_SESSION['user']['avatar']) ? "default_avatar.png" : $_SESSION['user']['avatar']) ?>" alt="">

                                        </div>
                                    </div>
                                    <input hidden type="file" id="profileImage" name="profileImage">

                                    <!-- <i onclick="triggerClick()" id="onclick" class="fas fa-camera  edit__avatar"></i> -->
                                    <button style="margin-left: 9%;" type="submit" class="btn btn--primary ">Lưu hình</button>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="bio-graph-info ">
                        <form action="<?= DOCUMENT_ROOT . DS . "profile/update"  ?>" method="POST">
                            <h2>Địa chỉ giao hàng</h2>
                            <div>


                                <label for="address">Địa chỉ giao hàng : </label>
                                <textarea name="address" id="address" cols="35" rows="2"><?= $_SESSION['user']['address']  ?></textarea><br>



                            </div>
                            <button type="submit" class="btn btn--primary ">lưu</button>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="layout2">

                <div class="bio-graph-info height_history">
                    <h2>Lịch sử đơn hàng</h2>
                    <div class="order__lists">
                        <?php foreach ($data['numOrderByUser'] as $index => $order) : ?>

                            <div class="order__list">
                                <p><i class="fas fa-paw"></i> Đơn hàng: <?= $order['id']  ?> </p>

                                <?php foreach ($order['products'] as $index => $orderDetail) : ?>

                                    <div class="order__list--info">

                                        <img class="order__list--image" src="<?= IMAGES_PRODUCT_URL . DS . $orderDetail['image'] ?>" alt="">
                                        <div>
                                            <p><?= $orderDetail['name'] ?></p>
                                            <p>Số lượng: <?= $orderDetail['amount'] ?></p>
                                            <p>Đơn giá: <?= number_format($orderDetail['price_product'], 0, "", ",")  ?>đ </p>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                <div class="order__list--state">
                                    <p>Trạng thái đơn hàng: <?= $order['status'] ?></p>
                                    <p>Tổng đơn hàng: <?= number_format($order['total'], 0, "", ",")  ?>đ </p>
                                </div>
                                <hr>
                            </div>


                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    function triggerClick() {
        document.querySelector("#profileImage").click();
    }
</script>