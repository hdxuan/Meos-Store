<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật khuyến mãi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cập nhật khuyến mãi</li>
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
            <form action="<?= DOCUMENT_ROOT . "/admin/discounts/update/" . $data['discounts']['id'] ?>" method="POST">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col">
                            <label for="nameDiscount">Tên chương trình</label>
                            <input value="<?= $data['discounts']['name'] ?>" type="text" class="form-control" name="nameDiscount" id="nameDiscount">
                        </div>
                        <div class="form-group col">
                            <label for="priceDiscount">Mức giảm</label>
                            <input value="<?= $data['discounts']['discount'] ?>" type="text" class="form-control" name="priceDiscount" id="priceDiscount">
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col">
                            <label for="start_time">Ngày bắt đầu </label>
                            <input value="<?= $data['discounts']['start_time'] ?>" type="datetime-local" name="start_time" class="form-control" id="start_time">
                        </div>

                        <div class="form-group col">
                            <label for="end_time">Ngày kết thúc</label>
                            <input value="<?= $data['discounts']['end_time'] ?>" type="datetime-local" name="end_time" class="form-control" id="end_time">
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