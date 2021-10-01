<!-- wrapper banner -->
<div class="container-fluid banner">
    <img src="<?= IMAGES_URL ?>/banner.jpg" alt="banner">

</div>
<!-- end wrapper banner -->

<!-- wrapper products -->
<section class="container category">
    <h3 class="title">Shop cho thú cưng</h3>
    <ul class="category__items noselect">
        <a href="#\">
            <li class="category__item dog__category">
                <img src="<?= IMAGES_URL ?>/21.png" alt="category image" class="category__item-image">
            </li>
            <div class="category__item-name">Shop cho cún</div>
        </a>
        <a href="#\">
            <li class="category__item cat__category">
                <img src="<?= IMAGES_URL ?>/16.png" alt="category image" class="category__item-image">
            </li>
            <div class="category__item-name">Shop cho mèo</div>
        </a>
        <a href="#\">
            <li class="category__item services">
                <img src="<?= IMAGES_URL ?>/22.png" alt="category image" class="category__item-image">
            </li>
            <div class="category__item-name">Dịch vụ</div>
        </a>
    </ul>
</section>
<!-- end wrapper products -->

<section class="container-fluid best-seller-background">
    <section class="container best-seller noselect">
        <h3 class="title">Sản phẩm bán chạy</h3>
        <div class="owl-carousel owl-theme">
            <?php foreach ($data['bestSellers'] as $key => $bestSellers) : ?>
                <div class="item">
                    <div class="best-seller__items">

                        <div class="best-seller_image">
                            <img src="<?= IMAGES_PRODUCT_URL . DS . $bestSellers["image"] ?>" alt="cake image" class="best-seller__item-image">
                        </div>
                        <div class="best-seller__item-info " id="content">
                            <h6 class="best-seller__item-info__name"><?= $bestSellers["name"] ?></h6>
                            <div class="best-seller__item-info__price"><?= number_format($bestSellers["price"], 0, '', '.') ?>đ</div>
                            <button class="btn btn--primary">Add to cart +</button>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>
</section>

<!-- end wrapper best seller -->

<!-- wrapper product -->
<div class="noselect">
    <div class="container sweeties">
        <h3 class="title">Các sản phẩm</h3>

        <div class="sweeties__items">
            <?php foreach ($data["productOnlyPage"] as $key => $productOnlyPage) : ?>
                <div class="sweeties__item">

                    <img src="<?= IMAGES_PRODUCT_URL . DS . $productOnlyPage['image'] ?>" alt="sweeties image" class="sweeties__item-image">
                    <div class="sweeties__item-name">
                        <a href="#\"><?= $productOnlyPage['name'] ?></a>
                    </div>
                    <div class="sweeties__item-prices">
                        <div class="sweeties__item__price"><?= number_format($productOnlyPage['price'], 0, '', '.') ?>đ</div>

                        <div class="sweeties__item__original-price">Lượt mua</div>
                    </div>
                    <button class="btn btn--secondary">Add to cart +</button>

                </div>
            <?php endforeach; ?>
        </div>

        <div class="paging-numbers">
            <!-- left arrow svg -->
            <a href="  <?= $data['currentPage'] == 1 ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] - 1) ?>">
                <svg class=" <?= $data['currentPage'] == 1 ? "cursor-default" : "paging-arrow" ?> " width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17" cy="17.9402" r="16.5" transform="rotate(-180 17 17.9402)" stroke="#848484" />
                    <path d="M12.2387 16.935L18.8388 11.1495C19.1571 10.8704 19.6732 10.8704 19.9915 11.1495L20.7613 11.8242C21.079 12.1028 21.0797 12.5543 20.7626 12.8335L15.5319 17.4402L20.7626 22.0469C21.0797 22.3261 21.079 22.7776 20.7613 23.0561L19.9915 23.7309C19.6732 24.0099 19.1571 24.0099 18.8388 23.7309L12.2387 17.9454C11.9204 17.6664 11.9204 17.214 12.2387 16.935Z" fill="#848484" />
                </svg>
            </a>
            <!-- end left arrow svg -->
            <?php for ($i = 1; $i <= $data['pages']; $i++) : ?>

                <a <?= $i == $data['currentPage'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/Home" ?>?page=<?= $i ?>">
                    <div class="paging-number <?= $i == $data['currentPage'] ? "paging-number--active" : "" ?>">
                        <?= $i ?>
                    </div>
                    <!-- paging-number--active để này dô khi check page -->
                </a>

            <?php endfor; ?>

            <!-- right arrow svg -->
            <a href=" <?= $data['currentPage'] == $data['pages'] ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] + 1) ?>">
                <svg class=" <?= $data['currentPage'] == $data['pages'] ? "cursor-default" : "paging-arrow" ?>" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17" cy="17" r="16.5" stroke="#848484" />
                    <path d="M21.7613 18.0052L15.1612 23.7907C14.8429 24.0698 14.3268 24.0698 14.0085 23.7907L13.2387 23.1159C12.921 22.8374 12.9203 22.3859 13.2374 22.1067L18.4681 17.5L13.2374 12.8933C12.9203 12.6141 12.921 12.1626 13.2387 11.8841L14.0085 11.2093C14.3268 10.9302 14.8429 10.9302 15.1612 11.2093L21.7613 16.9948C22.0796 17.2738 22.0796 17.7262 21.7613 18.0052Z" fill="#848484" />
                </svg>
            </a>
            <!-- end right arrow svg -->
        </div>
    </div>
</div>
<!-- end wrapper product -->

<!-- wrapper blogs -->
<div class="container blog">
    <h3 class="title">Blog về thú cưng của bạn</h3>

    <div class="blog__items">

        <div class="blog__item blog1">
            <p class="blog__date">20 tháng 8, 2021</p>
            <a href="#">
                <p class="blog__description">Giảm Bạch Cầu Ở Mèo - Nguyên Nhân Và Cách Điều Trị</p>
            </a>
            <img src="<?= IMAGES_BLOG_URL ?>/2.png" alt="" class="blog__image1">
        </div>

        <div class="blog__list">
            <div class="blog__list--item blog2">
                <img src="<?= IMAGES_BLOG_URL ?>/5.png" alt="" class="blog__image2">
            </div>

            <div class="blog__list--item blog3">
                <img src="<?= IMAGES_BLOG_URL ?>/4.png" alt="" class="blog__image3">
            </div>
        </div>

        <div class="blog__info">
            <div class="blog__info--item">
                <p class="blog__date">20 tháng 8, 2021</p>
                <a href="#">
                    <p class="blog__description">Những Loại Thức Ăn Hạt Cho Chó Được Yêu Thích Nhất</p>
                </a>
            </div>
            <div class="blog__info--item">
                <p class="blog__date">20 tháng 8, 2021</p>
                <a href="#">
                    <p class="blog__description">Nhận Nuôi Chó Mèo Ở Đâu? - Giải Đáp Nhanh Thắc Mắc Cho Bạn</p>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- end wrapper blogs -->