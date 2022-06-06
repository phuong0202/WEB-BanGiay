<?php
require 'DataToibangiay.php';

if (isset($_POST['maloai']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['image']) && isset($_POST['sl'])){
	$sql = "INSERT INTO sanpham(maloai, tensp, gia, hinh, soluong) VALUES(" .
   "'" . $_POST['maloai'] . "',".
   "'" . $_POST['title'] . "'," . 
   "'" . $_POST['price'] . "'," . 
   "'" . $_POST['image'] . "'," . 
   "" . $_POST['sl'] . ")";
   DataToibangiay::executeQuery($sql);
}
header('Location:qlsp.php');
?>