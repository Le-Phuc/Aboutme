<?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/header.php'; ?>

    <div class="content_area">
      <div class="main_content floatleft">
        <div class="left_coloum floatleft">
          <?php
            $query = "SELECT * FROM cat";
            $ketqua = $mysqli->query($query);
            while($arCat = mysqli_fetch_assoc($ketqua))
            {
              $cat_id = $arCat['cat_id'];
              $cname = $arCat['name'];
              $nameReplace = utf8ToLatin($cname);
              $url = '/' . $nameReplace . '-' .$cat_id;
          ?>
          <div class="single_left_coloum_wrapper">
            <h2 class="title"><?php echo $cname;?></h2>
            <a class="more" href="<?php echo $url;?>">more</a>

            <?php
              $query2 = "SELECT * FROM news WHERE hide_show > 0 AND cat_id = {$cat_id} ORDER BY news_id DESC LIMIT 3";
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
              <p><?php echo $preview_text?></p>
              <a class="readmore" href="<?php echo $url2;?>">Chi tiết</a> 
            </div>
            <?php
              }
            ?>
          </div>
          <?php
              }
          ?>
        </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/leftbar.php'; ?>
      </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/footer.php'; ?>