<div class="page-content">
    <div class="form-v7-content">
        <div class="form-left">
            <img src="<?= IMAGES_URL . DS ?>/form-background.jpg" alt="form">
            <p class="text-1">Đăng ký</p>

        </div>

        <form action="<?= DOCUMENT_ROOT ?>/Account/signUp" method="post" id="myform" class="form-detail">

            <div class="form-row">

                <label for="username">TÊN ĐĂNG KÝ</label>
                <input type="text" name="username" id="username" class="input-text">
            </div>
            <div class="form-row">
                <label for="your_email">E-MAIL</label>
                <input type="text" name="your_email" id="your_email" class="input-text">
            </div>
            <div class="form-row">
                <label for="password">MẬT KHẨU</label>
                <input type="password" name="password" id="password" class="input-text">
            </div>
            <div class="form-row">
                <label for="confirm_password">XÁC NHẬN MẬT KHẨU</label>
                <input type="password" name="confirm_password" id="confirm_password" class="input-text">
            </div>
            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="Đăng ký">
                <p>hoặc<a href="<?= DOCUMENT_ROOT ?>/Account">Đăng nhập</a></p>
            </div>
        </form>
    </div>
</div>