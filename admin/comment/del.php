<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/util/CheckUserUtil.php'; ?>
<?php
		$cmt_id = $_GET['id'];
		$query = "DELETE FROM comment WHERE cmt_id = {$cmt_id}";
		$ketqua = $mysqli->query($query);
		if($ketqua)
		{
			header("location:index.php?msg=Xóa thành công");
			die();
		}else
		{
			echo "Có lỗi khi xóa";
			die();
		}
?>	

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>