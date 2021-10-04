<section class="container noselect">
    <!-- <h3 class="title">Detail cake</h3> -->

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
                <div class="detail__item-summary">
                    <div class="detail__item-info"></div>
                </div>
                <div>
                    <div class="detail__item-info__price"><?= number_format($detail['price'], 0, '', '.') ?>đ</div>
                    <div class="detail__item-info__original-price">
                        <?= number_format($detail['price'], 0, '', '.') ?>đ
                    </div>
                </div>
                <button class="btn btn--primary">Vào giỏ hàng +</button>
            </div>
        </div>
    <?php endforeach; ?>

</section>