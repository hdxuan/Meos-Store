<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm sản phẩm mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm sản phẩm mới</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin sản phẩm</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/products/store" ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col">

                            <label for="category">Loại sản phẩm</label>
                            <select name="categoryId" class="form-control" id="category" required>
                                <option value="" disabled selected>Select one</option>
                                <?php foreach ($data['categories'] as $key => $categories) : ?>
                                    <option value="<?= $categories['id'] ?>"><?= $categories['name'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group col">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>

                        <div class="form-group col">
                            <label for="price">Giá</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ingredients">Thành phần</label>
                        <textarea name="ingredients" id="ingredients" class="form-control" cols="2" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="benerfits">Công dụng</label>
                        <textarea name="benerfits" id="benerfits" class="form-control" cols="2" rows="2"></textarea>
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