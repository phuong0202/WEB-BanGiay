<?php 
session_start();
require 'DataToibangiay.php';
//thiết lập giỏ hàng
$idsp=$_GET['idsp'];
$size=$_GET['size'];
if(isset($_SESSION['cart'][$idsp]))
{
	
	if($_SESSION['cart'][$idsp]<5){
		$soluong =$_SESSION['cart'][$idsp]+$_GET['sl'];
	}
	else $soluong=$_GET['sl'];
}
else{
	$soluong =$_GET['sl'];
}
$_SESSION['cart'][$idsp]= array($idsp,$soluong,$size);
//xóa sản phẩm trong giỏ
if(isset($_GET['idspx']))
{
	$idsp=$_GET['idspx'];
	$kt="SELECT * FROM hoadon WHERE tennd='".$_SESSION['username']."' AND xuly=0";
	$tv = DataToibangiay::executeQuery($kt);
	$tv1 = mysqli_fetch_array($tv);
	if(mysqli_num_rows($tv) == 0 )
	{
		unset($_SESSION['cart'][$idsp]);
		header('Location:index.php?id=gh#1');
	}
	else
	{
		$sql="DELETE FROM `chitiethoadon` WHERE masp=".$idsp." AND mahd=".$tv1["mahd"];
		$sql1="DELETE FROM `hoadon` WHERE  mahd=".$tv1["mahd"];
		DataToibangiay::executeQuery($sql);
		DataToibangiay::executeQuery($sql1);
		header('Location:index.php?id=gh#1');
	}
	
}
//thanh toán giỏ hàng
if(isset($_GET['thanhtoan']))
{
	$timestamp = time();
	$kt="SELECT * FROM hoadon WHERE tennd='".$_SESSION['username']."' AND xuly=0";
	$tv = DataToibangiay::executeQuery($kt);
	$tv1 = mysqli_fetch_array($tv);
	if(mysqli_num_rows($tv) == 0)
	{
		$sql1="INSERT INTO `hoadon`( `tennd`, `ngay`, `tongtien`, `xuly`) VALUES ('".$_SESSION['username']."','".$timestamp."','".$_GET['tongtien']."',1)";
		DataToibangiay::executeQuery($sql1);
		$sql2="SELECT Max(mahd) as lastmahd FROM hoadon";
		$result2 = DataToibangiay::executeQuery($sql2);
		$row2 = mysqli_fetch_array($result2); 
		$lastmahd=$row2['lastmahd'];
		foreach ($_SESSION['cart'] as $idsp) {
			$sql3="SELECT * FROM sanpham WHERE masp='".$idsp['0']."'";
			$result3 = DataToibangiay::executeQuery($sql3);
			$i=1;
			while ($row3 = mysqli_fetch_array($result3)){
				$thanhtien=$idsp['1']*$row3["gia"];
				$sql3="INSERT INTO `chitiethoadon`(`mahd`, `masp`,`maloai`,`tensp`,`size`, `soluong`, `dongia`, `thanhtien`) VALUES ('".$lastmahd."','".$idsp['0']."','".$row3['maloai']."','".$row3['tensp']."',".$idsp['2'].",'".$idsp['1']."','".$row3['gia']."','".$thanhtien."')";
				DataToibangiay::executeQuery($sql3);				
				$i++;
			}
			$sql4="UPDATE size SET soluong=size.soluong-".$idsp['1']." WHERE masize=".$idsp['2'].$idsp['0'];
				DataToibangiay::executeQuery($sql4);
		}
	}
	else
	{
		$sql1="UPDATE `hoadon` SET `ngay`='".$timestamp."',`tongtien`='".$_GET['tongtien']."' ,`xuly`=1 WHERE mahd='".$tv1["mahd"]."' ";
		DataToibangiay::executeQuery($sql1);
		$lastmahd=$tv1["mahd"];
		$xoa="DELETE FROM `chitiethoadon` WHERE mahd=".$tv1["mahd"];
		$xoa1 = DataToibangiay::executeQuery($xoa);
		foreach ($_SESSION['cart'] as $idsp) {
			$sql3="SELECT * FROM sanpham WHERE masp='".$idsp['0']."'";
			$result3 = DataToibangiay::executeQuery($sql3);
			$i=1;
			while ($row3 = mysqli_fetch_array($result3)){
				$thanhtien=$idsp['1']*$row3["gia"];
				$sql3="INSERT INTO `chitiethoadon`(`mahd`, `masp`,`maloai`,`tensp`,`size`, `soluong`, `dongia`, `thanhtien`) VALUES ('".$lastmahd."','".$idsp['0']."','".$row3['maloai']."','".$row3['tensp']."',".$idsp['2'].",'".$idsp['1']."','".$row3['gia']."','".$thanhtien."')";
				DataToibangiay::executeQuery($sql3);
				$i++;
			}
			$sql4="UPDATE size SET soluong=size.soluong-".$idsp['1']." WHERE masize=".$idsp['2'].$idsp['0'];
				DataToibangiay::executeQuery($sql4);
		}
	}
	unset($_SESSION['cart']);
	header('Location:index.php');
}
?>