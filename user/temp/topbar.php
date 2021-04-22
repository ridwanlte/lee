<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="userDropdown" href="#" aria-haspopup="true"
                aria-expanded="false" role="button">
                <span class="mr-2 d-none d-lg-inline small"></span>
                <img class="img-profile rounded-circle" style="width: 30px;" src="../assets/dist/img/avatar5.png">
            </a>
            <div class="dropdown-menu shadow animated--grow-in dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="change.php">
                    <i class="fas fa-ruler-horizontal fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-fw mr-2" aria-hidden="true"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<!-- /.navbar -->