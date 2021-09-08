<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/assets/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Blood Donor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/uploads/admin-user/<?= $me['image']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $me['nama']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link <?= ($menu == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= ($menu == 'users' || $menu == 'roles') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= ($menu == 'users' || $menu == 'roles') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link <?= ($menu == 'users') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/roles" class="nav-link <?= ($menu == 'roles') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($menu == 'blood-stock' || $menu == 'blood-donor' || $menu == 'blood-group') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= ($menu == 'blood-stock' || $menu == 'blood-donor' || $menu == 'blood-group') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tint"></i>
                        <p>
                            Blood
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/blood-stock" class="nav-link <?= ($menu == 'blood-stock') ? 'active' : ''; ?>">
                                <i class="fas fa-boxes nav-icon"></i>
                                <p>
                                    Blood Stock
                                </p>
                            </a>
                            <a href="/admin/blood-donor" class="nav-link <?= ($menu == 'blood-donor') ? 'active' : ''; ?>">
                                <i class="fas fa-heart nav-icon"></i>
                                <p>
                                    Blood Donor
                                </p>
                            </a>
                            <a href="/admin/blood-group" class="nav-link <?= ($menu == 'blood-group') ? 'active' : ''; ?>">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>
                                    Blood Group
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/blood-needer" class="nav-link <?= ($menu == 'blood-needer') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-heartbeat"></i>
                        <p>
                            Blood Needer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/hospital" class="nav-link <?= ($menu == 'hospital') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-hospital-symbol"></i>
                        <p>
                            Hospital
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>