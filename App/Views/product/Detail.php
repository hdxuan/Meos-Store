<div class="banner__product">
    <img src="<?= IMAGES_URL ?>/product.jpg" alt="">
    <div class="title__product">
        <h2 class="title__category__product"> Các sản phẩm</h2>
        <div class="address__product">
            <a href="<?= DOCUMENT_ROOT ?>">
                <p class="address__home">Home</p>
            </a>
            <span> > </span>
            <p class="address__category__product">Chi tiết sản phẩm</p>
        </div>
    </div>
</div>
<section class="container noselect">
    <!-- <h3 class="title">Detail cake</h3> -->
    <div class="detail">
        <?php foreach ($data['detailProduct'] as $index => $detail) : ?>
            <div class="detail__items row">
                <div class="detail__item-image col">
                    <img src="<?= IMAGES_PRODUCT_URL ?>/<?= $detail['image'] ?>" alt="cake image">
                </div>
                <div class="detail__item-info col">
                    <div>
                        <h6 class="detail__item-info__name"><?= $detail['name'] ?></h6>
                        <p class="detail__item-info__description line-clamp-5">
                        </p>
                    </div>
                    <div class="detail__item-stars__items">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-half-alt-solid.svg" alt="" class="star__item">
                    </div>
                    <div>
                        <div class="detail__item-summary mt-5"> <?= $detail['benerfits'] ?> </div>
                    </div>
                    <div class="row mt-4">
                        <p class="detail__title col-sm-2">Giá</p>
                        <div class="detail__item__price col-sm-10">Giá <?= number_format($detail['price'], 0, '', '.') ?>đ</div>
                    </div>
                    <div class="row my-4">
                        <p class="detail__title col-sm-2">Số lượng</p>
                        <div class="buttons_added col-sm-10">
                            <input class="minus is-form" type="button" value="-">
                            <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                            <input class="plus is-form" type="button" value="+">
                        </div>
                    </div>
                    <button class="btn btn--primary">Vào giỏ hàng +</button>
                </div>
            </div>

            <div class="info__product_items row">
                <div class="info__product_item--button col ">
                    <div class="info__button">
                        <p>Thông tin sản phẩm</p>
                    </div>
                    <div class="info__button">
                        <p>Đánh giá sản phẩm</p>
                    </div>
                </div>
                <div class="info__product_item--content">
                    <div class="content__ingredients ">
                        <h3>Thành phần</h3>
                        <p> <?= $detail['ingredients'] ?> </p>
                    </div>
                    <div class="content__benerfits">
                        <p> <?= $detail['benerfits'] ?> </p>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="related__products">
        <h3 class="title">Sản phẩm liên quan</h3>
        <div class="related__products_item">

        </div>
    </div>
</section>