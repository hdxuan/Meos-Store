<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật thông tin nhân viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cập nhật thông tin nhân viên</li>
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
                <h3 class="card-title">Thông tin thông tin nhân viên</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/staff/update/" . $data['idAdmin']['iduser'] ?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Tên nhân viên</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $data['idAdmin']['name'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?= $data['idAdmin']['address'] ?>">
                        </div>
                        <div class="form-group col">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="<?= $data['idAdmin']['phone'] ?>">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $data['idAdmin']['email'] ?>">
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