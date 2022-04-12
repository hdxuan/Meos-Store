<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content ">
    <div class="container-fluid">
        <div class="card card-primary">
            <?php require_once(VIEW . DS . "admin/shared/notification.php") ?>

            <div class="card-header">
                <h3 class="card-title">Thông tin đơn hàng</h3>
            </div>
            <form action="<?= DOCUMENT_ROOT . "/admin/orders/update/" . $data["editOrder"]['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group">
                        <label for="idOrder">Mã đơn hàng</label>
                        <input readonly value="<?= $data["editOrder"]['id'] ?>" type="text" class="form-control" name="idOrder" id="idOrder">
                    </div>
                    <div class="form-group">
                        <!-- <div class="col"> -->
                        <label for="id_user">Mã khách hàng</label>
                        <input readonly value="<?= $data["editOrder"]['id_user'] ?>" type="text" class="form-control" name="id_user" id="id_user">
                        <!-- </div> -->
                        <div>

                            <p>
                                <label style=" color: rgb(27 151 101)" for="customerName">Tên khách hàng:</label>
                                <span><?= $data["editOrder"]['customerName'] ?></span>
                            </p>
                            <p>
                                <label style=" color: rgb(27 151 101)" for="phone">Số điện thoại:</label>
                                <span><?= $data["editOrder"]['phone'] ?></span>
                            </p>
                            <p>
                                <label style=" color: rgb(27 151 101)" for="email">Email:</label>
                                <span><?= $data["editOrder"]['email'] ?></span>
                            </p>
                        </div>

                    </div>
                    <div class="form-group ">
                        <label for="order_date">Ngày đặt hàng</label>
                        <input readonly value="<?= $data["editOrder"]['order_date'] ?>" type="date" class="form-control" name="order_date" id="order_date">
                    </div>
                    <div class="form-group ">
                        <label for="delivery_date">Ngày giao hàng</label>
                        <input value="<?= $data["editOrder"]['delivery_date'] ?>" type="date" class="form-control" name="delivery_date" id="delivery_date">
                    </div>
                    <div class="form-group ">
                        <label for="idstatus">Trạng thái đơn hàng</label>
                        <select name="idstatus" class="form-control" id="idstatus">
                            <?php foreach ($data["idStatus"] as $key => $idStatus) : ?>
                                <p><?= $idStatus['id'] ?></p>
                                <option <?= $data['editOrder']['id_status'] === $idStatus['id'] ? "selected" : "" ?> value="<?= $idStatus['id'] ?> "><?= $idStatus['name'] ?></option>

                            <?php endforeach; ?>
                        </select>

                    </div>

                    <?php foreach ($data["numProductInOrderDetail"] as $key => $numProduct) : ?>

                        <div class="form-group ">
                            <label style="font-weight: 600; color: rgb(27 151 101); font-size: 1.4rem" for="idstatus">Sản phẩm <?= $key + 1 ?></label>
                            <div class="row">
                                <div class="image__product__order col-4">
                                    <img style="width: 200px;" class="rounded mx-auto d-block" src="<?= IMAGES_PRODUCT_URL . DS . $numProduct['image'] ?>" alt="">
                                </div>
                                <div class="info__product__order col">
                                    <label for="">Mã sản phẩm: </label>
                                    <span><?= $numProduct['id_product'] ?></span> <br>
                                    <label for="">Tên sản phẩm: </label>
                                    <span><?= $numProduct['name'] ?></span> <br>
                                    <label for="">Số lượng: </label>
                                    <span><?= $numProduct['amount'] ?></span> <br>
                                    <label for="">Đơn giá: </label>
                                    <span><?= number_format($numProduct['price_product'], 0, "", ",") ?> VND</span> <br>

                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <div class="form-group col">
                        <span for="price">Tổng tiền: </span>
                        <span style=" <?= $data["editOrder"]['discount_percent'] == 0 ? "font-weight: 600; color: rgb(27 151 101);" : "black" ?>"><?= number_format($data["editOrder"]['total'], 0, "", ",") ?>đ </span>
                        <?php if ($data["editOrder"]['discount_percent'] != 0) : ?>
                            <div style="font-weight: 400; color: black; font-size: 16px;" class="ms-2">Giảm giá: <?= $data["editOrder"]['discount_percent'] ?>%</div>
                            <div style="<?= $data["editOrder"]['discount_percent'] != 0 ? "font-weight: 600; color: rgb(27 151 101);" : "black" ?> font-size: 16px;" class="ms-2">Thành tiền: <span class="font-bold"><?= number_format($data["editOrder"]['total'] - ($data["editOrder"]['total'] * ($data["editOrder"]['discount_percent'] / 100)), 0, "", ",")  ?>đ </span></div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= DOCUMENT_ROOT . DS . "admin/orders" ?>" style="margin-right: 68rem;" class="btn btn-secondary ">Hủy</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</section>
<!-- /.content -->