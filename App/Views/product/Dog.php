<div class="banner__product">
    <img src="<?= IMAGES_URL ?>/product.jpg" alt="">
    <div class="title__product">
        <h2 class="title__category__product"> Các sản phẩm </h2>
        <div class="address__product">
            <a href="<?= DOCUMENT_ROOT ?>">
                <p class="address__home">Trang chủ</p>
            </a>
            <span> > </span>
            <p class="address__category__product">Sản phẩm cho chó</p>
        </div>
    </div>
</div>

<div class="container ">
    <div class="products__type">
        <div class="menu__products">
            <h2 class="menu__products__title" id="top">Danh mục sản phẩm</h2>
            <div class="menu__products__items">

                <?php foreach ($data["productType"] as $index => $productType) : ?>
                    <a href="<?= DOCUMENT_ROOT . DS . "Products/Dog?productTypeId=" . $productType['id'] ?>#top">
                        <p class="menu__products__item <?= $productType['id'] == $_GET['productTypeId'] ? "menu__products__item--active" : "" ?>"> <?= $productType['name'] ?> </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="products__display ">
            <div class="products__display--items">
                <?php foreach ($data["products"] as $index => $products) : ?>

                    <div class="products__display--item">
                        <div class="sweeties__item--over-image">
                            <img src="<?= IMAGES_PRODUCT_URL . DS .  $products['image'] ?>" alt="sweeties image" class="products__display--image">
                            <p class="product_circle"></p>

                        </div>
                        <div class="products__display--name">
                            <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $products['id'] ?> "> <?= $products['name'] ?></a>
                        </div>
                        <div class="products__display--prices">
                            <div class="products__display--price"><?= number_format($products['price'], 0, '', '.')  ?>đ</div>
                            <div class="products__display--price"><?= number_format($products['price'], 0, '', '.')  ?>đ</div>

                        </div>
                        <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $products['id'] ?>)" class=" btn--cart btn--secondary">THÊM VÀO GIỎ</button>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</div>