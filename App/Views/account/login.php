<div class="page-content">
    <div class="form-v7-content">
        <div class="form-left">
            <img src="<?= IMAGES_URL . DS ?>/form-background.jpg" alt="form">
            <p class="text-1">Sign in</p>

        </div>
        <form action="<?= DOCUMENT_ROOT ?>/Account/login" method="post" id="myform" class="form-detail">
            <?php if (isset($data['error'])) : ?>
                <?php foreach ($data['error'] as $index => $error) : ?>
                    <p style="color: red;"> <?= $error ?> </p>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($data['message'])) : ?>
                <?php foreach ($data['message'] as $index => $message) : ?>
                    <p style="color: green;"> <?= $message ?> </p>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="form-row">
                <label for="your_email">E-MAIL</label>
                <input type="text" name="your_email" id="your_email" class="input-text">
            </div>

            <div class="form-row">
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password" class="input-text">
            </div>

            <div class="form-row-last">
                <input type="submit" name="signin" class="register" value="Sign in">
                <p>Or<a href="<?= DOCUMENT_ROOT ?>/Account/register">Register</a></p>
            </div>
        </form>
    </div>
</div>