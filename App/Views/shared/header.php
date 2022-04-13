<div id="voice-recognite-screen" class="voice-recognite">
    <div class="d-flex align-items-center">
        <p style="margin-right: 20px" class="pulsate">Đang nhận diện giọng nói...</p>
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <button id="stop-btn" style="margin-left: 20px" class="mr-5 btn btn--secondary">Stop</button>
</div>
<!-- wrapper header -->
<div class="container-fluid ">
    <div class="container">
        <header class="header ">
            <a href="<?= DOCUMENT_ROOT ?>" class="header__logo">
                <img src="<?= IMAGES_URL ?>/logo.png" alt="logo">
            </a>
            <nav class="header__menu noselect">
                <a href="<?= DOCUMENT_ROOT ?>" class="header__menu__item">Trang chủ</a>
                <a href="<?= DOCUMENT_ROOT ?>/Products/Dog" class="header__menu__item">Shop cho Chó</a>
                <a href="<?= DOCUMENT_ROOT ?>/Products/Cat" class="header__menu__item">Shop cho Mèo</a>
            </nav>

            <div class="header__search">
                <form action="<?= DOCUMENT_ROOT ?>/Products/search" method="GET">
                    <button class="header__search__button noselect">
                        <img src="<?= ICONS_URL ?>/search.png" alt="icon search">
                    </button>
                    <input type="text" placeholder="Tìm kiếm..." name="key" id="search">
                    <div class="mic_search">
                        <svg class="goxjub" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#4285f4" d="m12 15c1.66 0 3-1.31 3-2.97v-7.02c0-1.66-1.34-3.01-3-3.01s-3 1.34-3 3.01v7.02c0 1.66 1.34 2.97 3 2.97z"></path>
                            <path fill="#34a853" d="m11 18.08h2v3.92h-2z"></path>
                            <path fill="#fbbc04" d="m7.05 16.87c-1.27-1.33-2.05-2.83-2.05-4.87h2c0 1.45 0.56 2.42 1.47 3.38v0.32l-1.15 1.18z"></path>
                            <path fill="#ea4335" d="m12 16.93a4.97 5.25 0 0 1 -3.54 -1.55l-1.41 1.49c1.26 1.34 3.02 2.13 4.95 2.13 3.87 0 6.99-2.92 6.99-7h-1.99c0 2.92-2.24 4.93-5 4.93z"></path>
                        </svg>
                    </div>
                </form>
            </div>

            <div class="header__info">
                <div class="header__cart noselect">
                    <a href="<?= isset($_SESSION['user']['id'])  ? DOCUMENT_ROOT . "/Cart" : "#" ?>"><img src="<?= ICONS_URL ?>/cart.svg" alt="icon cart"></a>
                    <span id="cartAmount" class="header__cart__amount">0</span>
                </div>

                <?php if (isset($_SESSION['user'])) : ?>
                    <div class="header__user noselect">
                        <div class="header__user__avatar ">
                            <img src="<?= IMAGES_URL . "/uploads/avatar/" .  (empty($_SESSION['user']['avatar']) ? "default_avatar.png" : $_SESSION['user']['avatar']) ?>" alt="user avatar">
                            <div class="header__user__dropdown ">
                                <ul>
                                    <li><a href="<?= DOCUMENT_ROOT ?>/Profile">Trang cá nhân</a></li>
                                    <li><a href="<?= DOCUMENT_ROOT ?>/Cart">Giỏ hàng</a></li>
                                    <li><a href="<?= DOCUMENT_ROOT . "/Account/logOut" ?>">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="<?= DOCUMENT_ROOT ?>/account"><button class="btn btn--primary">Đăng nhập</button></a>

                <?php endif; ?>


                <label for="nav-mobile__button">
                    <img class="nav-mobile__icon" src="<?= ICONS_URL ?>/menu-mobile.svg" alt="menu bar" />
                </label>

            </div>
        </header>

        <input hidden type="checkbox" name="nav" class="nav-mobile__button" id="nav-mobile__button" />

        <label for="nav-mobile__button" class="overlay"> </label>
        <nav class="nav-mobile noselect">
            <label for="nav-mobile__button" class="nav-mobile__close">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="92.132px" height="92.132px" viewBox="0 0 92.132 92.132" style="enable-background: new 0 0 92.132 92.132" xml:space="preserve">
                    <g>
                        <g>
                            <path fill="#f3455a" d="M2.141,89.13c1.425,1.429,3.299,2.142,5.167,2.142c1.869,0,3.742-0.713,5.167-2.142l33.591-33.592L79.657,89.13
    c1.426,1.429,3.299,2.142,5.167,2.142c1.867,0,3.74-0.713,5.167-2.142c2.854-2.854,2.854-7.48,0-10.334L56.398,45.205
    l31.869-31.869c2.855-2.853,2.855-7.481,0-10.334c-2.853-2.855-7.479-2.855-10.334,0L46.065,34.87L14.198,3.001
    c-2.854-2.855-7.481-2.855-10.333,0c-2.855,2.853-2.855,7.481,0,10.334l31.868,31.869L2.143,78.795
    C-0.714,81.648-0.714,86.274,2.141,89.13z" />
                        </g>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
            </label>
            <nav class="nav-mobile__items">
                <ul>
                    <li class="nav-mobile__link"><a href="#\">Trang chủ</a></li>
                    <li class="nav-mobile__link"><a href="#\">Sản phẩm</a></li>
                    <li class="nav-mobile__link"><a href="#\">Blogs</a></li>
                    <li class="nav-mobile__link"><a href="#\">Dịch vụ</a></li>
                    <li class="nav-mobile__link"><a href="#\">Trang cá nhân</a></li>
                    <li class="nav-mobile__link"><a href="#\">Giỏ hàng</a></li>
                    <li class="nav-mobile__link"><a href="#\">Đăng xuất</a></li>
                </ul>
            </nav>
        </nav>

    </div>
</div>
<!-- end wrapper header -->

<script>
    class SpeechRecognitionApi {
        constructor(options) {
            const SpeechToText = window.speechRecognition || window.webkitSpeechRecognition;
            this.speechApi = new SpeechToText();
            this.speechApi.continuous = true;
            this.speechApi.interimResults = false;
            this.output = options.output ? options.output : document.createElement('div');
            this.speechApi.onresult = (event) => {
                var resultIndex = event.resultIndex;
                var transcript = event.results[resultIndex][0].transcript;
                this.output.value = transcript;
            }
        }
        init() {
            this.speechApi.start();
        }
        stop() {
            this.speechApi.stop();
        }
    }

    window.onload = function() {
        var speech = new SpeechRecognitionApi({
            output: document.querySelector('#search')
        })

        document.querySelector('.mic_search').addEventListener('click', function() {
            const voiceRecogniteScreen = document.getElementById("voice-recognite-screen");
            if (voiceRecogniteScreen) {
                voiceRecogniteScreen.classList.toggle("show");
                speech.init()
            }
        })

        document.querySelector('#stop-btn').addEventListener('click', function() {
            const voiceRecogniteScreen = document.getElementById("voice-recognite-screen");
            if (voiceRecogniteScreen) {
                voiceRecogniteScreen.classList.toggle("show");
                speech.stop()
            }
        })

    }
</script>