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
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3><?= $data['numOrder'] ?></h3>

                          <p>Đơn hàng chưa xử lý</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>

                      </div>
                      <a href="<?= DOCUMENT_ROOT . "/admin/orders" ?>" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->

              <!-- ./col -->
          </div>

      </div><!-- /.container-fluid -->

      <!-- solid sales graph -->
      <div class="row">
          <div class="col">
              <div class="card bg-gradient-info">
                  <div class="card-header border-0">
                      <h3 class="card-title">
                          <i class="fas fa-th mr-1"></i>
                          Doanh thu 6 tháng gần nhất (Triệu đồng)
                      </h3>

                      <div class="card-tools">
                          <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body">
                      <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- /.content -->
  <!-- /.card-body -->
  </div>

  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/chart.js/Chart.min.js"></script>
  <script>
      // Sales graph chart
      var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
      // $('#revenue-chart').get(0).getContext('2d');

      var salesGraphChartData = {
          labels: ['Tháng 11', 'Tháng 12', 'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4'],
          datasets: [{
              label: 'Doanh thu',
              fill: true,
              borderWidth: 2,
              lineTension: 0,
              spanGaps: true,
              borderColor: '#efefef',
              pointRadius: 3,
              pointHoverRadius: 7,
              pointColor: '#efefef',
              pointBackgroundColor: '#efefef',
              data: [0, 0, 26, 60, 42, 52]
          }]
      }

      var salesGraphChartOptions = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
              display: false
          },
          scales: {
              xAxes: [{
                  ticks: {
                      fontColor: '#efefef'
                  },
                  gridLines: {
                      display: false,
                      color: '#efefef',
                      drawBorder: false
                  }
              }],
              yAxes: [{
                  ticks: {
                      stepSize: 5000,
                      fontColor: '#efefef'
                  },
                  gridLines: {
                      display: true,
                      color: '#efefef',
                      drawBorder: false
                  }
              }]
          }
      }

      // This will get the first returned node in the jQuery collection.
      // eslint-disable-next-line no-unused-vars
      var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
          type: 'line',
          data: salesGraphChartData,
          options: salesGraphChartOptions
      })
  </script>