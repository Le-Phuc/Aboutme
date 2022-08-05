
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/files/avatar5.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['arUser']['fullname'];?></p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">ADMIN</li>
                    <li>
                        <a href="/admin/index.php">
                            <i class="fa fa-dashboard"></i> <span>Trang quản trị viên</span>
                        </a>
                    </li>
                     <li>
                        <a href="/admin/cat/index.php">
                            <i class="fa fa-qrcode"></i> <span>Quản lý danh mục</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/news/index.php">
                            <i class="fa fa-qrcode"></i> <span>Quản lý bài viết</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/user/index.php">
                            <i class="fa fa-sitemap"></i> <span>Quản lý User</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/contact/index.php">
                            <i class="fa fa-user"></i> <span>Quản lí liên hệ</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/comment/index.php">
                            <i class="fa fa-user"></i> <span>Quản lí comment</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>