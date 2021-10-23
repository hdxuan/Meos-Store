<div class="banner__product">
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
                                        <input onchange="onAmountChange();" id="amount<?= $index ?>" aria-label="quantity" class="input-qty" max="20" min="1" name="numOfProduct<?= $productInCart['id'] ?>" type="number" value="<?= $productInCart['amount'] ?>">
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

                </div>
            </div>

            <div>
                <div class="cart__item">
                    <h3>Thông tin nhận hàng</h3>
                    <div class="cart__item--informations">
                        <!-- loof nha  -->

                        <label for="username">Tên khách hàng: </label>
                        <input disabled type="text" class="input" name="name" value="<?= $_SESSION['user']['name'] ?>">

                        <!-- <label for="email">Email: </label>
                            <input type="text" class="input" name="email"> -->

                        <label for="phone">Số điện thoại: </label>
                        <input disabled type="text" class="input" name="phone" value="<?= $_SESSION['user']['phone'] ?>">

                        <label for="address">Địa chỉ: </label>
                        <textarea disabled class="input" name="address" id="" cols="1" rows="3"><?= $_SESSION['user']['address'] ?></textarea>

                        <!-- <button type="submit" value="order" class="btn btn--primary">Thanh toán</button> -->
                    </div>
                </div>

                <div class="cart__item">
                    <h3>Đơn hàng</h3>
                    <div class="cart__item--informations">
                        <!-- loof nha  -->
                        <div>
                            <label for="username">Tổng tiền: </label>
                            <span id="total"></span>
                        </div>

                        <button type="submit" value="order" class="btn btn--primary">Thanh toán</button>
                    </div>
                </div>
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
    </script>
</div>