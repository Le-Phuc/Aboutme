<?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/header.php'; ?>
<?php
  $cat_id = $_GET['id'];
  $query = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
  $ketqua = $mysqli->query($query);
  $arCat  = mysqli_fetch_assoc($ketqua);
  
  //tổng số dòng
  $queryTSD = "SELECT COUNT(*) AS TSD FROM news WHERE cat_id = {$cat_id} AND hide_show > 0";
  $resultTSD = $mysqli->query($queryTSD);
  $arTmp = mysqli_fetch_assoc($resultTSD);
  $TSD = $arTmp['TSD'];
  //row_count
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
    <div class="content_area">
      <div class="main_content floatleft">
        <div class="left_coloum floatleft">

          <div class="single_left_coloum_wrapper">
            <h2 class="title"><?php echo $arCat['name'];?></h2>
            <?php
              $query2 = "SELECT * FROM news WHERE cat_id = {$cat_id} AND hide_show > 0 ORDER BY news_id DESC LIMIT {$offset}, {$row_count}";
              $ketqua2 = $mysqli->query($query2);
              while($arNews = mysqli_fetch_assoc($ketqua2))
              {
                $news_id = $arNews['news_id'];
                $name = $arNews['name'];
                $picture = $arNews['picture'];
                $preview_text = $arNews['preview_text'];
                
                $nameReplaceStory = utf8ToLatin($name);
                $url2 = '/' .$nameReplaceStory . '-' .$news_id . '.html';
            ?>
            <div class="single_left_coloum floatleft">
            <?php
              if($picture != '')
              {
            ?> 
              <img src="files/<?php echo $picture;?>" alt="" />
              <?php
              }
              ?>
              <h3><?php echo $name;?></h3>
              <p><?php echo $preview_text;?></p>
              <a class="readmore" href="<?php echo $url2;?>">Chi tiết</a> 
            </div>
            <?php
            }
            ?>
          </div>

          <p>
            <small>Trang <?php echo $current_page;?> của <?php echo $TST;?>&emsp;&emsp;</small>
            <?php
              for($i = 1; $i <= $TST; $i++)
              { 
                $nameReplace = utf8ToLatin($arCat['name']);
                $url = '/'.$nameReplace.'-'.$cat_id.'-page-'. $i;
              
            ?>
              <?php
                if($i == $current_page)
                {
              ?>
                <span class="page">
                  <?php echo $current_page;?>
                </span>
              <?php
                }else
                  {
              ?>
                <a href="<?php echo $url;?>" class="badge badge-info" ><?php echo $i;?></a>
              <?php
                  }
              ?>
            <?php
              }
            ?>
          </p>  
        </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/leftbar.php'; ?>
      </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/footer.php'; ?>