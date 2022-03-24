<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật loại sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cập nhật loại sản phẩm</li>
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
            <form action="<?= DOCUMENT_ROOT . "/admin/categories/update/" . $data['category']['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col">
                            <label for="name">Tên loại sản phẩm</label>
                            <input value="<?= $data['category']['name'] ?>" type="text" class="form-control" name="name" id="name" placeholder="Tên loại sản phẩm">
                        </div>
                        <div class="form-group col">

                            <label for="petTypeId">Loại thú cưng</label>
                            <select name="petTypeId" class="form-control" id="petTypeId">
                                <?php foreach ($data['petType'] as $key => $petType) : ?>
                                    <option <?= $data['category']['id_pet_products_type'] == $petType['id'] ? "selected" : "" ?> value="<?= $petType['id'] ?> "><?= $petType['name'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="image">Hình ảnh</label>
                        <input type="file" class="" id="image" name="image">
                        <div>
                            <input type="text" hidden name="oldImage" value="<?= $data['category']['image'] ?>">
                            <img style="max-width: 200px;" class="rounded img-thumbnail" src="<?= IMAGES_MENU_URL . DS . $data['category']['image'] ?>" alt="image cake">
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