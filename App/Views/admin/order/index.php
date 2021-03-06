<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý đơn đặt hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT . "/admin" ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý đơn đặt hàng</li>
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
                            <h3 class="card-title">Danh sách đơn đặt hàng</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 51px;">Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Ngày giao</th>
                                    <th style="width: 87px;">Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th style="width: 40px;">Khuyến mãi</th>
                                    <th>Thành tiền</th>
                                    <th>Thanh toán</th>
                                    <th style="width: 141px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['orders'] as $key => $order) : ?>

                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                        <td><?= $order['customerName'] ?></td>
                                        <td><?= $order['order_date'] ?></td>
                                        <td><?= $order['delivery_date'] ?></td>
                                        <td><?= $order['status'] ?></td>

                                        <td><?= number_format($order['total'], 0, "", ",") ?>đ</td>
                                        <td><?= $order['discount_percent'] != null ? $order['discount_percent'] : 0  ?>%</td>
                                        <td><?= number_format($order['total'] - ($order['total'] * ($order['discount_percent'] / 100)), 0, "", ",")  ?>đ</td>
                                        <td> <?= (isset($order['payment_code']) ? "Đã thanh toán" : "Chưa thanh toán") ?> </td>
                                        <td>
                                            <div aria-label="Basic mixed styles example">
                                                <a href="<?= DOCUMENT_ROOT ?> /admin/orders/edit/<?= $order['id'] ?> " type="button" class="btn btn-success"><i class="fas fa-edit"> Sửa</i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $order['id'] ?>"><i class="fas fa-trash-alt"> Xóa</i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?= $order['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $order['id'] ?>" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel<?= $order['id'] ?>">Xác nhận xóa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn chắc chắn muốn xóa đơn hàng có mã <?= $order['id'] ?> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                                                <a href="<?= DOCUMENT_ROOT ?>/admin/orders/delete/<?= $order['id'] ?>" class="btn btn-danger">Xóa</a>

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
                </div>
            </div>
        </div>
    </div>
</section>