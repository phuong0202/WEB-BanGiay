
<div class="container" > 
 <div class="row" style="justify-content: center; color: red;text-align: center; " > 
  <div class="col-md-offset-4 col-md-4" id="box"> 
   <h1 >ĐĂNG NHẬP</h1> 
   <hr> 
   <form class="form-horizontal" action="xulydangnhap.php" method="get" id="login_form"> 
    <fieldset > 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="txtUser" placeholder="Tên đăng nhập" class="form-control" type="text" required="" autofocus="" pattern="[a-zA-Z0-9]{1,15}" title="Tên đăng nhập chứa ký tự lạ hoặc hơn 15 ký tự"> 
      </div> 
    </div> 
  </div> 
  <div class="form-group"> 
    <div class="col-md-12"> 
     <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input name="txtPass" placeholder="Mật khẩu" class="form-control" type="password" required="" > 
    </div> 
  </div> 
</div> 
<?php
if (isset($_REQUEST['loi']))
{
  echo'<div class="alert alert-danger alert-dismissible fade show" id="danger">
          <strong>Tên đăng nhập hoặc mật khẩu không chính xác !</strong>
        </div>';
}
?>
<input name="loai" type="hidden" value="0" />
<div class="form-group"> 
  <div class="col-md-12"> 
   <button type="submit" name="button" value="OK" class="btn btn-md btn-danger pull-right" style="font-size: 1.5em">Đăng nhập </button> <br>
 </div> 
</div> 
</fieldset> 
</form> 

</div> 
</div>
</div>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="text-align: center;font-size: 1.5em;">Bạn chưa có tài khoản?<br>Đăng ký ngay <a href="index.php?id=dk#1">tại đây !</a></div>
  <div class="col-sm-4" ></div>
</div>
<br>
<br>
<br>
