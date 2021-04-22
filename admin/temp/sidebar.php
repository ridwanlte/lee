<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
        <span class="brand-text font-weight-bold "> SISTEM LELANG </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php
                    if($_SESSION['level'] == "administator"){
                ?>
                <li class="nav-item">
                    <a href="petugas.php" class="nav-link">
                        <i class="fas fa-fw fa-users"></i>
                        <p>Data Petugas</p>
                    </a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a href="barang.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-box"></i>
                        <p>
                            Data Barang
                        </p>
                    </a>
                </li>
                <?php
                    if($_SESSION['level'] == "petugas"){
                ?>
                <li class="nav-item">
                    <a href="lelang.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-dollar-sign"></i>
                        <p>
                            Buka Tutup Lelang
                        </p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="history.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-history"></i>
                        <p>
                            History Lelang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="generate.php" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-print"></i>
                        <p>
                            Generate
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>