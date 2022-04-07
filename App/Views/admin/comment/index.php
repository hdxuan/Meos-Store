<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý bình luận đánh giá</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT . "/admin" ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Bình luận đánh giá</li>
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
                        <?php require_once(VIEW . DS . "admin/shared/notification.php") ?>

                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Tất cả khách hàng</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã bình luận</th>
                                    <th style="width: 140px;">Tên khách hàng</th>
                                    <th style="width: 300px;">Tên sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Đánh giá</th>
                                    <th>Ngày bình luận</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['comments'] as $key => $comments) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $comments['id'] ?></td>
                                        <td><?= $comments['nameUser'] ?></td>
                                        <td><?= $comments['nameProduct'] ?></td>
                                        <td><?= $comments['content'] ?></td>
                                        <td><?= $comments['rank'] ?></td>
                                        <td><?= $comments['created_at'] ?></td>
                                        <td>
                                            <div role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $comments['id'] ?>"><i class="fas fa-trash-alt"> Xóa</i></button>


                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?= $comments['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $comments['id'] ?>" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel<?= $comments['id'] ?>">Xác nhận xóa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn chắc chắn muốn xóa bình luận <?= $comments['id'] ?> này?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                                                <a href="<?= DOCUMENT_ROOT ?>/admin/comments/delete/<?= $comments['id'] ?>" class="btn btn-danger">Xóa</a>

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