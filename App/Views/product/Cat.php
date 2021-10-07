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

<div class="container ">
    <div class="products__type ">
        <div class="menu__products">
            <h2 class="menu__products__title">Danh mục sản phẩm</h2>
            <div class="menu__products__items">
                <?php foreach ($data["productType"] as $index => $productType) : ?>
                    <a href="<?= DOCUMENT_ROOT . DS . "Products/Cat?productTypeId=" . $productType['id'] ?>" class="">
                        <p class="menu__products__item "> <?= $productType['name'] ?> </p>
                    </a>
                <?php endforeach; ?>
            </div>
            <h2 class="menu__products__title">Sắp xếp theo giá</h2>
        </div>

        <div class="products__display ">
            <div class="products__display--items">
                <?php foreach ($data["products"] as $index => $products) : ?>

                    <div class="products__display--item">
                        <img src="<?= IMAGES_PRODUCT_URL . DS .  $products['image'] ?>" alt="sweeties image" class="products__display--image">
                        <div class="products__display--name">
                            <a href="#"> <?= $products['name'] ?> </a>
                        </div>
                        <div class="products__display--prices">
                            <div class="products__display--price"><?= $products['price'] ?></div>

                            <!-- <div class="products__display--original-price">Lượt mua</div> -->
                        </div>
                        <button class="btn btn--secondary">Thêm vào giỏ +</button>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>