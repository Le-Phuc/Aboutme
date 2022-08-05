<?php
  ob_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/util/DatabaseConnectUtil.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/util/Utf8ToLatinUtil.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dự án About-me</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="/templates/aboutme/assets/font/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/templates/aboutme/assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/templates/aboutme/assets/css/jquery.bxslider.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/templates/aboutme/assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/templates/aboutme/assets/css/responsive.css" media="screen" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<div class="body_wrapper">
  <div class="center">
    <div class="header_area">
      <div class="logo floatleft"><img src="files/logo.jpg" alt="" /></div>
    </div>
    <div class="main_menu_area">
      <ul id="nav">
        <li><a href="/">Trang chủ</a></li>
        <li><a href="/Tin-tuc">Tin tức</a>
          <ul>
            <?php
              $query = "SELECT * FROM cat";
              $ketqua = $mysqli->query($query);
              while($arCat = mysqli_fetch_assoc($ketqua))
              {
                $cat_id = $arCat['cat_id'];
                $name = $arCat['name'];
                $nameReplace = utf8ToLatin($name);
                $url = '/' . $nameReplace . '-' .$cat_id;
            ?>
            <li><a href="<?php echo $url;?>"><?php echo $arCat['name'];?></a></li>
            <?php
              }
            ?>
          </ul>
        </li>
        <li><a href="/lien-he">Liên hệ</a></li>
        <li><a href="/admin/auth/login.php">Admin</a></li>
      </ul>
    </div>
    <div class="slider_area">
      <div class="slider">
        <ul class="bxslider">
          <li><img src="/files/slide1.jpg" alt=""/></li>
          <li><img src="/files/slide2.jpg" alt=""/></li>
          <li><img src="/files/slide3.jpg" alt=""/></li>
        </ul>
      </div>
    </div>