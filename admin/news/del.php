<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/CheckUserUtil.php'; ?>
<?php
	$news_id = $_GET['id'];
	$query = "SELECT picture FROM news WHERE news_id = {$news_id}";
	$ketqua = $mysqli->query($query);
	$arNew = mysqli_fetch_assoc($ketqua);
	if($arNew['picture'] != '')
	{
		unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arNew['picture']);
	}
	$queryDel = "DELETE FROM news WHERE news_id = {$news_id}";
	$ketqua2 = $mysqli->query($queryDel);
	if($ketqua2)
	{
		header("location:index.php?msg=Xóa thành công");
	}else
	{
		echo "Có lỗi khi xóa tin tức";
	}
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>