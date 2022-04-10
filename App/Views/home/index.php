<!-- wrapper banner -->
<div id="carousel-banner" class="container-fluid banner owl-carousel owl-theme">
    <img class="img_banner" src="<?= IMAGES_URL ?>/banner/banner1.png" alt="banner">
    <img class="img_banner" src="<?= IMAGES_URL ?>/banner/banner2.png" alt="banner">
    <img class="img_banner" src="<?= IMAGES_URL ?>/banner/banner3.png" alt="banner">
    <img class="img_banner" src="<?= IMAGES_URL ?>/banner/banner4.png" alt="banner">
</div>
<!-- end wrapper banner -->

<!-- wrapper products -->
<section class="container category">
    <h3 id="category" class="title">Doanh mục thú cưng</h3>
    <img src="<?= IMAGES_URL ?>/icons/sleigh-bell.svg" class="img_category">

    <div class="category__items noselect">
        <?php foreach ($data['categoriesDog'] as $key => $categoriesDog) : ?>

            <a class="category__item-name category__item" href="<?= DOCUMENT_ROOT ?>/Products/Dog?productTypeId=<?= $categoriesDog['id'] ?>" class="category__item">
                <img src="<?= IMAGES_URL ?>/menu/<?= $categoriesDog['image'] ?>" alt="category image" class="category__item-image">
                <div class="category__item-name">
                    <?= $categoriesDog['name'] ?>
                </div>
            </a>
        <?php endforeach; ?>


    </div>
</section>
<!-- end wrapper products -->

<section class="container-fluid best-seller-background">
    <section class="container best-seller noselect">
        <h3 class="title__small">Nổi bật</h3>
        <h3 class="title">Sản phẩm bán chạy</h3>
        <div id="carousel-best-seller" class="owl-carousel owl-theme">
            <?php foreach ($data['bestSellers'] as $key => $bestSellers) : ?>
                <div class="item">
                    <div class="best-seller__item">
                        <div class="best-seller_image">
                            <img src="<?= IMAGES_PRODUCT_URL . DS . $bestSellers["image"] ?>" alt=" image" class="best-seller__item-image">
                            <!-- <p class="best-seller_circle"></p> -->

                        </div>

                        <h6 class="best-seller__item-info__name">
                            <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $bestSellers['id'] ?> "><?= $bestSellers["name"] ?></a>
                        </h6>
                        <div class="best-seller__item-info__prices">

                            <div class="best-seller__item-info__price"><?= number_format($bestSellers["price"], 0, '', '.') ?>đ</div>

                            <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $bestSellers['id'] ?>)" class="btn btn--primary"><i class="fas fa-shopping-bag custom_cart"></i></button>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>
</section>

<!-- end wrapper best seller -->

<!-- wrapper product -->

<div class="container sweeties noselect">
    <!-- <h3 class="title__small">Mới nhất</h3> -->
    <div class="name_category_product">
        <img src="<?= IMAGES_URL ?>/menu/happy.png" alt="" class="image_category_product">
        <h3 class="title" id="dog">Sản phẩm dành cho chó</h3>
    </div>

    <div class="sweeties__items">
        <?php foreach ($data["productOnlyPageDog"] as $key => $productOnlyPageDog) : ?>
            <div class="sweeties__item">
                <div class="sweeties__item--over-image">

                    <img src="<?= IMAGES_PRODUCT_URL . DS . $productOnlyPageDog['image'] ?>" alt="sweeties image" class="sweeties__item-image">
                    <p class="product_circle"></p>
                </div>
                <div class="sweeties__item-name">
                    <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $productOnlyPageDog['id'] ?> "><?= $productOnlyPageDog['name'] ?></a>
                </div>
                <div class="sweeties__item-prices">
                    <div class="sweeties__item__price"><?= number_format($productOnlyPageDog['price'], 0, '', '.') ?>đ</div>

                    <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $productOnlyPageDog['id'] ?>)" class="btn btn--secondary"><i class="fas fa-shopping-bag custom_cart"></i></button>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="paging-numbers">

        <a href="  <?= $data['currentPage'] == 1 ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] - 1) ?>">
            <svg class=" <?= $data['currentPage'] == 1 ? "cursor-default" : "paging-arrow" ?> " width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17.9402" r="16.5" transform="rotate(-180 17 17.9402)" stroke="#848484" />
                <path d="M12.2387 16.935L18.8388 11.1495C19.1571 10.8704 19.6732 10.8704 19.9915 11.1495L20.7613 11.8242C21.079 12.1028 21.0797 12.5543 20.7626 12.8335L15.5319 17.4402L20.7626 22.0469C21.0797 22.3261 21.079 22.7776 20.7613 23.0561L19.9915 23.7309C19.6732 24.0099 19.1571 24.0099 18.8388 23.7309L12.2387 17.9454C11.9204 17.6664 11.9204 17.214 12.2387 16.935Z" fill="#848484" />
            </svg>
        </a>

        <?php for ($i = 1; $i <= $data['pages']; $i++) : ?>

            <a <?= $i == $data['currentPage'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/Home" ?>?page=<?= $i ?>#dog">
                <div class="paging-number <?= $i == $data['currentPage'] ? "paging-number--active" : "" ?>">
                    <?= $i ?>
                </div>
                <!-- paging-number--active để này dô khi check page  -->
            </a>

        <?php endfor; ?>


        <a href=" <?= $data['currentPage'] == $data['pages'] ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] + 1) ?>">
            <svg class=" <?= $data['currentPage'] == $data['pages'] ? "cursor-default" : "paging-arrow" ?>" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17" r="16.5" stroke="#848484" />
                <path d="M21.7613 18.0052L15.1612 23.7907C14.8429 24.0698 14.3268 24.0698 14.0085 23.7907L13.2387 23.1159C12.921 22.8374 12.9203 22.3859 13.2374 22.1067L18.4681 17.5L13.2374 12.8933C12.9203 12.6141 12.921 12.1626 13.2387 11.8841L14.0085 11.2093C14.3268 10.9302 14.8429 10.9302 15.1612 11.2093L21.7613 16.9948C22.0796 17.2738 22.0796 17.7262 21.7613 18.0052Z" fill="#848484" />
            </svg>
        </a>

    </div>
</div>


<section class="container-fluid best-seller-background">
    <section class="container best-seller noselect">
        <h3 class="title__small">Nổi bật</h3>
        <h3 class="title">Sản phẩm Khuyến mãi</h3>
        <div id="carousel-discount__products" class="owl-carousel owl-theme">
            <?php foreach ($data['discounts'] as $key => $discount) : ?>
                <div class="item">
                    <div class="best-seller__item">
                        <div class="best-seller_image">
                            <img src="<?= IMAGES_PRODUCT_URL . DS . $discount["image"] ?>" alt=" image" class="best-seller__item-image">
                            <!-- <p class="best-seller_circle"></p> -->

                        </div>

                        <h6 class="best-seller__item-info__name">
                            <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $discount['id'] ?> "><?= $discount["name"] ?></a>
                        </h6>
                        <div class="best-seller__item-info__prices" style="align-self: stretch; align-items: center;">
                            <div>
                                <div class="best-seller__item-info__original-price"><?= number_format($discount["price_discount"], 0, '', '.') ?>đ</div>
                                <div class="best-seller__item-info__price"><?= number_format($discount["price"], 0, '', '.') ?>đ</div>

                            </div>

                            <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $discount['id'] ?>)" class="btn btn--primary"><i class="fas fa-shopping-bag custom_cart"></i></button>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>
</section>


<div class="container sweeties noselect">
    <div class="name_category_product">

        <img src="<?= IMAGES_URL ?>/menu/munchkin-cat.png" alt="" class="image_category_product">
        <h3 class="title" id="cat">Sản phẩm dành cho mèo</h3>
    </div>

    <div class="sweeties__items">
        <?php foreach ($data["productOnlyPageCat"] as $key => $productOnlyPageCat) : ?>
            <div class="sweeties__item">
                <div class="sweeties__item--over-image">

                    <img src="<?= IMAGES_PRODUCT_URL . DS . $productOnlyPageCat['image'] ?>" alt="sweeties image" class="sweeties__item-image">
                    <p class="product_circle"></p>
                </div>
                <div class="sweeties__item-name">
                    <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $productOnlyPageCat['id'] ?> "><?= $productOnlyPageCat['name'] ?></a>
                </div>
                <div class="sweeties__item-prices">
                    <div class="sweeties__item__price"><?= number_format($productOnlyPageCat['price'], 0, '', '.') ?>đ</div>

                    <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $productOnlyPageCat['id'] ?>)" class="btn btn--secondary"><i class="fas fa-shopping-bag custom_cart"></i></button>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="paging-numbers">

        <a href="  <?= $data['currentPage'] == 1 ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] - 1) ?>">
            <svg class=" <?= $data['currentPage'] == 1 ? "cursor-default" : "paging-arrow" ?> " width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17.9402" r="16.5" transform="rotate(-180 17 17.9402)" stroke="#848484" />
                <path d="M12.2387 16.935L18.8388 11.1495C19.1571 10.8704 19.6732 10.8704 19.9915 11.1495L20.7613 11.8242C21.079 12.1028 21.0797 12.5543 20.7626 12.8335L15.5319 17.4402L20.7626 22.0469C21.0797 22.3261 21.079 22.7776 20.7613 23.0561L19.9915 23.7309C19.6732 24.0099 19.1571 24.0099 18.8388 23.7309L12.2387 17.9454C11.9204 17.6664 11.9204 17.214 12.2387 16.935Z" fill="#848484" />
            </svg>
        </a>

        <?php for ($i = 1; $i <= $data['pages']; $i++) : ?>

            <a <?= $i == $data['currentPage'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/Home" ?>?page=<?= $i ?>#cat">
                <div class="paging-number <?= $i == $data['currentPage'] ? "paging-number--active" : "" ?>">
                    <?= $i ?>
                </div>
            </a>

        <?php endfor; ?>


        <a href=" <?= $data['currentPage'] == $data['pages'] ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] + 1) ?>">
            <svg class=" <?= $data['currentPage'] == $data['pages'] ? "cursor-default" : "paging-arrow" ?>" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17" r="16.5" stroke="#848484" />
                <path d="M21.7613 18.0052L15.1612 23.7907C14.8429 24.0698 14.3268 24.0698 14.0085 23.7907L13.2387 23.1159C12.921 22.8374 12.9203 22.3859 13.2374 22.1067L18.4681 17.5L13.2374 12.8933C12.9203 12.6141 12.921 12.1626 13.2387 11.8841L14.0085 11.2093C14.3268 10.9302 14.8429 10.9302 15.1612 11.2093L21.7613 16.9948C22.0796 17.2738 22.0796 17.7262 21.7613 18.0052Z" fill="#848484" />
            </svg>
        </a>

    </div>
</div>

<!-- end wrapper product -->