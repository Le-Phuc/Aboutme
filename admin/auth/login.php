<?php
  session_start();
  ob_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/util/DatabaseConnectUtil.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập admin</title>	
  <!-- Import Bootstrap and JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <script 
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">    
  </script>            
  <!-- My CSS and JQuery -->
  <link href="/templates/admin/assets/csslogin/style.css" rel="stylesheet">
  <script type="text/javascript" src="/templates/admin/assets/jquery/index.js"></script>
  <script src="/library/jquery.validate.js"></script> 
</head>
<body>
  <div class="container-fluid bg">
    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-6 col-xs-12 row-container">
        <?php
                if(isset($_POST['submit']))
                {
                  $username = $_POST['username'];
                  $password = md5($_POST['password']);
                  $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
                  $ketqua = $mysqli->query($query);
                  $arUser = mysqli_fetch_assoc($ketqua);
                  if($arUser)
                  {
                    $_SESSION['arUser'] = $arUser;
                    header("location:../index.php");
                  }else
                  {
                    echo "<span style='color:red'>Sai username hoặc password</span>";
                  }
                }
        ?>
        <form action="" method="post" role="form" class="form">
          <h1>Đăng nhập trang admin</h1>
          <div class="form-group">
            <input type="text" class="form-control"  name="username" placeholder="Username">
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">            
          </div>

          <button type="submit" name="submit" class="btn btn-success btn-block my-3">Đăng nhập</button>
          <a href="/" class="btn btn-success btn-block my-3">Back Aboutme</a>
        </form>
        <script type="text/javascript">
                  $(document).ready(function(){
                    $('.form').validate({
                      rules:{
                        username:{
                          required: true,
                        },
                        password:{
                          required: true,
                          minlength: 6,
                          maxlength: 15,
                        },
                      
                      },
                      messages:{
                        username:{
                          required: "vui long nhap username",
                        },
                        password:{
                          required: "vui long nhap password",
                          minlength: 6,
                          maxlength: 15,
                        },
                        
                      },  
                    });
                  });
              
              </script>
              <style>
                .error{color:red;}
              </style>
      </div>
    </div>
  </div>
</body>
</html>	
<?php
  ob_end_flush();
?>










