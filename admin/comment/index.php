<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/CheckUserUtil.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script>
    document.title = 'Comment | VinaEnter Edu';   
</script>
<?php
    //tổng số dòng
    $queryTSD = "SELECT COUNT(*) AS TSD FROM comment";
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
                            <h2>Quản lý comment</h2>
                       </div> 
                    </div>
                    <hr/>
                    <?php
                        if(isset($_GET['msg']))
                        {
                            echo $_GET['msg'];
                        }
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Nội dung</th>
                                        <th>Tin tức</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM comment 
                                                  INNER JOIN news 
                                                  ON comment.news_id = news.news_id 
                                                  ORDER BY comment.news_id DESC
                                                  LIMIT {$offset}, {$row_count}";
                                        $ketqua = $mysqli->query($query);
                                        while($arItem = mysqli_fetch_assoc($ketqua))
                                        {
                                            $cmt_id = $arItem['cmt_id'];
                                            $cmt_name = $arItem['cmt_name'];
                                            $noidung = $arItem['noidung'];
                                            $name = $arItem['name'];
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $cmt_id; ?></td>
                                        <td><?php echo $cmt_name; ?></td>
                                        <td><?php echo $noidung; ?></td>
                                        <td><?php echo $name; ?></td>                                  
                                        <td class="center">
                                            <a href="del.php?id=<?php echo $cmt_id;?>" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
</div>

<!-- /. PAGE INNER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>