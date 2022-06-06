<!DOCTYPE html>
<html>
<head>
	<title>ToiBanGiay.com</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> -->
	<!--<link rel="stylesheet" type="text/css" href="qlsp.css">-->
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!--<script src="admin.js"></script>-->
</head>
<body>
	<div class="container-fluid">
		<div class="menu"  style="background-color: #F8F9FA;">
			<div class="row">
				<div class="col-md-4">
					<a class="navbar-brand" href="index.php"><img src="Images/logo.png"></a>
				</div>
				<div class="col-md-4">
					<div class="right" style="float: right; margin-top: 15px;">
						<?php 
						session_start();
						if(isset($_SESSION['usernameadmin']))
						{
							echo'<li class="nav-link">Chào '.$_SESSION['usernameadmin'].'</li>';
							echo'<a href="xulydangxuatadmin.php"><i class="fas fa-sign-out-alt"  style="color: red;font-size: 25px;"></i></a></li>';
						}
						else echo '<li class="nav-link"><a href="loginadmin.php"><i class="fas fa-user "  style="color: red;font-size: 25px;"></i></a></li>';
						?>
					</div>
				</div>
			</div>

		</div>

		<div class="row" style="margin-top: 15px;">
			<div class="col-md-2">
				<div class="list-group">
					<?php
					if(isset($_SESSION['usernameadmin']))
					{
						echo'<a href="qlsp.php" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ SẢN PHẨM</a>
						<a href="qlnd.php" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ NGƯỜI DÙNG</a>
						<a href="qlhd.php" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ HÓA ĐƠN</a>
						<a href="thongke.php" class="list-group-item list-group-item-action" style="font-weight: bold;">THỐNG KÊ</a>';

					} 
					else
					{
						echo'<a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ SẢN PHẨM</a>
						<a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ NGƯỜI DÙNG</a>
						<a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ HÓA ĐƠN</a>
						<a href="#" class="list-group-item list-group-item-action" style="font-weight: bold;">THỐNG KÊ</a>';
					}?>
					
				</div><br><br>
				

				<style type="text/css">
					.form-style-71{

					}
					.form-style-71 ul{
						list-style: none;
					}
					.form-style-71 li{

						margin-left: -10px;
					}
					.form-style-71 input[type="submit"]{
						background: #2471FF;
						border: none;

						border-bottom: 1px solid #5994FF;
						border-radius: 10px;
						color: #D2E2FF;
						margin-left: 50px;
						margin-top: 10px;
					}
					.form-style-71 input[type="submit"]:hover{
						background: #6B9FFF;
						color:#fff;

					}
					.overlay1 {
						height: 0%;
						width: 100%;
						position: fixed;
						z-index: 2;
						top: 40px;
						left: 10%; 
						right: 10%;
						background-color: rgb(102, 204, 199);
						overflow-y: hidden;
						transition: 0.5s;
						background: #e0e0d1;
					}

				</style>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-4">
						<h2>Quản lý hóa đơn</h2>

					</div>
					<div class="col-md-8">
						
						Từ <input  name="tu" id="tu" type="date" style="width: 180px;"> Đến <input name="den" id="den" type="date" style="width: 180px;" >
						<button class="btn btn-success" onclick="qlhd()">Đi</button>
						
					</div> 

				</div>


				<?php
				require 'DataToibangiay.php';
				require 'functionajax.php';
				$sql = "SELECT * FROM hoadon WHERE tongtien>0";


				$result = DataToibangiay::executeQuery($sql);
				if(mysqli_num_rows($result) == 0)
				{
					echo "Chưa có hóa đơn nào cả";
				}
				else{
				echo'
				<table class="table table-hover" id="hoadon">
				<thead>
				<tr style="text-align: center;">
				<th>Mã HD</th>
				<th>Tên khách hàng</th>
				<th>Ngày</th>
				<th>Tổng tiền</th>
				<th>Tình trạng</th>
				<th>Tùy chọn</th>
				</tr>
				</thead >
				<div >';
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$format = "%H:%M:%S %d-%B-%Y";
				$i = 1;
				while ($row = mysqli_fetch_array($result))
				{
					echo'<tbody >';
					echo'<tr style="text-align: center;">
					<th>'.$row["mahd"].'</th>
					<th>'.$row["tennd"].'</th>';
					$strTime = strftime($format, $row["ngay"]);
					echo'
					<th>'.$strTime.'</th>
					<th>'.number_format($row["tongtien"]).' VNĐ</th>

					<th>
					<div class="btn-group btn-group-toggle btn-group-lg" data-toggle="buttons">';
					
					if($row["xuly"]==0)
					{
						echo'
						<label class="btn  btn-lg btn-outline-success">
						<input type="checkbox" name="options"   disabled="disabled" >Đã xử lí
						</label>
						<label class="btn active btn-lg btn-outline-success">
						<input type="checkbox" name="options"   disabled="disabled" >Chưa xử lí</label>';
					}
					else
					{
						echo'
						<label class="btn active btn-lg btn-outline-success">
						<input type="checkbox" name="options" disabled="disabled"  >Đã xử lí
						</label>
						<label class="btn btn-lg btn-outline-success">
						<input type="checkbox" name="options" disabled="disabled">Chưa xử lí</label>';
					}
					
					echo'
					</div>
					</th>
					<th><a href="chitiethoadon.php?mahd='. $row["mahd"] .'"><button type="button" class="btn btn-info">Xem chi tiết</button></a></th>
					</tr>
					</tbody>';$i++;}}
					echo'
					</table>
					</div>
					</div>
					</div>
					</div>';?>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>