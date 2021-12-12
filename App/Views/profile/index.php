<!-- <div>

</div> -->
<div class="container bootstrap snippets bootdey mt-5">

    <div class="profile-info mx-auto" style="width:90%">

        <div class="panel">

            <div class="background">
                <img style="height: 418px;" src="<?= IMAGES_URL  ?>/various-animal-feed-white-surface.jpg" alt="">
                <form action="<?= DOCUMENT_ROOT . DS . "profile/editAvatar"  ?>" method="POST" enctype="multipart/form-data">

                    <div class="avatar__user">
                        <div class="avatar__user--info ">
                            <div class="avatar__user--image ">
                                <input type="text" hidden name="oldImage" value="<?= $_SESSION['user']['avatar'] ?>">

                                <img src="<?= IMAGES_URL . DS . "uploads/avatar/" . $_SESSION['user']['avatar'] ?>" alt="">

                            </div>
                            <div class="avatar__user--name"><?= $_SESSION['user']['name']  ?></div>
                        </div>
                        <!-- <a href="#">Chỉnh sửa thông tin</a> -->
                        <input type="file" id="profileImage" name="profileImage">

                        <i id="onclick" class="fas fa-camera  edit__avatar"></i>
                        <button type="submit" class="btn ">Lưu hình</button>

                    </div>

                </form>

            </div>

            <div class="layout">
                <div>
                    <div class="bio-graph-info ">
                        <form action="<?= DOCUMENT_ROOT . DS . "profile/update"  ?>" method="POST">
                            <h2>Thông tin cá nhân</h2>
                            <div>
                                <label class="d-flex justify-content-between" for="name">Tên khách hàng : </label>
                                <input type="text" name="name" value="<?= $_SESSION['user']['name']  ?>"> <br>

                                <label for="phone">Số điện thoại : </label><br>
                                <input type="text" name="phone" value="<?= $_SESSION['user']['phone']  ?>">

                                <label for="address">Địa chỉ giao hàng : </label>
                                <textarea name="address" id="address" cols="35" rows="2"><?= $_SESSION['user']['address']  ?></textarea>

                                <label for="email">Email : </label><br>
                                <input type="text" name="email" value="<?= $_SESSION['user']['email']  ?>">

                            </div>
                            <button type="submit" class="btn ">lưu</button>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
                <div class="bio-graph-info height_history">
                    <h2>Lịch sử đơn hàng</h2>
                    <div class="order__lists">
                        <?php foreach ($data['numOrderByUser'] as $index => $order) : ?>

                            <div class="order__list">
                                <p>Đơn hàng: <?= $order['id']  ?> </p>

                                <?php foreach ($order['products'] as $index => $orderDetail) : ?>

                                    <div class="order__list--info">

                                        <img class="order__list--image" src="<?= IMAGES_PRODUCT_URL . DS . $orderDetail['image'] ?>" alt="">
                                        <div>
                                            <p><?= $orderDetail['name'] ?></p>
                                            <p>Số lượng: <?= $orderDetail['amount'] ?></p>
                                            <p>Đơn giá: <?= number_format($orderDetail['price_product'], 0, "", ",")  ?>đ </p>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach; ?>

                                <div class="order__list--state">
                                    <p>Trạng thái đơn hàng: <?= $order['status'] ?></p>
                                    <p>Tổng đơn hàng: <?= number_format($order['total'], 0, "", ",")  ?>đ </p>
                                </div>

                            </div>


                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>