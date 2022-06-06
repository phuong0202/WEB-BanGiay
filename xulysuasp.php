<?php
session_start();
if(isset($_SESSION['usernameadmin']))
{
	require 'DataToibangiay.php';
$hostURL  = $_SERVER['HTTP_HOST'];
$dirURL   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extraURL = 'qlsp.php';
$strURL = "http://" . $hostURL . $dirURL . "/" . $extraURL;
if(isset($_FILES['hinh']['name']) && ($_FILES['hinh']['type']=='image/jpeg' || $_FILES['hinh']['type']=='image/png' || $_FILES['hinh']['type']=='image/gif' ))
{
	if($_FILES['hinh']['size']<400000)
	{
		move_uploaded_file($_FILES['hinh']['tmp_name'], './images/'.$_FILES['hinh']['name']);
    //echo "Thanh cong";
		$sql = "UPDATE sanpham SET maloai='" . $_POST['loai'] . "', tensp='" . $_POST['ten'] . "', gia='" . $_POST['gia'] . "', hinh='" . $_FILES['hinh']['name'] . "' WHERE masp=".$_POST['idsp'];
		DataToibangiay::executeQuery($sql);
		for ($i=38; $i <=42; $i++) { 
			$sql1="UPDATE  size SET soluong=" . $_POST["soluong".$i] . " WHERE masp=".$_POST['idsp']." and masize=".$i.$_POST['idsp'];
			//echo $sql1;}
			DataToibangiay::executeQuery($sql1);}
			header("Location:$strURL");
		}
		else header("Location:editsanpham.php?idsp=".$_POST['idsp']."&loifile=1");
	}
	else
	{
		$sql = "UPDATE sanpham SET maloai='" . $_POST['loai'] . "', tensp='" . $_POST['ten'] . "', gia='" . $_POST['gia'] . "', hinh='" . $_POST['h'] . "' WHERE masp=".$_POST['idsp'];
		DataToibangiay::executeQuery($sql);
		for ($i=38; $i <=42; $i++) { 
			$sql1="UPDATE  size SET soluong=" . $_POST["soluong".$i] . " WHERE masp=".$_POST['idsp']." and masize=".$i.$_POST['idsp'];
		//echo $sql1;}
			DataToibangiay::executeQuery($sql1);}
			header("Location:$strURL");
		}
//echo $sql;
}
else echo "Bạn chưa đăng nhập";
?>