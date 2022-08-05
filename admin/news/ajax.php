<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/util/DatabaseConnectUtil.php';
?>

<?php
	$news_id = $_POST['news_id'];
	$hide_show = $_POST['hide_show'];
	if($hide_show == 0)
	{	
		$hide_show = 1;
		$urlPic = "/files/hien.gif";
		$query1 = "UPDATE news SET hide_show='{$hide_show}' WHERE news_id = {$news_id}";
		$result1 = $mysqli->query($query1);
	}else
	{
		$hide_show = 0;
		$urlPic = "/files/an.gif";
		$query0 = "UPDATE news SET hide_show='{$hide_show}' WHERE news_id = {$news_id}";
		$ketqua0 = $mysqli->query($query0);
	}
?>

<a onclick="return change(<?=$news_id?>,<?=$hide_show?>)" href="javascript:void(0)" title="">
	<img src="<?php echo $urlPic;?>">
</a>