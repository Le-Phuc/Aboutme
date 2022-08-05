
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/util/DatabaseConnectUtil.php';

	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$news_id = $_POST['news_id'];
	$querycmt = "INSERT INTO comment(cmt_name, noidung, news_id)
                        VALUES ('{$name}','{$comment}','{$news_id}')";
    $ketquacmt = $mysqli->query($querycmt);
?>
<?php

	$query2 = "SELECT * FROM comment WHERE news_id = {$news_id}";
	$ketqua2 = $mysqli->query($query2);
	while($arCMT = mysqli_fetch_assoc($ketqua2))
	{
?>
	
		<img src="files/userpic.gif" style="float: left;">
              <div class="main-showcmt">
                <h5 style="color: blue">@<?php echo $arCMT['cmt_name'];?></h5>
                <p><?php echo $arCMT['noidung'];?></p>
              </div>
<?php
	}	
?>