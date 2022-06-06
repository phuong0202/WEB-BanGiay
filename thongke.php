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
						require 'DataToibangiay.php';
						require 'functionajax.php';
						if(isset($_SESSION['usernameadmin']))
						{
							echo'<li class="nav-link">Chào '.$_SESSION['usernameadmin'].'</li>';
							echo'<a href="xulydangxuat.php"><i class="fas fa-sign-out-alt"  style="color: red;font-size: 25px;"></i></a></li>';
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
				
			</div>
			<div class="col-md-10" id="thongke">
				<?php echo'
				<div class="row">
				<div class="col-md-4">
				<h2>Thống kê</h2>
				</div>
				<div class="col-md-8">	
				<div class="row">
				<div class="col-md-1">	Từ</div>
				<div class="col-md-3">	<input class="form-control"  name="tu" id="bd" type="date" style="width: 180px;"> </div>
				<div class="col-md-1">	Đến</div>
				<div class="col-md-3"><input class="form-control" name="den" id="kt" type="date" style="width: 180px;" ></div>
				<div class="col-md-1"></div>
				<div class="col-md-3"><button class="btn btn-success" onclick="qlthongke()">Đi</button></div>
				</div>	
				</div> 
				</div>
				<div class="row">
				<div class="col-md-5">
				<h3>Thống kê doanh thu loại sản phẩm</h3>
				<table class="table table-hover">
				<thead>
				<tr>
				<th>STT</th>
				<th>Loại sản phẩm</th>
				<th>Tổng tiền:VNĐ</th>
				</tr>';

				$sql="SELECT max(masp) as maxmasp FROM sanpham";
				$result = DataToibangiay::executeQuery($sql);
				$row = mysqli_fetch_array($result);
				$maxmasp=$row['maxmasp'];
				GLOBAL $sql3;
				for($i=1;$i<=$maxmasp;$i++)
				{
					if($i<$maxmasp)
					{
						$sql3.="SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
					}
					else
					{
						$sql3.=" SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
					}
				}
				$sql3="SELECT l.tenloai,SUM(sl.tongtien) as tongtien FROM sanpham as s ,loaisanpham as l,(".$sql3.") as sl WHERE s.masp=sl.masp AND s.maloai=l.maloai  GROUP BY s.maloai ";
								//echo $sql3;
				$result3 = DataToibangiay::executeQuery($sql3);
				if(mysqli_num_rows($result3) == 0)
				{
					echo "Chưa có sản phẩm nào được bán cả !";
				}
				else{
					$i=1;
					while ($row3 = mysqli_fetch_array($result3)){
						if($i==4) break;
						echo'<tbody >
						<tr>
						<th>'.$i.'</th>
						<th>'.$row3["tenloai"].'</th>
						<th>'.number_format($row3["tongtien"]).'</th>
						</tr>
						</tbody>';$i++;
						GLOBAL $tong;
						$tong=$tong+$row3["tongtien"];
					}
					echo'
					</thead >
					</table>
					<h1 style="color: red">TỔNG DOANH THU:<h5>(dự kiến)</h5> <h1 style="color: red">'. number_format($tong).' VNĐ</h1>
					</div>
					<div class="col-md-7">
					<h3>TOP 10 sản phẩm bán chạy nhất</h3>
					<table class="table table-hover" id="thongke">
					<thead>
					<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Tổng số lượng đã bán</th>
					<th>Tổng tiền:VNĐ</th>
					</tr>';

					$sql="SELECT max(masp) as maxmasp FROM sanpham";
					$result = DataToibangiay::executeQuery($sql);
					$row = mysqli_fetch_array($result);
					$maxmasp=$row['maxmasp'];
					GLOBAL $sql1;
					for($i=1;$i<=$maxmasp;$i++)
					{
						if($i<$maxmasp)
						{
							$sql1.="SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon  WHERE masp=".$i." UNION ";
						}
						else
						{
							$sql1.=" SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
						}
					}
					$sql1="SELECT * FROM (".$sql1.") as sl  ORDER BY soluong DESC  LIMIT 10";
								//echo $sql1;
					$result1 = DataToibangiay::executeQuery($sql1);
					$i=1;
					while ($row1 = mysqli_fetch_array($result1)){
						if($i==11) break;
						echo'<tbody >
						<tr>
						<th>'.$i.'</th>
						<th>'.$row1["tensp"].'</th>
						<th>'.$row1["soluong"].'</th>
						<th>'.number_format($row1["tongtien"]).'</th>
						</tr>
						</tbody>';$i++;
					}
					echo'
					</thead >
					</table>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
					<h3>Thống kê doanh thu tất cả sản phẩm</h3><p>(theo tổng tiền)</p>
					<table class="table table-hover" id="thongke">
					<thead>
					<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng đã bán</th>
					<th>Tổng tiền:VNĐ</th>
					</tr>';

					$sql="SELECT max(masp) as maxmasp FROM sanpham";
					$result = DataToibangiay::executeQuery($sql);
					$row = mysqli_fetch_array($result);
					$maxmasp=$row['maxmasp'];
					GLOBAL $sql2;
					for($i=1;$i<=$maxmasp;$i++)
					{
						if($i<$maxmasp)
						{
							$sql2.="SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
						}
						else
						{
							$sql2.=" SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
						}
					}
					$sql2="SELECT * FROM (".$sql2.") as sl  ORDER BY tongtien DESC  ";
								//echo $sql2;
					$result2 = DataToibangiay::executeQuery($sql2);
					$i=1;
					while ($row2 = mysqli_fetch_array($result2)){
						if($row2['tensp']==null) break;
						echo'<tbody >
						<tr>
						<th>'.$i.'</th>
						<th>'.$row2["tensp"].'</th>
						<th>'.$row2["soluong"].'</th>
						<th>'.number_format($row2["tongtien"]).'</th>
						</tr>
						</tbody>';$i++;
					}}
					echo'
					</thead >
					</table>
					</div>
					</div>';?>
				</div>
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
