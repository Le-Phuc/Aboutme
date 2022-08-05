<?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/header.php'; ?>
<?php
  $news_id = $_GET['id'];
  $query = "SELECT * FROM news WHERE news_id = {$news_id}";
  $ketqua = $mysqli->query($query);
  $arNews  = mysqli_fetch_assoc($ketqua);
?>
    <div class="content_area">
      <div class="main_content floatleft">
        <div class="left_coloum floatleft">
            <h2 class="title"><?php echo $arNews['name'];?></h2>
            <div class="detail"> 
              <img src="files/<?php echo $arNews['picture'];?>" alt="" width="500px"/>
              <h3>Ngày đăng: <?php echo $arNews['created_at'];?></h3>
              <p><?php echo $arNews['detail_text']?></p>
            </div>

          <div class="tinlq">
            <h2>Truyện liên quan</h2>
            <ul>
              <?php
                $queryLQ = "SELECT * FROM news WHERE news_id != {$news_id} AND cat_id = {$arNews['cat_id']} AND hide_show >0 
                            ORDER BY news_id DESC";
                $ketquaLQ = $mysqli->query($queryLQ);
                while($arNewsLQ = mysqli_fetch_assoc($ketquaLQ))
                {
                  $nameReplaceStory = utf8ToLatin($arNewsLQ['name']);
                  $url = '/' .$nameReplaceStory . '-' .$arNewsLQ['news_id'] . '.html';
              ?>
              <li>
                  <h3><a href="<?php echo $url;?>" title=""><?php echo $arNewsLQ['name'];?></a></h3>
                  <p><?php echo $arNewsLQ['preview_text'];?></p>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>

          <div class="cmt">
            <h2>Comment</h2>
            <form action="javascript:void(0)" method="post" id="form-detail" class="form-detail">
              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="name" name="name" value="">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="comment" placeholder="comment" name="comment" value="">
              </div>
              <button type="button" class="btn btn-primary" onclick="getInfo()" name="submit">Gửi</button>
            </form>
          </div>
          <div class="showcmt">
          </div>
        </div>
        <script type="text/javascript">
        function getInfo()
        {
          var news_id = $news_id;
          var name = $('#name').val();
          var comment = $('#comment').val();
          $.ajax({
            url: 'ajaxcmt.php',
            type: 'POST',
            cache: false,
            data: {name:name, comment:comment, news_id:news_id},
            success: function(data)
            {
              $('.showcmt').html(data);
            },
            error: function()
            {
              alert('Có lỗi xảy ra');
            }
            
          });
        }
      </script>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/leftbar.php'; ?>
      </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/footer.php'; ?>