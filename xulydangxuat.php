<?php session_start(); 
require 'DataToibangiay.php';
if (isset($_SESSION['username'])){
    //lưu lại giỏ hàng của người dùng
	$timestamp = time();	
	GLOBAL $tongtien;
	$kt="SELECT * FROM hoadon WHERE tennd='".$_SESSION['username']."' AND xuly=0";
	$tv = DataToibangiay::executeQuery($kt);
	$tv1 = mysqli_fetch_array($tv);
	if(mysqli_num_rows($tv) == 0 )
	{
		if(isset($_SESSION['cart']))
		{
			$sql1="INSERT INTO `hoadon`( `tennd`, `ngay`, `tongtien`, `xuly`) VALUES ('".$_SESSION['username']."','".$timestamp."','".$tongtien."',0)";
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
					$i++;

					$tongtien=$tongtien+$thanhtien;
					DataToibangiay::executeQuery($sql3);
				}
			}
			$sql5="UPDATE  `hoadon` SET `tongtien`='".$tongtien."' WHERE mahd=".$lastmahd;
			DataToibangiay::executeQuery($sql5);
		}
		
	}
	else
	{
		$sql2="SELECT *  FROM hoadon WHERE mahd=".$tv1["mahd"];
		$result2 = DataToibangiay::executeQuery($sql2);
		$row2 = mysqli_fetch_array($result2); 
		$lastmahd=$row2['mahd'];
		$xoa="DELETE FROM `chitiethoadon` WHERE mahd=".$tv1["mahd"];
		$xoa1 = DataToibangiay::executeQuery($xoa);
		foreach ($_SESSION['cart'] as $idsp) {
			$sql3="SELECT * FROM sanpham WHERE masp='".$idsp['0']."'";
			$result3 = DataToibangiay::executeQuery($sql3);
			$i=1;
			while ($row3 = mysqli_fetch_array($result3)){
				$thanhtien=$idsp['1']*$row3["gia"];
				$sql3="INSERT INTO `chitiethoadon`(`mahd`, `masp`,`maloai`,`tensp`,`size`, `soluong`, `dongia`, `thanhtien`) VALUES ('".$lastmahd."','".$idsp['0']."','".$row3['maloai']."','".$row3['tensp']."',".$idsp['2'].",'".$idsp['1']."','".$row3['gia']."','".$thanhtien."')";
				$i++;
				$tongtien=$tongtien+$thanhtien;
				DataToibangiay::executeQuery($sql3);
			}
		}
		$sql4="UPDATE `hoadon` SET `ngay`='".$timestamp."',`tongtien`='".$tongtien."' WHERE mahd='".$tv1["mahd"]."'";
		DataToibangiay::executeQuery($sql4);	
	} 
    unset($_SESSION['username']); // xóa session login
    setcookie('ckName', $_GET['txtName']);
    setcookie('ckPass', $_GET['txtPass']);
    setcookie('ckName', '', time()-3600);
    setcookie('ckPass', '', time()-3600);
    unset($_SESSION['cart']);//xóa giỏ hàng
    header('Location:index.php');
}
?>