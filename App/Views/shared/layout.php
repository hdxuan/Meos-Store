<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Méo's Store</title>

    <link rel="icon" href="<?= ICONS_URL ?>/logo.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d50b0eee6e.js" crossorigin="anonymous"></script>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <?php if (strpos($view, 'login') !== false || strpos($view, 'register') !== false) : ?>

        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/login.css" />



    <?php else : ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="<?= PUBLIC_URL ?>/bootstrap-5.0.2/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/owlcarousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/reset.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/base.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/header.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/footer.css" />

        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/home.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/product.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/detail.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/cart.css" />
        <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/profile.css" />
    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<?php if (strpos($view, 'login') !== false || strpos($view, 'register') !== false) : ?>

    <body class="form-v7">
        <?php require_once(VIEW . $view . ".php") ?>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script type="text/javascript" src="<?= PUBLIC_URL ?>/js/register-validate.js"></script>
    </body>

<?php else : ?>

    <body>
        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat Plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "109952311685388");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v13.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div id="toast">
            <div id="img"><i class="fas fa-paw icon_toast"></i></div>
            <div id="desc">Thông báo</div>
        </div>

        <!-- ajax -->
        <p hidden id="documentRoot"> <?= DOCUMENT_ROOT ?></p>
        <?php require_once(VIEW . '/shared/header.php') ?>
        <?php require_once(VIEW . $view . ".php") ?>
        <?php require_once(VIEW . '/shared/footer.php') ?>

        <script src="<?= PUBLIC_URL ?>/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?= PUBLIC_URL ?>/js/slider.js"></script>
        <script src="<?= PUBLIC_URL ?>/js/cart.js"></script>
        <script src="<?= PUBLIC_URL ?>/js/profile.js"></script>


    </body>
<?php endif; ?>

</html>