<div class="wrapper noselect">
    <div class="container sweeties">
        <h3 class="title">Cakes</h3>

        <div class="sweeties__items">
            <?php foreach ($data['paging'] as $index => $paging) : ?>
                <div class="sweeties__item">
                    <img src="<?= IMAGES_CAKES_URL ?>/<?= $paging['image'] ?>" alt="sweeties image" class="sweeties__item-image">
                    <div class="sweeties__item-name">
                        <a href="#\"><?= $paging['name'] ?></a>
                    </div>
                    <div class="sweeties__item-prices">
                        <div class="sweeties__item__price"><?= number_format($paging['price'], 0, '', '.') ?>đ</div>
                        <div class="sweeties__item__original-price"><?= number_format($paging['price'], 0, '', '.') ?>đ</div>
                    </div>
                    <button class="btn btn--secondary">Add to cart +</button>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="paging-numbers">
            <!-- left arrow svg -->
            <a href="  <?= $data['currentPage'] == 1 ? "#/" : DOCUMENT_ROOT . "/Cakes?page=" . ($data['currentPage'] - 1) ?>">
                <svg class=" <?= $data['currentPage'] == 1 ? "cursor-default" : "paging-arrow" ?> " width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17" cy="17.9402" r="16.5" transform="rotate(-180 17 17.9402)" stroke="#848484" />
                    <path d="M12.2387 16.935L18.8388 11.1495C19.1571 10.8704 19.6732 10.8704 19.9915 11.1495L20.7613 11.8242C21.079 12.1028 21.0797 12.5543 20.7626 12.8335L15.5319 17.4402L20.7626 22.0469C21.0797 22.3261 21.079 22.7776 20.7613 23.0561L19.9915 23.7309C19.6732 24.0099 19.1571 24.0099 18.8388 23.7309L12.2387 17.9454C11.9204 17.6664 11.9204 17.214 12.2387 16.935Z" fill="#848484" />
                </svg>
            </a>
            <!-- end left arrow svg -->
            <?php for ($i = 1; $i <= $data['pages']; $i++) : ?>

                <a <?= $i == $data['currentPage'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/Cakes" ?>?page=<?= $i ?>">
                    <div class="paging-number <?= $i == $data['currentPage'] ? "paging-number--active" : "" ?>">
                        <?= $i ?>
                    </div>
                    <!-- paging-number--active để này dô khi check page -->
                </a>

            <?php endfor; ?>

            <!-- right arrow svg -->
            <a href=" <?= $data['currentPage'] == $data['pages'] ? "#/" : DOCUMENT_ROOT . "/Cakes?page=" . ($data['currentPage'] + 1) ?>">
                <svg class=" <?= $data['currentPage'] == $data['pages'] ? "cursor-default" : "paging-arrow" ?>" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17" cy="17" r="16.5" stroke="#848484" />
                    <path d="M21.7613 18.0052L15.1612 23.7907C14.8429 24.0698 14.3268 24.0698 14.0085 23.7907L13.2387 23.1159C12.921 22.8374 12.9203 22.3859 13.2374 22.1067L18.4681 17.5L13.2374 12.8933C12.9203 12.6141 12.921 12.1626 13.2387 11.8841L14.0085 11.2093C14.3268 10.9302 14.8429 10.9302 15.1612 11.2093L21.7613 16.9948C22.0796 17.2738 22.0796 17.7262 21.7613 18.0052Z" fill="#848484" />
                </svg>
            </a>
            <!-- end right arrow svg -->
        </div>
    </div>
</div>