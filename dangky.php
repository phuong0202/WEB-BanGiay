<?php 
require 'functionajax.php';
?>
<br>
<div class="container"> 
	<h1 class="text-center" style="color: blue" >ĐĂNG KÝ TÀI KHOẢN</h1> 
	<div class="row" style="justify-content: center; color: red;"> 
		<div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
			<form  action="xulydangky.php" method="get" class="form" role="form" onsubmit="return(dk())">
				<input class="form-control" type="text" name="username" id="username" placeholder="Tên đăng nhập" required="" autofocus="" pattern="[a-zA-Z0-9]{1,15}" title="Tên đăng nhập chứa ký tự lạ hoặc hơn 15 ký tự"  / onkeyup="ktdk(this.value)">
				<div id="kqkt"></div>
				<?php 
				if(isset($_REQUEST['loi']))
				{
					echo'<br><div class="alert alert-danger alert-dismissible fade show" id="danger">
					<strong>Tên đăng nhập đã tồn tại !</strong>
					</div>';
				}
				?>
				
				<br> 
				<input  class="form-control" name="youremail" placeholder="Email" type="email" id="email" required=""  title="Vui lòng điền Email hợp lệ"> <br>
				<input  class="form-control" name="sdt" placeholder="Số điện thoại" type="tel" id="sdt" required=""  pattern="[0]+[0-9]{9}" title="Số điện thoại gồm 10 số và bắt đầu là số 0 " maxlength="10"> <br>
				<input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" id="password" required=""  pattern="[a-zA-Z0-9]{7,50}" title="Mật khẩu tối thiểu 7 ký tự" /> <br>
				<input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password" id="retypepassword" required=""  pattern="[a-zA-Z0-9]{7,50}" title="">
				<br>
				<div class="alert alert-danger alert-dismissible fade show" style="display: none;" id="danger">
					<strong>Mật khẩu nhập lại không khớp !</strong>
				</div><br>
				<label for=""> Ngày sinh</label> 
				<input class="form-control" name="date" placeholder="Nhập ngày sinh" type="date" id="date" required=""  >
				<br>
				<label class="radio-inline">       <br> 
					<input name="sex" id="inlineCheckbox1" value="1" type="radio">          Nam</label> <label class="radio-inline">          
						<input name="sex" id="inlineCheckbox2" value="0" type="radio">       Nữ</label> 
						<br> 
						<br> 
						<button class="btn btn-lg btn-primary btn-block"  >Đăng ký</button><br>
						<button class="btn btn-lg btn-primary btn-block" type="reset" >Đặt lại</button>
					</form>

				</div> 
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<br>
		<br>
		<br>

		<script type="text/javascript">

			function dk(){
				var x=document.getElementById("password").value;
				var y=document.getElementById("retypepassword").value;
				var z=document.getElementById("date").value;
				var co=0;
				if(x!=y)
				{   
					alert("Mật khẩu nhập lại không khớp !!")
					co=0;
				}
				else co=1;
				if(z.substr(0,4)>2009)
				{
					alert("Bạn cần trên 10 tuổi mới được đăng ký tài khoản !!")
					co=0;
				}
				else co=1;
				if(co==0) {return false;}
				else {return true;}
			}
		</script>

