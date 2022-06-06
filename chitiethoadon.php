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
						<i  class="fas fa-user "  style="color: red;font-size: 25px;"></i><a style="font-weight: bold; font-size: 18px; margin-left: 10px;">Chào ADMIN</a>
					</div>
				</div>
				<div class="col-md-4">
					<form class="form-inline my-2 my-lg-0"  >
						<input class="form-control mr-sm-2" type="text" size="30" start="31" placeholder="Tìm kiếm" id="idsp"  onkeyup="showsreach()" >
					</form>
				</div>
			</div>

		</div>

		<div class="row" style="margin-top: 15px;">
			<div class="col-md-2">
				<div class="list-group">
					<a href="qlsp.php" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ SẢN PHẨM</a>
					<a href="qlnd.php" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ NGƯỜI DÙNG</a>
					<a href="qlhd.php" class="list-group-item list-group-item-action" style="font-weight: bold;">QUẢN LÝ HÓA ĐƠN</a>
					<a href="thongke.php" class="list-group-item list-group-item-action" style="font-weight: bold;">THỐNG KÊ</a>
				</div><br><br>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-4">
						<h2>Chi tiết hóa đơn</h2>
					</div>
				</div>
				<?php
				require 'DataToibangiay.php';

				$sql = "SELECT * FROM chitiethoadon WHERE mahd=".$_GET["mahd"];
				$result = DataToibangiay::executeQuery($sql);
				echo'
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã HD</th>
							<th>Mã Sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
						</tr>
					</thead>';
					$i = 1;
					while ($row = mysqli_fetch_array($result))
					{
						echo'<tbody>';
							echo'<tr>
								<th>'.$row["mahd"].'</th>
								<th>'.$row["masp"].'</th>
								<th>'.$row["tensp"].'</th>
								<th>'.$row["soluong"].'</th>
								<th>'.number_format($row["dongia"]).' VNĐ</th>
								<th>'.number_format($row["thanhtien"]).' VNĐ</th>
							</tr>
						</tbody>';}
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
</body>
</html>
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