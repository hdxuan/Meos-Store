<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm sản phẩm mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/cakes">Cakes</a></li>
                    <li class="breadcrumb-item active">Create</li>
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

                            <label for="category">Loại từng sản phẩm</label>
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
                        <label for="description">Thành phần</label>
                        <textarea name="description" id="description" class="form-control" cols="2" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Công dụng</label>
                        <textarea name="description" id="description" class="form-control" cols="2" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" required>
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</section>
<!-- /.content -->