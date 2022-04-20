<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm nhân viên mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm nhân viên mới</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <?php require_once(VIEW . DS . "admin/shared/notification.php") ?>
            <div class="card-header">
                <h3 class="card-title">Thông tin nhân viên</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/staff/store" ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Tên nhân viên</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                        </div>
                        <div class="form-group col">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col">
                            <label for="passwd">Password</label>
                            <input type="text" class="form-control" id="passwd" name="passwd" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary px-3" style="font-size: 1.18rem;">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</section>
<!-- /.content -->