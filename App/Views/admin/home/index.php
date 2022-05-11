  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row d-flex justify-content-around mt-5">
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3><?= $data['numproducts'] ?></h3>

                          <p>Sản phẩm</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/products" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3><?= $data['numCustomer'] ?></h3>
                          <p>Khách hàng</p>
                      </div>
                      <div class="icon">
                          <!-- <i class="ion ion-stats-bars"></i> -->
                          <i class="ion ion-person-add"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/customer" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3><?= $data['countproducts_type'] ?></h3>
                          <p>Loại sản phẩm</p>
                      </div>
                      <div class="icon">
                          <!-- <i class="ion ion-stats-bars"></i> -->
                          <i class="ion ion-person-add"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/customer" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-secondary">
                      <div class="inner">
                          <h3><?= $data['countDiscounts'] ?></h3>
                          <p>Khuyến mãi</p>
                      </div>
                      <div class="icon">
                          <!-- <i class="ion ion-stats-bars"></i> -->
                          <i class="ion ion-person-add"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/customer" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3><?= $data['countComment'] ?></h3>
                          <p>Bình luận</p>
                      </div>
                      <div class="icon">
                          <!-- <i class="ion ion-stats-bars"></i> -->
                          <i class="ion ion-person-add"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/customer" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-dark">
                      <div class="inner">
                          <h3><?= $data['countStaff'] ?></h3>
                          <p>Nhân viên</p>
                      </div>
                      <div class="icon">
                          <!-- <i class="ion ion-stats-bars"></i> -->
                          <i class="ion ion-person-add"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/customer" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-warning">


                      <div class="inner">
                          <h3><?= $data['countOrder'] ?></h3>
                          <p>Đơn hàng</p>

                          <?php foreach ($data['numOrder'] as $key => $numOrder) : ?>
                              <p style="padding-left: 15px;"><?= $numOrder['amount'] ?> <?= $numOrder['name'] ?></p>

                              <!-- <span><?= $numOrder['name'] ?></span> -->
                          <?php endforeach; ?>
                      </div>

                      <div class="icon">
                          <i class="ion ion-bag"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/orders" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          </div>

      </div><!-- /.container-fluid -->





  </section>
  <!-- /.content -->
  <!-- /.card-body -->
  </div>

  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/chart.js/Chart.min.js"></script>