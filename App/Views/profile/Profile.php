<!-- <div class="container">
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
</div> -->

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn bg__avatar btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /></button> <span class="name mt-3">Eleanor Pena</span> <span class="idd">@eleanorpena</span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">Oxc4c16a645_b21a</span> <span><i class="fa fa-copy"></i></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number">1069 <span class="follow">Followers</span></span> </div>
            <div class=" d-flex mt-2"> <button class="btn1 btn-dark">Edit Profile</button> </div>
            <div class="text mt-3"> <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
            <div class=" px-2 rounded mt-4 date "> <span class="join">Joined May,2021</span> </div>
        </div>
    </div>
</div>