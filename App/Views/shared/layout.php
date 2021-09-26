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

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/bootstrap-5.0.2-dist/css/bootstrap.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/reset.css" />
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/base.css" />
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/header.css" />
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/footer.css" />

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/home.css" />

</head>

<body>
    <?php require_once(VIEW . '/shared/header.php') ?>
    <?php require_once(VIEW . $view . ".php") ?>
    <?php require_once(VIEW . '/shared/footer.php') ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script type="text/javascript" src="/js/app.js"></script> -->
    <script type="text/javascript" src="./public/js/slider.js"></script>
    <!-- <script type="text/javascript" src="/js/cart.js"></script> -->

</body>


</html>