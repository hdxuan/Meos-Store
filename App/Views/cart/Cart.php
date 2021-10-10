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
        <nav class="cart">
            <div class="cart__item">
                <h3>Giỏ hàng</h3>
                <div class="cart__item--informations">
                    <?php foreach ($data['productInCart'] as $index => $productInCart) : ?>
                        <div class="cart__item--information row">
                            <div class="col-sm-3">
                                <img class="cart__item--information__image" src="<?= IMAGES_PRODUCT_URL . DS . $productInCart['image'] ?>" alt="">

                            </div>
                            <div class="profuct__info col-sm-8">
                                <div class="profuct__info--name"> <?= $productInCart['name'] ?> </div>
                                <div class="profuct__info--price"><?= number_format($productInCart['price'], 0, " ", ".") ?>đ</div>
                                <div class="profuct__info--box__set">
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-">
                                        <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                                        <input class="plus is-form" type="button" value="+">
                                    </div>
                                </div>
                            </div>
                            <div class="col">

                                <div class="icon__delete">
                                    <a href="#/"><i class="far fa-trash-alt icon_trash"></i></a>
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
                        <form action="" method="POST">

                            <label for="username">Tên khách hàng: </label>
                            <input type="text" class="input" name="name">

                            <!-- <label for="email">Email: </label>
                            <input type="text" class="input" name="email"> -->

                            <label for="phone">Số điện thoại: </label>
                            <input type="text" class="input" name="phone">

                            <label for="address">Địa chỉ: </label>
                            <input type="text" class="input" name="address">

                            <!-- <button type="submit" value="order" class="btn btn--primary">Thanh toán</button> -->
                        </form>
                    </div>
                </div>

                <div class="cart__item">
                    <h3>Đơn hàng</h3>
                    <div class="cart__item--informations">
                        <!-- loof nha  -->
                        <form action="" method="POST">

                            <label for="username">Tổng tiền: </label>
                            <input type="text" class="input" name="name">

                            <button type="submit" value="order" class="btn btn--primary">Thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>

        </nav>
    </section>
</div>