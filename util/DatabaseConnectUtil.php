<?php
	$localhost = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'aboutme';
	
	$mysqli = new mysqli($localhost, $username, $password, $database);
	$mysqli->set_charset('utf8');
	if(mysqli_connect_errno())
	{
		echo 'có lỗi khi kết nối database: '.mysqli_connect_error();
		die();
	}
?>