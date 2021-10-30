<div class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <div class="mx-auto col-6  ">

          <!-- Profile Image -->
          <div class="card card-primary card-outline ">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" style="height: 100px;object-fit: cover;" src="<?= IMAGES_URL . DS . "uploads/avatar/" . $_SESSION['admin']['avatar'] ?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?= $_SESSION['admin']['name'] ?></h3>


              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Mã số sinh viên</b> <a class="float-right">B1809433</a>
                </li>
                <li class="list-group-item">
                  <b>Chuyên nghành</b> <a class="float-right">Công nghệ thông tin</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">xuanB1809433@student.ctu.edu.vn</a>
                </li>
              </ul>
              <div class="d-flex justify-content-around">

                <a href="https://www.facebook.com/xuan.haudiem/"><img src="<?= ICONS_URL ?>/facebook.svg" alt="facebook icon" /></a>
                <a href="https://github.com/hdxuan"><img src="<?= ICONS_URL ?>/github.svg" alt="github icon" /></a>
                <a href="https://www.linkedin.com/in/h%E1%BA%A7u-di%E1%BB%85m-xu%C3%A2n-458890214/"><img src="<?= ICONS_URL ?>/linkedin.svg" alt="linkedin icon" /></a>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>


    </section>
  </div>
  <!-- ./wrapper -->
</div>


<!-- jQuery -->
<script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= PUBLIC_URL . "/admin" ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= PUBLIC_URL . "/admin" ?>/dist/js/adminlte.min.js"></script>