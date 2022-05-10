<div class="banner__product banner">
    <img src="<?= IMAGES_URL ?>/product.jpg" alt="">
    <div class="title__product">
        <h2 class="title__category__product">Giỏ hàng của bạn</h2>
        <div class="address__product">
            <a href="<?= DOCUMENT_ROOT ?>">
                <p class="address__home">Trang chủ</p>
            </a>
            <span> > </span>
            <p class="address__category__product">Giỏ hàng</p>
        </div>
    </div>
</div>
<div class="wrapper">
    <section class="container">
        <form action="<?= DOCUMENT_ROOT . DS . "Cart/checkout" ?>" method="POST" class="cart">
            <div class="cart__item">
                <h3>Giỏ hàng</h3>
                <div class="cart__item--informations">

                    <?php if ($data['productInCart'] === []) : ?>
                        <p style="font-weight: 500;">Bạn chưa chọn được sản phẩm nào.</p>
                    <?php else : ?>

                        <?php foreach ($data['productInCart'] as $index => $productInCart) : ?>
                            <div class="cart__item--information row">
                                <p id="id--product" hidden><?= $productInCart['id'] ?></p>
                                <div class="col-sm-3">
                                    <img class="cart__item--information__image" src="<?= IMAGES_PRODUCT_URL . DS . $productInCart['image'] ?>" alt="">

                                </div>
                                <div class="profuct__info col-sm-8">
                                    <div class="profuct__info--name"> <?= $productInCart['name'] ?> </div>
                                    <input type="number" hidden id="productPrice<?= $index ?>" name="price<?= $productInCart['id'] ?>" value="<?= $productInCart['price'] ?>">
                                    <div class="profuct__info--price"><?= number_format($productInCart['price'], 0, " ", ".") ?>đ</div>
                                    <div class="profuct__info--box__set">
                                        <div class="buttons_added">
                                            <input class="minus is-form" type="button" value="-">
                                            <input onchange="onAmountChange();" id="amount<?= $index ?>" aria-label="quantity" class="input-qty" max="<?= $productInCart['quantity'] ?>" min="1" name="numOfProduct<?= $productInCart['id'] ?>" type="number" value="<?= $productInCart['amount'] ?>">
                                            <input class="plus is-form" type="button" value="+">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="icon__delete">
                                        <a href="<?= DOCUMENT_ROOT . DS . "Cart/removeCart?id=" . $productInCart['id'] ?>"><i class="far fa-trash-alt icon_trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="separation"></p>
                            <!--separation: phân cách -->

                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>
            </div>

            <div>
                <div class="cart__item">
                    <h3>Thông tin nhận hàng</h3>
                    <div class="cart__item--informations">
                        <!-- loof nha  -->

                        <label for="username">Tên khách hàng: </label>
                        <input disabled type="text" class="input" name="name" id="username" value="<?= $_SESSION['user']['name'] ?>">


                        <label for="phone">Số điện thoại: </label>
                        <input disabled type="text" class="input" name="phone" id="phone" value="<?= $_SESSION['user']['phone'] ?>">

                        <label>Địa chỉ: </label>
                        <?php foreach ($data['addresses'] as $index => $address) : ?>
                            <div class="address__user d-flex align-items-center">
                                <input id="address<?= $index ?>" class="cursor-pointer" checked="checked" name="address" type="radio" value="<?= $address['address'] ?>" />
                                <label for="address<?= $index ?>" class="address--text">
                                    <?= $address['address'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <?php if ($data['productInCart'] === []) : ?>
                    <div class="cart__item">
                        <h3>Đơn hàng</h3>
                        <div class="cart__item--informations">
                            <!-- loof nha  -->
                            <div class="mb-4">
                                <label for="username">Tổng tiền: </label>
                                <span id="total"></span>
                            </div>
                            <button disabled type="submit" value="order" class="btn btn--primary">Thanh toán</button>
                        </div>
                    </div>
                <?php else : ?>
                    <div id="checkout" class="cart__item">
                        <h3>Thanh toán</h3>
                        <div class="cart__item--informations">
                            <!-- loof nha  -->
                            <div>
                                <span class="font-bold">Tổng tiền: </span>
                                <span style="color:#f55872; font-weight: bold;" id="total"></span>
                            </div>
                            <?php if (isset($data['discountCode']['discount'])) : ?>
                                <div class="font-bold">
                                    <span>Giảm giá: <span style="color:#f55872; font-weight: bold;"><?= $data['discountCode']['discount'] ?>%</span></span>
                                </div>
                                <div class="font-bold">
                                    <span>Thành tiền: </span>
                                    <span style="color:#f55872; font-weight: bold;" id="totalAfterDiscount"></span>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($data['discountCode']['discount'])) : ?>
                                <input id="discountPercent" hidden type="number" name="discount" value="<?= $data['discountCode']['discount'] ?>">
                            <?php endif; ?>

                            <?php if (isset($data['discountCode']['message'])) : ?>
                                <div class="my-2">
                                    <span class="text-danger">
                                        <?= $data['discountCode']['message'] ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="my-2 row w-100 justify-content-between align-items-center">
                                <span style="font-size: 14px; width:auto" class="col-3">Mã khuyến mãi: </span>
                                <input id="discountInput" type="text" name="discountCode" class="form-control col">
                                <div class="col ml-2">
                                    <button type="button" onclick="submitDiscount();" style="font-size:14px;" class="btn btn--primary">Áp dụng</button>
                                </div>
                            </div>
                            <div>
                                <p class="mb-2">Hình thức thanh toán:</p>
                                <div class="mb-1">
                                    <input class="cursor-pointer" checked id="paymentOff" value="cash" name="paymentMethod" type="radio">
                                    <label class="cursor-pointer" for="paymentOff">Thanh toán khi nhận hàng</label>

                                </div>
                                <div class="mb-2">
                                    <input class="cursor-pointer" id="paymentVNPAY" value="VNPAY" name="paymentMethod" type="radio">
                                    <label class="cursor-pointer" for="paymentVNPAY">Thanh toán qua VNPAY</label>
                                </div>

                            </div>


                            <button type="submit" value="order" class="btn btn--primary checkout-btn mt-2">Thanh toán</button>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </form>
    </section>

    <script>
        function onAmountChange() {
            var total = document.getElementById("total");
            var totalNumber = 0;
            if (total != undefined) {
                for (var i = 0; i < <?= count($data['productInCart']) ?>; i++) {
                    var amount = document.getElementById("amount" + i).value;
                    var productPrice = document.getElementById("productPrice" + i).value;
                    totalNumber += parseInt(amount) * parseInt(productPrice);
                }
                total.innerText = new Intl.NumberFormat().format(totalNumber) + "đ";

                const discountPercent = document.getElementById('discountPercent').value;
                const totalAfterDiscount = document.getElementById("totalAfterDiscount");
                console.log(discountPercent, totalAfterDiscount);
                if (discountPercent && totalAfterDiscount) {
                    totalAfterDiscount.innerText = new Intl.NumberFormat().format(totalNumber - (totalNumber * (discountPercent / 100))) + "đ";
                }
            }
            return;
        }
        $('input.input-qty').each(function() { //chay vong lap tung thẻ input với class là input-qty
            var $this = $(this),
                qty = $this.parent().find('.is-form'),
                min = Number($this.attr('min')),
                max = Number($this.attr('max'))
            if (min == 0) {
                var d = 0
            } else d = min
            $(qty).on('click', function() {
                if ($(this).hasClass('minus')) {
                    if (d > min) d += -1
                } else if ($(this).hasClass('plus')) {
                    var x = Number($this.val()) + 1
                    if (x <= max) d += 1
                }
                $this.attr('value', d).val(d);

                onAmountChange();
            })
        })

        onAmountChange();

        function submitDiscount() {
            const discountCode = document.getElementById("discountInput").value;
            window.location.href = `<?= DOCUMENT_ROOT ?>/Cart?discountCode=${discountCode}#checkout`;
        }
    </script>
</div>