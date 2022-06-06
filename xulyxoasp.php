<?php 
require 'DataToibangiay.php';
if(isset($_GET['idsp']))
{
	$sql="DELETE FROM `sanpham` WHERE masp=".$_GET['idsp'];
}
DataToibangiay::executeQuery($sql);
header("Location:qlsp.php");
?>