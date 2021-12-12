<!-- wrapper banner -->
<div class="container-fluid banner">
    <img src="<?= IMAGES_URL ?>/1.jpg" alt="banner">

</div>
<!-- end wrapper banner -->

<!-- wrapper products -->
<section class="container category">
    <div class="category__items noselect">
        <div class="category__item">
            <img src="<?= IMAGES_URL ?>/dog.jpg" alt="category image" class="category__item-image">
            <a href="<?= DOCUMENT_ROOT ?>/Products/Dog">
                <div class="category__item-name">Shop cho chó</div>
            </a>
        </div>
        <div class="category__item">
            <img src="<?= IMAGES_URL ?>/cat.jpg" alt="category image" class="category__item-image">

            <a href="<?= DOCUMENT_ROOT ?>/Products/Cat">
                <div class="category__item-name">Shop cho mèo</div>
            </a>
        </div>
        <div class="category__item">
            <img src="<?= IMAGES_URL ?>/food.png" alt="category image" class="category__item-image">

            <a href="<?= DOCUMENT_ROOT ?>/Products/Dog">
                <div class="category__item-name">Thức ăn</div>
            </a>
        </div>


    </div>
</section>
<!-- end wrapper products -->

<section class="container-fluid best-seller-background">
    <section class="container best-seller noselect">
        <h3 class="title__small">Nỗi bật</h3>
        <h3 class="title">Sản phẩm bán chạy</h3>
        <div class="owl-carousel owl-theme">
            <?php foreach ($data['bestSellers'] as $key => $bestSellers) : ?>
                <div class="item">
                    <div class="best-seller__item">
                        <div class="best-seller_image">
                            <img src="<?= IMAGES_PRODUCT_URL . DS . $bestSellers["image"] ?>" alt=" image" class="best-seller__item-image">
                            <p class="best-seller_circle"></p>

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
    <h3 class="title__small">Mới nhất</h3>
    <h3 class="title" id="SP">Sản phẩm</h3>

    <div class="sweeties__items">
        <?php foreach ($data["productOnlyPage"] as $key => $productOnlyPage) : ?>
            <div class="sweeties__item">
                <div class="sweeties__item--over-image">

                    <img src="<?= IMAGES_PRODUCT_URL . DS . $productOnlyPage['image'] ?>" alt="sweeties image" class="sweeties__item-image">
                    <p class="product_circle"></p>
                </div>
                <div class="sweeties__item-name">
                    <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $productOnlyPage['id'] ?> "><?= $productOnlyPage['name'] ?></a>
                </div>
                <div class="sweeties__item-prices">
                    <div class="sweeties__item__price"><?= number_format($productOnlyPage['price'], 0, '', '.') ?>đ</div>

                    <!-- <div class="sweeties__item__original-price">Lượt mua</div> -->
                    <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $productOnlyPage['id'] ?>)" class="btn btn--secondary"><i class="fas fa-shopping-bag custom_cart"></i></button>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <!-- <div class="paging-numbers">
        
        <a href="  <?= $data['currentPage'] == 1 ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] - 1) ?>">
            <svg class=" <?= $data['currentPage'] == 1 ? "cursor-default" : "paging-arrow" ?> " width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17.9402" r="16.5" transform="rotate(-180 17 17.9402)" stroke="#848484" />
                <path d="M12.2387 16.935L18.8388 11.1495C19.1571 10.8704 19.6732 10.8704 19.9915 11.1495L20.7613 11.8242C21.079 12.1028 21.0797 12.5543 20.7626 12.8335L15.5319 17.4402L20.7626 22.0469C21.0797 22.3261 21.079 22.7776 20.7613 23.0561L19.9915 23.7309C19.6732 24.0099 19.1571 24.0099 18.8388 23.7309L12.2387 17.9454C11.9204 17.6664 11.9204 17.214 12.2387 16.935Z" fill="#848484" />
            </svg>
        </a>
        
        <?php for ($i = 1; $i <= $data['pages']; $i++) : ?>

            <a <?= $i == $data['currentPage'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/Home" ?>?page=<?= $i ?>#SP">
                <div class="paging-number <?= $i == $data['currentPage'] ? "paging-number--active" : "" ?>">
                    <?= $i ?>
                </div>
                paging-number--active để này dô khi check page 
            </a>

        <?php endfor; ?>

       
        <a href=" <?= $data['currentPage'] == $data['pages'] ? "#/" : DOCUMENT_ROOT . "/Home?page=" . ($data['currentPage'] + 1) ?>">
            <svg class=" <?= $data['currentPage'] == $data['pages'] ? "cursor-default" : "paging-arrow" ?>" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17" r="16.5" stroke="#848484" />
                <path d="M21.7613 18.0052L15.1612 23.7907C14.8429 24.0698 14.3268 24.0698 14.0085 23.7907L13.2387 23.1159C12.921 22.8374 12.9203 22.3859 13.2374 22.1067L18.4681 17.5L13.2374 12.8933C12.9203 12.6141 12.921 12.1626 13.2387 11.8841L14.0085 11.2093C14.3268 10.9302 14.8429 10.9302 15.1612 11.2093L21.7613 16.9948C22.0796 17.2738 22.0796 17.7262 21.7613 18.0052Z" fill="#848484" />
            </svg>
        </a>
       
    </div> -->
</div>

<!-- end wrapper product -->

<!-- wrapper blogs -->
<!-- <div class="container blog">
    <h3 class="title__small">Tin mới & blog</h3>
    <h3 class="title">Về thú cưng của bạn</h3>

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
</div> -->
<!-- end wrapper blogs -->