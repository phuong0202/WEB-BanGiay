
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="admin-dn.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <h3>Log-in Admin</h3>
  <div class="formCont">
    <div class="brTop"></div>
    <form action="xulydangnhap.php" method="get"> 
      <div class="inputForm">
        <span class="prefix"><span class="entypo-user"></span></span>
        <input type="text" placeholder="Tên đăng nhập"  name="tendangnhap"  >

      </div>
      <?php
      if (isset($_REQUEST['loi']))
      {
        echo'<div class="alert alert-danger alert-dismissible fade show" id="danger">
          <strong>Tên đăng nhập hoặc mật khẩu không chính xác !</strong>
        </div>';
      }
      ?>
      <br />
      <div class="inputForm" >
        <span class="prefix"><span class="entypo-key"></span></span>
        <input type="password" placeholder="Mật khẩu"  name="matkhau" >
        <span class="sufix"><span class="entypo-lock"></span></span>
      </div>

      <div class="triangle"></div>  
      <button type="submit" class="dn" name="dn" value="1">ĐĂNG NHẬP</button></a>

      <span class="flRight" >Quên mật khẩu</span>  
    </form> 
  </div>
</body>