       
        <div class="right_coloum floatright">
          <div class="single_right_coloum">
            <h2 class="title">Tin hot</h2>
            <ul>
              <?php
                $query2 = "SELECT * FROM news WHERE hide_show > 0 ORDER BY news_id DESC LIMIT 3";
                $ketqua2 = $mysqli->query($query2);
                while($arNews = mysqli_fetch_assoc($ketqua2))
                {
                  $nameReplaceStory = utf8ToLatin($arNews['name']);
                  $url = '/' .$nameReplaceStory . '-' .$arNews['news_id'] . '.html';
              ?>
              <li>
                <div class="single_cat_right_content">
                  <h3><a href="<?php echo $url;?>"><?php echo $arNews['name'];?></a></h3>
                  <p><?php echo $arNews['preview_text'];?></p>
                </div>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>