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
				<div class="col-md-4">
					<form class="form-inline my-2 my-lg-0"  >
						<input class="form-control mr-sm-2" type="text" size="30" start="31" placeholder="Tìm kiếm"   onkeyup="showsreachadmin(this.value)" >
					</form>
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
					<div class="col-md-8">
						<h2>Quản lý sản phẩm</h2>

					</div>
					<div class="col-md-4">
						<a href="addsanpham.php"><h6  style="color: orange; text-align: center; text-decoration: underline;font-weight: bold;">+ THÊM SẢN PHẨM MỚI</h6></a>
					</div> 

				</div>


				
				<table class="table table-hover" id="qlsp">
					<thead>
						<tr style="text-align: center;">
							<th>STT</th>
							<th>Mã loại</th>
							<th>Tên</th>
							<th>Size---SL</th>
							<th>Tổng SL</th>
							<th>Giá :VNĐ</th>
							<th >Hình</th>
							<th>Tùy chọn</th>
						</tr>
					</thead>
					<?php
					require 'DataToibangiay.php';
					require 'functionajax.php';
					$sql = "SELECT * FROM sanpham";


					$result = DataToibangiay::executeQuery($sql);
					if(mysqli_num_rows($result) == 0)
					{
						echo "Chưa có sản phẩm nào cả";
					}
					else{

						$i = 1;
						while ($row = mysqli_fetch_array($result)) 
						{
							echo'<tbody>';
							echo'<tr style="text-align: center;">
							<th>'.$i.'</th>
							<th>'.$row["maloai"].'</th>
							<th>'.$row["tensp"].'</th>';
							$size="SELECT * FROM sanpham as s , size WHERE s.masp=size.masp AND s.masp=".$row['masp'];
							$result1 = DataToibangiay::executeQuery($size);
							GLOBAL $tongsoluong;
							echo'<th>';
							while ($row1 = mysqli_fetch_array($result1))
							{
								echo substr($row1["masize"], 0,2).'----'.$row1['soluong'].'<br>';
								$tongsoluong=$tongsoluong+$row1['soluong'];
							}
							echo'</th>';
							echo'<th ">'.$tongsoluong.'</th>';
							$tongsoluong=0;
							echo'
							<th>'.number_format($row["gia"]).'</th>
							<th ><div class="col-sm-2 hidden-xs"><a href="editsanpham.php?idsp='.$row["masp"].'"><img  src="Images/'.$row["hinh"].'" class="img-responsive" width="100"></a></div>
							</div> </th> 

							<th>
							<a href="editsanpham.php?idsp='.$row["masp"].'">
							<button  class="btn btn-info">Sửa</button></a>
							<button  class="btn btn-danger" onclick="xoasp('.$row["masp"].')">Xóa</button></a>
							</th>
							</tr>
							</tbody>'; $i++;}
						}?>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>