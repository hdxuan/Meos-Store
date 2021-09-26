<div class="page-content">
    <div class="form-v7-content">
        <div class="form-left">
            <img src="	https://colorlib.com/etc/regform/colorlib-regform-2/images/bg-heading-02.jpg" alt="form">
            <p class="text-1">Register</p>

        </div>

        <form action="<?= DOCUMENT_ROOT ?>/Account/signup" method="post" id="myform" class="form-detail">

            <div class="form-row">

                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username" class="input-text">
            </div>
            <div class="form-row">
                <label for="your_email">E-MAIL</label>
                <input type="text" name="your_email" id="your_email" class="input-text">
            </div>
            <div class="form-row">
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password" class="input-text">
            </div>
            <div class="form-row">
                <label for="confirm_password">CONFIRM PASSWORD</label>
                <input type="password" name="confirm_password" id="confirm_password" class="input-text">
            </div>
            <div class="form-row-last">
                <input type="submit" name="register" class="register" value="Register">
                <p>Or<a href="<?= DOCUMENT_ROOT ?>/Account">Sign in</a></p>
            </div>
        </form>
    </div>
</div>