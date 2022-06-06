<?php 
//lấy thông tin nếu chi chọn ngày bắt đầu và đến
if($_GET['tu']!=null && $_GET['den']!=null)
{
	
	$tu=strtotime($_GET['tu']);
	$den=strtotime($_GET['den']);
	require 'DataToibangiay.php';
	require 'functionajax.php';
	$sql = "SELECT * FROM hoadon WHERE ngay BETWEEN ".$tu ." AND ".$den. " and tongtien>0";
}
//lấy thông tin nếu chi chọn ngày bắt đầu
if($_GET['tu']!=null && $_GET['den']==null)
{

	$tu=strtotime($_GET['tu']);
	require 'DataToibangiay.php';
	require 'functionajax.php';
	$sql = "SELECT * FROM hoadon WHERE ngay > ".$tu. " and tongtien>0";
}
		//lấy thông tin nếu chi chọn ngày đến
if($_GET['tu']==null && $_GET['den']!=null)
{

	$den=strtotime($_GET['den']);
	require 'DataToibangiay.php';
	require 'functionajax.php';
	$sql = "SELECT * FROM hoadon WHERE ngay < ".$den. " and tongtien>0";
}
		//nếu không nhập
if($_GET['tu']==null && $_GET['den']==null)
{

	require 'DataToibangiay.php';
	require 'functionajax.php';
	$sql = "SELECT * FROM hoadon WHERE tongtien>0";
}
$result = DataToibangiay::executeQuery($sql);
$format = "%H:%M:%S %d-%B-%Y";
echo'
<table class="table table-hover" id="hoadon">
<thead>
<tr>
<th>Mã HD</th>
<th>Tên khách hàng</th>
<th>Ngày</th>
<th>Tổng tiền</th>
<th>Tình trạng</th>
<th>Tùy chọn</th>
</tr>
</thead >
<div >';
$i = 1;
while ($row = mysqli_fetch_array($result))
{
	echo'<tbody >';
	echo'<tr>
	<th>'.$row["mahd"].'</th>
	<th>'.$row["tennd"].'</th>';
	$strTime = strftime($format, $row["ngay"] );
	echo'
	<th>'.$strTime.'</th>
	<th>'.number_format($row["tongtien"]).' VNĐ</th>

	<th>
	<div class="btn-group btn-group-toggle btn-group-lg" data-toggle="buttons">
	<label class="btn active btn-lg btn-outline-success">
	<input type="radio" name="options" id="radio-option-1" autocomplete="off" checked="" >Đã xử lí
	</label>
	<label class="btn btn-lg btn-outline-success">
	<input type="radio" name="options" id="radio-option-2" autocomplete="off">Chưa xử lí
	</label>
	</div>

	</th>
	<th><a href="chitiethoadon.php?mahd='. $row["mahd"] .'"><button type="button" class="btn btn-info">Xem chi tiết</button></a></th>
	</tr>
	</tbody>';$i++;
}
?>