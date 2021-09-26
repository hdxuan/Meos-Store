<div class="wrapper">
    <section class="container">

        <p class="separation"></p>
        <!--separation: phân cách -->
        <section class="profile">

            <div class="edit--avatar">

                <img src="<?= PUBLIC_URL . "/uploads/avatar/" ?>xuan.jpg" alt="">
                <svg class="edit-user" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z">
                    </path>
                </svg>
                <div class="user-name">
                    <p><?= $_SESSION['user']['name'] ?></p>
                </div>
            </div>

            <nav class="edit--profile">
                <div class="profile__item">
                    <h3>Your Profile</h3>
                    <div class="profile__item--informations">

                        <form action="<?= DOCUMENT_ROOT . "/Profile/update"  ?>" method="POST">


                            <label for="username">User name: </label>
                            <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>">

                            <label for="email">Email: </label>
                            <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>">

                            <label for="phone">Phone: </label>
                            <input type="text" name="phone" value="<?= $_SESSION['user']['phone'] ?>">

                            <label for="address">Address: </label>
                            <input type="text" name="address" value="<?= $_SESSION['user']['address'] ?>">

                            <button type="submit" value="Save" class="btn btn--primary">Save</button>

                        </form>
                    </div>
                </div>
                <div class="profile__item">
                    <h3>Purchase History</h3>
                    <div class="profile__item--informations">
                        <form action="" method="POST">

                            <label for="username">User name: </label>
                            <input type="text" name="name">

                            <label for="email">Email: </label>
                            <input type="text" name="email">

                            <label for="phone">Phone: </label>
                            <input type="text" name="phone">

                            <label for="address">Address: </label>
                            <input type="text" name="address">

                            <button type="submit" value="Save" class="btn btn--primary">Save</button>


                        </form>
                    </div>
                </div>

            </nav>




</div>
</section>
</section>
</div>