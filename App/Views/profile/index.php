<!-- <div>

</div> -->

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

            <div class="layout2">
                <div class="bio-graph-info height_history">
                    <h2>Lịch sử đơn hàng</h2>
                    <div class="order__lists">
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

                                    <svg width=" 16" height="17" viewBox="0 0 253 263" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M126.5 0.389801C126.5 0.389801 82.61 27.8998 5.75 26.8598C5.08763 26.8507 4.43006 26.9733 3.81548 27.2205C3.20091 27.4677 2.64159 27.8346 2.17 28.2998C1.69998 28.7657 1.32713 29.3203 1.07307 29.9314C0.819019 30.5425 0.688805 31.198 0.689995 31.8598V106.97C0.687073 131.07 6.77532 154.78 18.3892 175.898C30.003 197.015 46.7657 214.855 67.12 227.76L118.47 260.28C120.872 261.802 123.657 262.61 126.5 262.61C129.343 262.61 132.128 261.802 134.53 260.28L185.88 227.73C206.234 214.825 222.997 196.985 234.611 175.868C246.225 154.75 252.313 131.04 252.31 106.94V31.8598C252.31 31.1973 252.178 30.5414 251.922 29.9303C251.667 29.3191 251.292 28.7649 250.82 28.2998C250.35 27.8358 249.792 27.4696 249.179 27.2225C248.566 26.9753 247.911 26.852 247.25 26.8598C170.39 27.8998 126.5 0.389801 126.5 0.389801Z" fill="#ee4d2d"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M207.7 149.66L119.61 107.03C116.386 105.472 113.914 102.697 112.736 99.3154C111.558 95.9342 111.772 92.2235 113.33 88.9998C114.888 85.7761 117.663 83.3034 121.044 82.1257C124.426 80.948 128.136 81.1617 131.36 82.7198L215.43 123.38C215.7 120.38 215.85 117.38 215.85 114.31V61.0298C215.848 60.5592 215.753 60.0936 215.57 59.6598C215.393 59.2232 215.128 58.8281 214.79 58.4998C214.457 58.1705 214.063 57.909 213.63 57.7298C213.194 57.5576 212.729 57.4727 212.26 57.4798C157.69 58.2298 126.5 38.6798 126.5 38.6798C126.5 38.6798 95.31 58.2298 40.71 57.4798C40.2401 57.4732 39.7735 57.5602 39.3376 57.7357C38.9017 57.9113 38.5051 58.1719 38.1709 58.5023C37.8367 58.8328 37.5717 59.2264 37.3913 59.6604C37.2108 60.0943 37.1186 60.5599 37.12 61.0298V108.03L118.84 147.57C121.591 148.902 123.808 151.128 125.129 153.884C126.45 156.64 126.797 159.762 126.113 162.741C125.429 165.72 123.755 168.378 121.363 170.282C118.972 172.185 116.006 173.221 112.95 173.22C110.919 173.221 108.915 172.76 107.09 171.87L40.24 139.48C46.6407 164.573 62.3785 186.277 84.24 200.16L124.49 225.7C125.061 226.053 125.719 226.24 126.39 226.24C127.061 226.24 127.719 226.053 128.29 225.7L168.57 200.16C187.187 188.399 201.464 170.892 209.24 150.29C208.715 150.11 208.2 149.9 207.7 149.66Z" fill="#fff"></path>
                                    </svg>
                                    <span class="ms-2">Tổng tiền: <?= number_format($order['total'], 0, "", ",")  ?>đ </span>
                                </div>

                                <div class="d-flex justify-content-end mt-1">

                                    <?php if (mb_strtoupper($order['status'], 'utf8') === "CHƯA XỬ LÝ") : ?>

                                        <a href="<?= DOCUMENT_ROOT . DS . "Cart/deleteProduct?id=" . $order['id'] ?>">
                                            <button class="btn btn--secondary">Hủy đơn hàng</button>
                                        </a>
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
                    <textarea class="w-100" name="addresses[]" id="address${index}" cols="35" rows="2">${address.address}</textarea>
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
</script>