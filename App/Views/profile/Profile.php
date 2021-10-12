<div class="container">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                    </a>
                    <h1><?= $_SESSION['user']['name'] ?></h1>
                </div>

                <ul class="nav nav-pills row">
                    <li class="active col"><a href="#"> <i class="fa fa-user"></i>Trang cá nhân</a></li>
                    <li><a href="#"> <i class="fa fa-calendar"></i> Lịch sử mua hàng <span class="label label-warning pull-right r-activity">9</span></a></li>
                    <li><a href="#"> <i class="fa fa-edit"></i>Chỉnh sửa thông tin </a></li>
                </ul>
            </div>
        </div>
        <div class="profile-info col-md-9">

            <div class="panel">
                <div class="bio-graph-heading">
                    Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.
                </div>
                <div class="panel-body bio-graph-info">
                    <h1>Trang cá nhân</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>Họ và tên </span>: <?= $_SESSION['user']['name'] ?> </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Địa chỉ </span>: <?= $_SESSION['user']['address'] ?></p>
                        </div>
                        <div class="bio-row">
                            <p><span>Email </span>: <?= $_SESSION['user']['email'] ?> </p>
                        </div>

                        <div class="bio-row">
                            <p><span>Số điện thoại </span>: <?= $_SESSION['user']['phone'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>