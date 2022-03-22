<!-- Main Sidebar Container -->
<aside style="position: fixed;" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= DOCUMENT_ROOT . DS . "admin" ?>" class="brand-link ">
        <i class="fas fa-paw ps-5" style="opacity: .8; font-size: 2.9rem"></i>
        <span class="brand-text font-weight-light">Méo Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= IMAGES_URL ?>/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= DOCUMENT_ROOT . DS . "admin/about" ?>" class="d-block"><?= $_SESSION['admin']['name'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php foreach (ADMIN_SIDEBAR as $key => $sidebar) : ?>
                    <li class="nav-item">
                        <a href="<?= $sidebar['link'] ?>" class="nav-link <?= strcasecmp($GLOBALS['currentRoute'], $sidebar['name']) === 0 ? "active" : ""  ?> ">
                            <i class="<?= $sidebar['icon'] ?>"></i>
                            <p style="margin-left: 12px"><?= $sidebar['title'] ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>