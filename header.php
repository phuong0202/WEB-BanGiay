<?php session_start(); 
require 'DataToibangiay.php';
require 'functionajax.php';
if (isset($_SESSION['username'])) {
	$thongtin = "SELECT * FROM nguoidung WHERE tendn='".$_SESSION['username']."'";
	$truyvan = DataToibangiay::executeQuery($thongtin);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
	<!--------------- HEADER ------------------------->
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="Images/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<style type="text/css">
				.menuxo:hover{
					color: red;
				}
			</style>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a style="font-weight: bold; color: black;" class="nav-link" href="index.php">TRANG CHỦ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown ">
						<a style="font-weight: bold; color: black;" class="nav-link" href="#" id="navbarDropdown">
							SẢN PHẨM
						</a>
						<div class="dropdown-content menuxo" style="text-transform: uppercase" >
							<?php echo menu(); ?>
						</div>
					</li>
					<li class="nav-item">
						<a style="font-weight: bold; color: black;" class="nav-link" href="lienhe.php">LIÊN HỆ</a>
					</li>

				</ul>
				<form class="form-inline my-2 my-lg-0" action="index.php" method="get">
					<input class="form-control mr-sm-2" type="text" size="30" start="31" placeholder="Tìm kiếm" id="idsp"  name="idsp" >
				</form>
				
				
				<?php 
				if(isset($_SESSION['username']))
				{
					echo'<li class="nav-link" id="myBtn">'.$_SESSION['username'].' </li>';
					echo'<a href="xulydangxuat.php"><i class="fas fa-sign-out-alt"  style="color: red;font-size: 25px;" ></i></a></li>
					<li class="nav-link">
					<a href="index.php?id=gh#1"><i class="fas fa-shopping-cart" style="color: red;font-size: 25px;"></i></a></li>';
					echo'<a href="index.php?id=hoadon"><i class="fas fa-file-invoice"  style="color: red;font-size: 25px;" ></i></a></li>';
				}
				else echo '<li class="nav-link"><a href="index.php?id=dn#1"><i class="fas fa-user "  style="color: red;font-size: 25px;"></i></a></li>
				<li class="nav-link">
				<a href="index.php?id=gh#1"><i class="fas fa-shopping-cart" style="color: red;font-size: 25px;"></i></a>
				</li>';
				?>
			</div>
		</div>
	</nav>

	<!------------------ SLIDE -----------------> 
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" >
		<div class="carousel-inner">
			<div class="carousel-item active" >
				<img src="Images/nenn.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="Images/nenn1.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="Images/nenn2.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next" >
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div >
	<hr id="1" style="margin-top: 0px;"><br>
	<!------------------------------- END HEADER ------------------------------>
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<div class="modal-header">
				<h2 class="t">THÔNG TIN TÀI KHOẢN</h2>
			</div>
			<div class="modal-body">
				<?php  
				//echo $thongtin;
				$i=0;
				while ($tt = mysqli_fetch_array($truyvan)){
					if($tt['gioitinh']==1)
					{
						$g='nam';
					}
					else {$g='nữ';};
					echo'<label for="field1"><span>Tên đăng nhập : <span class="required"></span>'.$tt['tendn'].'</span></label><br>
					<label for="field1"><span>Email : <span class="required"></span>'.$tt['email'].'</span></label><br>
					<label for="field1"><span>SĐT : <span class="required"></span>'.$tt['sdt'].'</span></label><br>
					<label for="field1"><span>Ngày sinh : <span class="required"></span>'.$tt['ngaysinh'].'</span></label><br>
					<label for="field1"><span>Giới tính : <span class="required"></span>'.$g.'</span></label>';
				}
				?>
				
			</div>
			<div class="modal-footer">
			</div>
		</div>

	</div>
</body>
</html>
<?php 
function menu()
{

	$menu = array("nike","adidas","asisc");
	for ($i=0; $i <count($menu) ; $i++) { 
		echo "<a class='dropdown-item'id='$menu[$i]' href='index.php?id=$menu[$i]#1'>$menu[$i]</a>";
	}
}

?>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
	modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>

<style>

	/* Modal Header */
	.modal-header {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
	}

	/* Modal Body */
	.modal-body {padding: 2px 16px;}

	/* Modal Footer */
	.modal-footer {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
	}

	/* Modal Content */
	.modal-content {
		position: relative;
		background-color: #fefefe;
		margin: auto;
		padding: 0;
		border: 1px solid #888;
		width: 80%;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		animation-name: animatetop;
		animation-duration: 0.4s
	}

	/* Add Animation */
	@keyframes animatetop {
		from {top: -300px; opacity: 0}
		to {top: 0; opacity: 1}
	}
	.t{
		text-align: center;
		color: red;

	}
</style>
