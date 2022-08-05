<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/CheckUserUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script>
    document.title = 'News | VinaEnter Edu';   
</script>
<?php
	//tổng số dòng
	$queryTSD = "SELECT COUNT(*) AS TSD FROM news";
	$resultTSD = $mysqli->query($queryTSD);
	$arTmp = mysqli_fetch_assoc($resultTSD);
	$TSD = $arTmp['TSD'];
	//số truyện trên 1 trang
	$row_count = ROW_COUNT;
	//tổng số trang
	$TST = ceil($TSD/$row_count);
	//trang hiện tại
	$current_page = 1;
	if(isset($_GET['page']))
	{
		$current_page = $_GET['page'];
	}
	//offset
	$offset = ($current_page - 1) * $row_count;
?>
<div class="content-wrapper">
 <!-- Main content -->
    <section class="content">
        <div class="main">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                       <div class="col-md-12" style="color: red;">
                            <h2>Quản lý tin tức</h2>
                       </div> 
                    </div>
                    <hr/>
                    <?php
                        if(isset($_GET['msg']))
                        {
                            echo $_GET['msg'];
                        }
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="add.php" class="btn btn-success btn-md">Thêm</a>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên tin tức</th>
                                            <th>Danh mục</th>
                                            <th>Ngày Đăng</th>
                                            <th>Hình ảnh</th>
                                            <th>Trạng thái</th>
                                            <th width="160px">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $query = "SELECT n.*, c.name AS cname FROM news AS n
                                                          INNER JOIN cat AS c
                                                          ON n.cat_id = c.cat_id
                                                          ORDER BY n.news_id DESC
                                                          LIMIT {$offset}, {$row_count}";
                                                $ketqua = $mysqli->query($query);
                                                while($arNews = mysqli_fetch_assoc($ketqua))
                                                {
                                                    $news_id = $arNews['news_id'];
                                                    $name = $arNews['name'];
                                                    $created_at = $arNews['created_at'];
                                                    $picture = $arNews['picture'];
                                                    $hide_show = $arNews['hide_show'];
                                                    $cname = $arNews['cname'];
                                                    if($hide_show == 0)
                                                    {
                                                        $urlPic = "/files/an.gif";
                                                    }else
                                                    {
                                                        $urlPic = "/files/hien.gif";
                                                    }
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo $news_id;?></td>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $cname;?></td>
                                            <td class="center"><?php echo $created_at;?></td>
                                            <td class="center">
                                            <?php
                                                if($picture == '')
                                                {
                                                    echo "Không có ảnh";
                                                }else
                                                {
                                            ?>
                                                <img src="/files/<?php echo $picture?>" alt="" height="80px" width="100px" />
                                            <?php
                                                }
                                            ?>
                                            </td>

                                            <td class="hide_show-<?=$news_id?>">
                                                <a onclick="return change(<?=$news_id?>,<?=$hide_show?>)" href="javascript:void(0)" title="">
                                                    <img src="<?php echo $urlPic;?>">
                                                </a>     
                                            </td>

                                            <td class="center">
                                                <a href="edit.php?id=<?php echo $news_id;?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="del.php?id=<?php echo $news_id;?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                        </tr>
                                        <?php 
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                                <div>
                                    <div style="text-align: right;">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                            <ul class="pagination">
                                                <?php
                                                    for($i = 1; $i <= $TST; $i++)
                                                    {
                                                        $active = '';
                                                        if($i == $current_page)
                                                        {
                                                            $active = 'active';
                                                        }
                                                ?>
                                                <li class="paginate_button <?php echo $active;?>"><a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
        </div>
    </section>
                            <script>
                                function change(news_id,hide_show) 
                                {
                                    $.ajax({
                                        type: "POST",
                                        cache: false,
                                        url: "ajax.php",
                                        data:{
                                            news_id:news_id,
                                            hide_show:hide_show,

                                        },
                                        success: function(data){
                                            $(".hide_show-" + news_id).html(data);
                                        },
                                        error: function(){
                                            alert("có lỗi xảy ra");
                                        },
                                    });
                                }
                            </script>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>