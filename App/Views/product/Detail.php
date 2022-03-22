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

            <div class="detail__items">
                <div>

                    <div class="detail__item-image">
                        <img src="<?= IMAGES_PRODUCT_URL ?>/<?= $detail['image'] ?>" alt="image">
                        <p class="detail__item-image__circle"></p>

                    </div>
                </div>

                <div class="detail__item-info">
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
                    <div class="detail__item-content">
                        <h2>Thành phần</h2>
                        <div class="detail__item-summary"> <?= $detail['ingredients'] ?> </div>
                    </div>

                    <div class="detail__item-content">
                        <h2>Công dụng</h2>
                        <div class="detail__item-summary"> <?= $detail['benerfits'] ?> </div>

                    </div>
                    <div class="row mb-4">
                        <p class="detail__item__price"><?= number_format($detail['price'], 0, '', '.') ?>đ</p>
                    </div>

                    <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $detail['id'] ?>)" class="btn btn--primary">Thêm vào giỏ +</button>
                    <a href="<?= DOCUMENT_ROOT ?>/Products/Dog" class="btn btn--primary">Tiếp tục mua sắm</a>


                </div>
            </div>
            <!-- đánh giá sản phẩm -->
            <div class="product_evaluation">

            </div>

            <!-- bình luận sản phẩm -->
            <div id="comment" class="info__product_items row">
                <div class="info__product_item--button col ">
                    <div class="info__button">
                        <p>Bình luận sản phẩm</p>
                    </div>

                </div>
                <div class="info__product_item--content">
                    <!-- show comment -->
                    <?php foreach ($data['comments'] as $index => $comment) : ?>
                        <div class="comment--item">
                            <img class="comment--item-image" src="<?= IMAGES_URL . "/uploads/avatar/" .  (empty($comment['avatar']) ? "default_avatar.png" : $comment['avatar']) ?> ">
                            <div class="comment--items-info">
                                <div class="comment--items-info_flex">

                                    <div class="comment--item-name">
                                        <?= $comment['name'] ?>
                                    </div>
                                    <div class="comment--item-date">
                                        <?= $comment['created_at'] ?>
                                    </div>
                                    <?php for ($i = 1; $i <= intval($comment['rank']); $i++) : ?>
                                        <div class="star-lists-items">
                                            <i class=" fa fa-star text-warning"></i>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <div class="comment--item-content">
                                    <?= $comment['content'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Phân trang -->
                    <!-- <nav aria-label="...">
                        <ul class="pagination pagination-lg justify-content-end">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav> -->

                    <form action="<?= DOCUMENT_ROOT . DS . "Products/comment" ?>" method="POST">
                        <input type="hidden" name="idProduct" value="<?= $detail['id'] ?>">

                        <div class="form__comments">
                            <div class="form__comments-comment">
                                <img class="form__comment-image" src="<?= IMAGES_URL . "/uploads/avatar/" .  (empty($comment['avatar']) ? "default_avatar.png" : $comment['avatar']) ?>" alt="">
                                <textarea name="comments" id="" cols="15" rows="2" placeholder="Viết bình luận..."></textarea>
                            </div>

                            <div class="form__comments-ranking">
                                <p>Bạn cảm thấy sản phẩm này như thế nào?</p>
                                <div class="star-lists">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <div class="star-lists-items">
                                            <label onClick="rank(<?= $i ?>)" for="<?= "Rank" . $i ?>"><i id="Star<?= $i ?>" class=" fa fa-star-o star-list__item text-warning"></i></label>
                                            <input hidden id="<?= "Rank" . $i ?>" type="radio" name="rank" value="<?= $i ?>" />
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary">Gửi đánh giá</button>
                    </form>

                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="related__products">
        <h3 class="title">Sản phẩm liên quan</h3>
        <div class="related__products_item">
            <div class="owl-carousel owl-theme">
                <?php foreach ($data['RelatedProducts'] as $key => $RelatedProducts) : ?>
                    <div class="item">
                        <div class="best-seller__item">
                            <div class="best-seller_image">
                                <img src="<?= IMAGES_PRODUCT_URL . DS . $RelatedProducts["image"] ?>" alt=" image" class="best-seller__item-image">
                                <p class="best-seller_circle"></p>

                            </div>

                            <h6 class="best-seller__item-info__name">
                                <a href=" <?= DOCUMENT_ROOT . DS . "Products/Detail?productId=" . $RelatedProducts['id'] ?> "><?= $RelatedProducts["name"] ?></a>
                            </h6>
                            <div class="best-seller__item-info__prices">

                                <div class="best-seller__item-info__price"><?= number_format($RelatedProducts["price"], 0, '', '.') ?>đ</div>

                                <button onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>,<?= $RelatedProducts['id'] ?>)" class="btn btn--primary"><i class="fas fa-shopping-bag custom_cart"></i></button>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<script>
    function rank(number) {
        for (let i = 1; i <= 5; i++) {

            const star = document.getElementById("Star" + i);
            if (i <= number) {
                star.classList.remove("fa-star-o");
                if (!star.classList.contains("fa-star")) {
                    star.classList.add("fa-star");
                }
            } else {
                star.classList.remove("fa-star");
                if (!star.classList.contains("fa-star-o")) {
                    star.classList.add("fa-star-o");
                }
            }
        }
    }
</script>