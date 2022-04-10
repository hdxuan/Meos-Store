<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm khuyến mãi mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm khuyến mãi mới</li>
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
                <h3 class="card-title">Thông tin khuyến mãi</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/discounts/store" ?>" method="POST">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col">
                            <label for="nameDiscount">Tên khuyến mãi</label>
                            <input type="text" name="nameDiscount" class="form-control" id="nameDiscount" required>
                        </div>

                        <div class="form-group col">
                            <label for="priceDiscount">Mức khuyến mãi</label>
                            <input type="text" class="form-control" name="priceDiscount" id="priceDiscount" required>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="start_time">Ngày bắt đầu</label>
                        <input id="start_time" name="start_time" type="datetime-local" required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">Ngày kết thúc</label>
                        <input id="end_time" name="end_time" type="datetime-local" required>

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