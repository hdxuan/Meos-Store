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
                    <img src="<?= IMAGES_PRODUCT_URL ?>/<?= $detail['image'] ?>" alt="image">
                    <p class="detail__item-image__circle"></p>

                </div>

                <div class="detail__item-info col">
                    <div>
                        <h6 class="detail__item-info__name"><?= $detail['name'] ?></h6>

                    </div>
                    <div class="detail__item-stars__items">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-solid.svg" alt="" class="star__item">
                        <img src="<?= ICONS_URL . DS ?>/star-half-alt-solid.svg" alt="" class="star__item">
                    </div>
                    <div>
                        <h2 class="mt-5">Thành phần</h2>
                        <div class="detail__item-summary mt-1"> <?= $detail['ingredients'] ?> </div>

                        <h2 class="mt-5">Công dụng</h2>
                        <div class="detail__item-summary mt-1"> <?= $detail['benerfits'] ?> </div>

                    </div>
                    <div class="row mb-4">
                        <p class="detail__item__price"><?= number_format($detail['price'], 0, '', '.') ?>đ</p>
                    </div>

                    <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $detail['id'] ?>)" class="btn btn--primary">Thêm vào giỏ +</button>

                </div>
            </div>

            <!-- <div class="info__product_items row">
                <div class="info__product_item--button col ">

                    <div class="info__button">
                        <p>Đánh giá sản phẩm</p>
                    </div>
                </div>
                <div class="info__product_item--content">
                    <form action="<?= DOCUMENT_ROOT . DS . "Products/Comment"  ?>" method="POST">
                        <p name="idproduct" id="id_detail"><?= $_GET['productId'] ?></p>
                        <div class="fomr__comment">
                            <textarea name="comments" id="" cols="15" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn--primary">Gửi đánh giá</button>
                    </form>

                </div>
            </div> -->
        <?php endforeach; ?>

    </div>

    <!-- <div class="related__products">
        <h3 class="title">Sản phẩm liên quan</h3>
        <div class="related__products_item">

        </div>
    </div> -->
</section>