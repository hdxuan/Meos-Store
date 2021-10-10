<div class="wrapper">
    <section class="container">

        <p class="separation"></p>
        <!--separation: phân cách -->
        <nav class="cart">
            <div class="cart__item">
                <h3>Giỏ hàng</h3>
                <div class="cart__item--informations">
                    <?php foreach ($data['productInCart'] as $index => $productInCart) : ?>
                        <div class="cart__item--information">
                            <img class="cart__item--information__image" src="<?= IMAGES_PRODUCT_URL . DS . $productInCart['image'] ?>" alt="">
                            <div class="profuct__info">
                                <div class="profuct__info--name"> <?= $productInCart['name'] ?> </div>
                                <div class="profuct__info--price">$productInCart['price']</div>
                                <div class="profuct__info--box__set">
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-">
                                        <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                                        <input class="plus is-form" type="button" value="+">
                                    </div>
                                </div>
                            </div>
                            <div class="icon__delete">
                                <a href="#/"><i class="far fa-trash-alt icon_trash"></i></a>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="cart__item">
                <h3>Thông tin nhận hàng</h3>
                <div class="cart__item--informations">
                    <!-- loof nha  -->
                    <form action="" method="POST">

                        <label for="username">Tên khách hàng: </label>
                        <input type="text" name="name">

                        <!-- <label for="email">Email: </label>
                        <input type="text" name="email"> -->

                        <label for="phone">Số điện thoại: </label>
                        <input type="text" name="phone">

                        <label for="address">Địa chỉ: </label>
                        <input type="text" name="address">

                        <button type="submit" value="order" class="btn btn--primary">Thanh toán</button>
                    </form>
                </div>
            </div>

        </nav>
    </section>
</div>