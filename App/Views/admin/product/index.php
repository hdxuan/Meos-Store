<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý sản phẩm</h1>

            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT . "/admin" ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sản phẩm</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Tất cả sản phẩm</h3>
                            <a class="btn btn-primary" href="<?= DOCUMENT_ROOT . DS .  "admin/products/create" ?>">Thêm sản phẩm</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="width: 380px;">Tên sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['products'] as $key => $products) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $products['name'] ?></td>
                                        <td><?= $products['namept'] ?></td>
                                        <td><?= number_format($products['price'], 0, "", ".") ?>đ</td>
                                        <!-- <td><?= $products['size'] ?></td> -->
                                        <td> <img style="max-width: 100px;" class="rounded img-thumbnail" src="<?= IMAGES_PRODUCT_URL ?>/<?= $products['image'] ?>" alt="cake image"></td>
                                        <td>
                                            <div aria-label="Basic mixed styles example ">
                                                <a href="<?= DOCUMENT_ROOT ?> /admin/products/edit/<?= $products['id'] ?> " type="button" class="btn btn-info"><i class="fas fa-edit"> Edit</i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $products['id'] ?>"><i class="fas fa-trash-alt"> Delete</i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?= $products['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $products['id'] ?>" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel<?= $products['id'] ?>">Xác nhận xóa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn chắc chắn muốn xóa sản phầm này?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                                                <a href="<?= DOCUMENT_ROOT ?>/admin/products/delete/<?= $products['id'] ?>" class="btn btn-danger">Xóa</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->