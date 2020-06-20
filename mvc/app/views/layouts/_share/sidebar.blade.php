<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{BASE_URL}}" class="brand-link">
        <img src="{{getAdminAsset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> MVC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{getAdminAsset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{BASE_URL}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-box"></i>
                        <p>
                             &nbsp;&nbsp;Sản phẩm
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="product" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>&nbsp;&nbsp;Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-product" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>&nbsp;&nbsp;Thêm sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-archive"></i>
                        <p>
                            &nbsp;&nbsp;Loại sản phẩm
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="category" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>&nbsp;&nbsp;Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-category" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>&nbsp;&nbsp;Thêm loại</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            &nbsp;Tài khoản
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="user" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>&nbsp;&nbsp;Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-user" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>&nbsp;&nbsp;Thêm tài khoảmn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>
                            &nbsp;&nbsp;&nbsp;Hóa đơn
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="invoice" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>&nbsp;&nbsp;Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-invoice" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>&nbsp;&nbsp;Thêm hóa đơn</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>