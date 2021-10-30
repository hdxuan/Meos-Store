<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="<?= PUBLIC_URL . "/admin/login/images" ?>/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Quản lý <strong>Méo Store</strong></h3>
                            <p class="mb-4">Đăng nhập bằng tài khoản admin để vào trang quản lý.</p>
                        </div>
                        <form action="<?= DOCUMENT_ROOT ?>/admin/login/checkAdmin" method="POST">
                            <span class="font-weight-bold text-danger">
                                <?php echo isset($_SESSION['errorAdmin']) ? $_SESSION['errorAdmin'] : " ";
                                unset($_SESSION['errorAdmin']) ?>
                            </span>


                            <div class="form-group first">
                                <label for="username">Tài khoản email</label><br><br><br>
                                <input name="email" type="text" class="form-control" id="username" placeholder="Email">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Mật khẩu</label><br><br><br>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Mật khẩu">

                            </div>

                            <input type="submit" value="Đăng nhập" class="btn text-white btn-block btn-primary">


                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- login -->
<script src="<?= PUBLIC_URL . "/admin" ?>/login/js/jquery-3.3.1.min.js"></script>
<script src="<?= PUBLIC_URL . "/admin" ?>/login/js/popper.min.js"></script>
<script src="<?= PUBLIC_URL . "/admin" ?>/login/js/bootstrap.min.js"></script>
<script src="<?= PUBLIC_URL . "/admin" ?>/login/js/main.js"></script>