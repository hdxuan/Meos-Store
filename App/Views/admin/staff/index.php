<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý nhân viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT . "/admin" ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Nhân viên</li>
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
                            <h3 class="card-title">Tất cả nhân viên</h3>
                            <a class="btn btn-primary" href="<?= DOCUMENT_ROOT . DS .  "admin/staff/create" ?>">Thêm nhân viên</a>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="width: 100px;">Mã nhân viên</th>
                                    <th style="width: 120px;">Tên nhân viên</th>
                                    <th style="width: 280px;">Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['staff'] as $key => $staff) : ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $staff['id'] ?></td>
                                        <td><?= $staff['name'] ?></td>
                                        <td><?= $staff['address'] ?></td>
                                        <td><?= $staff['phone'] ?></td>
                                        <td><?= $staff['email'] ?></td>
                                        <td>
                                            <div aria-label="Basic mixed styles example">
                                                <a href="<?= DOCUMENT_ROOT ?> /admin/categories/edit/<?= $categories['id'] ?> " type="button" class="btn btn-info"><i class="fas fa-edit"> Sửa</i></a>
                                                <?php if ($_SESSION['admin']['email'] == "admin") : ?>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $staff['id'] ?>"><i class="fas fa-trash-alt"> Xóa</i></button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal<?= $staff['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $staff['id'] ?>" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel<?= $staff['id'] ?>">Xác nhận xóa</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Bạn chắc chắn muốn xóa người này?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                                                    <a href="<?= DOCUMENT_ROOT ?>/admin/customer/delete/<?= $staff['id'] ?>" class="btn btn-danger">Xóa</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
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