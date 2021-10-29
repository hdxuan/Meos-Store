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
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
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
                          <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-3">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3><?= $data['numOrder'] ?></h3>

                          <p>Đơn hàng</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->

              <!-- ./col -->
          </div>

      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->