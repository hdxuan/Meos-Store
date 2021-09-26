<section class="container-fluid best-seller-background">
    <div class="wrapper">

        <section class="container best-seller noselect">


            <h3 class="title">Detail cake</h3>
            <div class="slider">
                <?php foreach ($data['detail'] as $index => $detail) : ?>
                    <div class="best-seller__item slider__item">
                        <img class="best-seller__item-image" src="<?= IMAGES_CAKES_URL ?>/<?= $detail['image'] ?>" alt="cake image">
                        <div class="best-seller__item-info">
                            <div>
                                <h6 class="best-seller__item-info__name"><?= $detail['name'] ?></h6>
                                <p class="best-seller__item-info__description line-clamp-5">
                                    <?= $detail['description'] ?>
                                </p>
                            </div>
                            <div>
                                <div class="best-seller__item-info__price"><?= number_format($detail['price'], 0, '', '.') ?>đ</div>
                                <div class="best-seller__item-info__original-price">
                                    <?= number_format($detail['price'], 0, '', '.') ?>đ
                                </div>
                            </div>
                            <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $detail['id'] ?> )" class="btn btn--primary">Add to cart +</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </section>
    </div>
</section>