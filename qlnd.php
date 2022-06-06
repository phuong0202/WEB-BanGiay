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
</head>
<body>
	<div class="container-fluid">
		<div class="menu"  style="background-color: #F8F9FA;">
			<div class="row">
				<div class="col-md-4">
					<a class="navbar-brand" href="index.php"><img src="Images/logo.png"></a>
				</div>
				<div class="col-md-6">
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
				<div class="col-md-2">
					
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
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-8">
						<h2>Quản lý người dùng</h2>

					</div>
					<div class="col-md-4">
						
					</div> 

				</div>


				<?php
				require 'DataToibangiay.php';
				$sql = "SELECT * FROM nguoidung";
				$result = DataToibangiay::executeQuery($sql);
				if(mysqli_num_rows($result) == 0)
				{
					echo "Chưa có người dùng nào cả";
				}
				else{
					echo'
					<table class="table table-hover">
					<thead>
					<tr>
					<th>STT</th>
					<th>Mã ND</th>
					<th>Tên ND</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Ngày sinh</th>
					<th>Giới tính</th>
					<th>Mã VT</th>
					</tr>
					</thead>';
					$i = 1;
					while ($row = mysqli_fetch_array($result)){
						if($row['gioitinh']==1)
						{
							$g='nam';
						}
						else {$g='nữ';};

							echo'<tbody>';
							echo'<tr>
							<th>'.$i.'</th>
							<th>'.$row["mand"].'</th>
							<th>'.$row["tendn"].'</th>
							<th>'.$row["sdt"].'</th>
							<th>'.$row["email"].'</th>
							<th>'.$row["ngaysinh"].'</th>
							<th>'.$g.'</th>
							<th>'.$row["mavt"].'</th>
							</tr>
							</tbody>';$i++;}
						}
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