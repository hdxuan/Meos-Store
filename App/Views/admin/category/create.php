<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm loại sản phẩm mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm loại sản phẩm mới</li>
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
                <h3 class="card-title">Thông tin loại sản phẩm</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/categories/store" ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Loại thú cưng</label>
                        <select name="petTypeId" class="form-control" id="petTypeId" required>
                            <option value="" disabled selected>Select one</option>
                            <?php foreach ($data['petType'] as $key => $petType) : ?>
                                <option value="<?= $petType['id'] ?>"><?= $petType['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input type="file" id="image" name="image" required>

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