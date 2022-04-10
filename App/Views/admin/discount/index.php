<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý khuyến mãi</h1>

            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT . "/admin" ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Khuyến mãi</li>
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
                            <h3 class="card-title">Tất cả khuyến mãi</h3>
                            <a class="btn btn-primary" href="<?= DOCUMENT_ROOT . DS .  "admin/discounts/create" ?>">Thêm khuyến mãi</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên chương trình</th>
                                    <th style="width: 120px;">Mã khuyến mãi</th>
                                    <th>Mức giảm</th>
                                    <th>Thời gian bắt đầu</th>
                                    <th>Thời gian kết thúc</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['discounts'] as $key => $discount) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $discount['name'] ?></td>
                                        <td><?= $discount['code'] ?></td>
                                        <td><?= $discount['discount'] ?> %</td>
                                        <td><?= $discount['start_time'] ?></td>
                                        <td><?= $discount['end_time'] ?></td>

                                        <td>
                                            <div aria-label="Basic mixed styles example ">
                                                <a href="<?= DOCUMENT_ROOT ?> /admin/discounts/edit/<?= $discount['id'] ?> " type="button" class="btn btn-info"><i class="fas fa-edit"> Sửa</i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $discount['id'] ?>"><i class="fas fa-trash-alt"> Xóa</i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?= $discount['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $discount['id'] ?>" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel<?= $discount['id'] ?>">Xác nhận xóa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn chắc chắn muốn xóa khuyến mãi <?= $key + 1 ?> này?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                                                <a href="<?= DOCUMENT_ROOT ?>/admin/discounts/delete/<?= $discount['id'] ?>" class="btn btn-danger">Xóa</a>

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