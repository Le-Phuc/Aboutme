<?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/header.php'; ?>

    <div class="main">
        <h2>Liên hệ</h2>
        <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
        <h2>Form liên hệ</h2>
        <div class="clr"></div>
        <?php
          if(isset($_GET['msg']))
          {
            echo $_GET['msg'];
          }
          if(isset($_POST['submit']))
          {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $website = $_POST['website'];
            $message = $_POST['message'];
            $query = "INSERT INTO contact(name, email, website, content)
                      VALUES ('{$name}','{$email}','{$website}','{$message}')";
            $ketqua = $mysqli->query($query);
            if($ketqua)
            {
              header("location:lienhe.php?msg=Gửi liên hệ thành công");
            }else
            {
              echo "Có lỗi khi gửi liên hệ";
            }
          }
        ?>
        <form action="" method="post" id="form-lh" class="lh-form">
          <div class="form-group">
            <label for="name">Họ tên</label>
            <input class="form-control" name="name"  id="name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input  class="form-control"  name="email" id="email">
          </div>
          <div class="form-group">
            <label for="website">Website</label>
            <input  class="form-control" name="website"  id="website">
          </div>
          <div class="form-group">
            <label for="message">Nội dung</label>
            <textarea class="form-control" name="message" rows="8" cols="50"  id="message"></textarea>
          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Gửi"></input>
        </form>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.lh-form').validate({
            rules:{
              name:{
                required: true,
              },
              email:{
                required: true,
              },
              website:{
                required: true,
              },
              message:{
                required: true,
              },         
            },
            messages:{
              name:{
                required: "vui long nhap ho ten",
              },
              email:{
                required: "vui long nhap email",
              },
              website:{
                required: "vui long nhap website",
              },
              message:{
                required: "vui long nhap noi dung",
              },          
            },  
          });
        });   
      </script>
      <style>
        .error{color:red;}
      </style>
    </div>


<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/aboutme/inc/footer.php'; ?>