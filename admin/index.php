<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>

<?php
    if(!isset($_SESSION['arUser']))
    {
        header("location:../auth/login.php");
    }
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
 <!-- Main content -->
 <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 style="font-size: 24px; padding-top: 30px;">Quản lý danh mục</h4>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-qrcode" style="padding-top: 30px;"></i>
                            </div>
                            <a href="cat/index.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 style="font-size: 24px; padding-top: 30px;">Quản lý bài viết</h4>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-qrcode" style="padding-top: 30px;"></i>
                            </div>
                            <a href="news/index.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h4 style="padding-top: 30px; font-size: 24px;">Quản lí user</h4>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-sitemap" style="padding-top: 30px"></i>
                            </div>
                            <a href="user/index.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h4 style="padding-top: 30px; font-size: 24px;">Quản lí liên hệ</h4>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user" style="padding-top: 30px"></i>
                            </div>
                            <a href="contact/index.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h4 style="padding-top: 30px; font-size: 24px;">Quản lí comment</h4>

                                <p>&nbsp;</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user" style="padding-top: 30px"></i>
                            </div>
                            <a href="comment/index.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>