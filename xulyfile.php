<?php 
require 'DataToibangiay.php';
$sql="SELECT * FROM sanpham WHERE hinh='".$_REQUEST['hinh']."'";
$result = DataToibangiay::executeQuery($sql);
$row = mysqli_fetch_array($result);
if($row>0)
{
	echo '<div class="alert alert-danger alert-dismissible fade show" id="danger" style="text-align: center;">
	<strong>File tải lên đã tồn tại trong hệ thống !</strong>
	</div>
	<div><input type="hidden"   id="hinh"  value="0"  /></div>';
}
else {
	echo '<br><div><input type="hidden"   id="hinh"  value="1"  /></div>';
}

?>