<div class="container bootstrap snippets bootdey mt-5">
    <div class="profile-info mx-auto" style="width:90%">

        <div class="layout">
            <div class="layout1">
                <div class="">
                    <div class="bio-graph-info ">
                        <div class="bio-info">

                            <form action="<?= DOCUMENT_ROOT . DS . "profile/update"  ?>" method="POST">
                                <h2>Thông tin cá nhân</h2>
                                <div class="d-flex flex-column justify-content-between">
                                    <label class="" for="name">Họ tên: </label>
                                    <input type="text" name="name" value="<?= $_SESSION['user']['name']  ?>">

                                    <label for="email">Email: </label>
                                    <input type="text" name="email" value="<?= $_SESSION['user']['email']  ?>">

                                    <label for="phone">Số điện thoại: </label>
                                    <input class="hide-arrow" type="number" name="phone" value="<?= $_SESSION['user']['phone']  ?>">


                                </div>

                                <button type="submit" class="btn btn--primary profile--btn">Lưu thông tin</button>
                                <!-- </div> -->
                            </form>

                            <form id="avatarForm" action="<?= DOCUMENT_ROOT . DS . "profile/editAvatar"  ?>" method="POST" enctype="multipart/form-data">
                                <div class="avatar__user">
                                    <div class="avatar__user--info ">
                                        <div class="avatar__user--image">
                                            <input type="text" hidden name="oldImage" value="<?= $_SESSION['user']['avatar'] ?>">

                                            <img onclick="triggerClick()" src="<?= IMAGES_URL . "/uploads/avatar/" .  (empty($_SESSION['user']['avatar']) ? "default_avatar.png" : $_SESSION['user']['avatar']) ?>" alt="">
                                        </div>
                                    </div>
                                    <input onchange="changeAvatar()" hidden type="file" id="profileImage" name="profileImage">
                                    <label for="profileImage" style="margin-left: 18%; margin-top: 10px " type="submit" class="btn btn--primary ">Đổi ảnh</lab>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="">
                    <div class="bio-graph-info ">
                        <form action="<?= DOCUMENT_ROOT . DS . "profile/updateAddress"  ?>" method="POST">
                            <h2>Địa chỉ giao hàng</h2>
                            <div id="addressWrapper" class="d-flex flex-column">
                            </div>
                            <div hidden id="addressData">
                                <?= $data['addressJSON'] ?>
                            </div>
                            <div class="pt-4">
                                <p id="addressMessage" class="text-danger mb-2"></p>
                                <button type="button" onclick="addNewAddressInput()" class="btn btn--secondary" style="margin-right: 10px">Thêm địa chỉ +</button>
                                <button type="submit" class="btn btn--primary ">Lưu</button>
                            </div>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="layout2" id="order">
                <div class="bio-graph-info height_history">
                    <h2>Lịch sử đơn hàng</h2>
                    <div class="order__lists">
                        <?= count($data['numOrderByUser']) == 0 ? "<div style=\"color: black\">Chưa có đơn hàng nào</div>" : "" ?>
                        <?php foreach ($data['numOrderByUser'] as $index => $order) : ?>

                            <div class="order__list">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="order__list-name color-text"><i class="fas fa-paw "></i> Đơn hàng: <?= $order['id']  ?> </span>
                                    <span><?= mb_strtoupper($order['status'], 'utf8') ?> </span>


                                </div>

                                <div class="order__list--title mt-4">
                                    <p>Hình ảnh</p>
                                    <p>Sản phẩm</p>
                                    <p>Đơn giá</p>
                                    <p>Số lượng</p>
                                    <!-- <p>Tổng tiền</p>
                                    <p>Trạng thái đơn hàng</p> -->
                                </div>


                                <?php foreach ($order['products'] as $index => $orderDetail) : ?>
                                    <div class="order__list--title color-text">
                                        <img class="order__list--image" src="<?= IMAGES_PRODUCT_URL . DS . $orderDetail['image'] ?>" alt="">
                                        <p><?= $orderDetail['name'] ?></p>
                                        <p><?= number_format($orderDetail['price_product'], 0, "", ",")  ?>đ </p>
                                        <p> <?= $orderDetail['amount'] ?></p>
                                        <!-- <p><?= number_format($order['total'], 0, "", ",")  ?>đ </p>
                                        <p> <?= $order['status'] ?></p> -->

                                    </div>
                                <?php endforeach; ?>
                                <!-- <div class="order__list--state">
                                    <p>Trạng thái đơn hàng: <?= $order['status'] ?></p>
                                    <p>Tổng đơn hàng: <?= number_format($order['total'], 0, "", ",")  ?>đ </p>
                                </div> -->
                                <div class="d-flex justify-content-end align-items-center fs-2">
                                    <!-- fs-2 py-5 -->


                                    <div class="d-flex flex-column align-items-end mb-4">
                                        <div style="font-weight: 400; color: black; font-size: 16px;" class="ms-2">Tổng tiền: <span class="<?= $order['discount_percent'] == 0 ? "font-bold" : "" ?>"> <?= number_format($order['total'], 0, "", ",")  ?>đ</span> </div>
                                        <?php if ($order['discount_percent'] != 0) : ?>
                                            <div style="font-weight: 400; color: black; font-size: 16px;" class="ms-2">Giảm giá: <?= $order['discount_percent'] ?>%</div>
                                            <div style="font-weight: 400; color: black; font-size: 16px;" class="ms-2">Thành tiền: <span class="font-bold"><?= number_format($order['total'] - ($order['total'] * ($order['discount_percent'] / 100)), 0, "", ",")  ?>đ </span></div>
                                        <?php endif; ?>
                                        <?php if (isset($order['payment_code'])) : ?>
                                            <div style="font-weight: 400; color: green; font-size: 16px;" class="ms-2">Đã thanh toán qua VNPAY - Mã thanh toán: <?= $order['payment_code'] ?></div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-end mt-1">

                                    <?php if (mb_strtoupper($order['status'], 'utf8') === "CHƯA XỬ LÝ") : ?>

                                        <button onclick="onclickDeleteOrder(<?= $order['id'] ?>)" class="btn btn--secondary">Hủy đơn hàng</button>
                                    <?php endif; ?>
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
    let addressesJSON = $("#addressData").text();
    var addresses = JSON.parse(addressesJSON);

    function changeAvatar() {
        document.getElementById("avatarForm").submit();
    }

    function fetchAddress() {
        if (addresses && addresses.length > 0) {
            $("#addressWrapper").empty();
            addresses.forEach((address, index) => {
                let addressInput =
                    `<div class="d-flex w-100 align-items-center">
                    <textarea style="resize:none" class="w-100" name="addresses[]" id="address${index}" cols="35" rows="2">${address.address}</textarea>
                    <i style="margin-left: 10px" class="cursor-pointer fas fa-minus-circle" onclick="removeAddress(${address.id})"></i>
                </div>`
                $("#addressWrapper").append(addressInput)
            })
        }
    }

    function removeAddress(id) {
        if (addresses.length > 1) {
            addresses = addresses.filter(x => x.id !== id);
            fetchAddress();
        }
    }

    function addNewAddressInput() {
        if (addresses.length >= 10) {
            $("#addressMessage").text("Bạn chỉ được thêm tối đa 10 địa chỉ");
            return;
        }
        addresses.push({
            id: Math.random(),
            address: ""
        })
        fetchAddress();
    }

    $(document).ready(() => {
        fetchAddress();
    })

    function onclickDeleteOrder(num) {
        if (confirm(`Bạn có chắc chắn hủy đơn hàng ${num}`)) {
            alert("Bạn đã hủy thành công đơn hàng " + num + " thành công")
            window.location.href = "<?= DOCUMENT_ROOT ?>/Cart/deleteProduct?id=" + num;
        }
    }
</script>