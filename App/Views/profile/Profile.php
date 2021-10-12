<div class="container">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">

                    <form action="<?= DOCUMENT_ROOT . "/Profile/editAvatar"  ?> " method="POST" enctype="multipart/form-data">

                        <img src="<?= IMAGES_URL . "/uploads/avatar/" ?>default_avatar.png" alt="" id="profileAvatar">

                        <label for="profileImage">
                            <i class="fas fa-camera icon__edit-avatar"></i>
                        </label>

                        <input type="file" name="profileImage" id="profileImage" onchange="displayImage(this)" hidden>




                        <button type="submit" value="Save" class="btn btn--primary">Save</button>

                    </form>


                    <h1><?= $_SESSION['user']['name'] ?></h1>
                </div>

                <ul class="nav nav-pills row">
                    <li class="active col"><a href="#"> <i class="fa fa-user"></i>Trang cá nhân</a></li>
                    <li><a href="#"> <i class="fa fa-calendar"></i> Lịch sử mua hàng <span class="label label-warning pull-right r-activity">9</span></a></li>
                    <li class="edit"><a href="#"> <i class="fa fa-edit"></i>Chỉnh sửa thông tin </a></li>
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
                <div class="panel-body bio-graph-info info-edit">
                    <h1>Chỉnh sửa thông tin</h1>
                    <form action="<?= DOCUMENT_ROOT . "/Profile/update"  ?> " method="POST">

                        <div class="row">


                            <div class="bio-row">
                                <label for="username">User name: </label>
                                <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>">
                            </div>
                            <div class="bio-row">
                                <label for="email">Email: </label>
                                <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>">
                            </div>

                            <div class="bio-row">
                                <label for="phone">Phone: </label>
                                <input type="text" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
                            </div>
                            <div class="bio-row">
                                <label for="address">Address: </label>
                                <input type="text" name="address" value="<?= $_SESSION['user']['address'] ?>">
                            </div>


                            <button type="submit" value="Save" class="btn btn--primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>