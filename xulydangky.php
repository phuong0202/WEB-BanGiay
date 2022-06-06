<?php 
require 'DataToibangiay.php';
if(isset($_REQUEST['username']))
{
	if (!isset($_REQUEST['username'])){
		die('');
	}
	$mavt=1;
	$username   = addslashes($_REQUEST['username']);
	$password   = addslashes($_REQUEST['password']);
	$email      = addslashes($_REQUEST['youremail']);
	$sdt      = addslashes($_REQUEST['sdt']);
	$date   = addslashes($_REQUEST['date']);
	$sql="SELECT * FROM nguoidung WHERE tendn='".$username."'";
	$result = DataToibangiay::executeQuery($sql);
	$row = mysqli_fetch_array($result);
	$password=md5($password);
	if($row>0) 
	{
		header('Location:index.php?id=dk&loi=1#1');
	}
	else
	{
		if(isset($_REQUEST['sex']))
		{
			$add="INSERT INTO `nguoidung`( `tendn`, `matkhau`, `email`, `sdt`,`ngaysinh`,`gioitinh`, `mavt`) VALUES ('".$username."','".$password."','".$email."','".$sdt."','".$date."','".$_REQUEST['sex']."','1')";
			$result1 = DataToibangiay::executeQuery($add);
			//echo $add;
			header('Location:index.php?id=dn#1');
		}
		else
		{
			$add="INSERT INTO `nguoidung`( `tendn`, `matkhau`, `email`, `sdt`,`ngaysinh`,`gioitinh`, `mavt`) VALUES ('".$username."','".$password."','".$email."','".$sdt."','".$date."','1','1')";
			$result1 = DataToibangiay::executeQuery($add);
			header('Location:index.php?id=dn#1');
		}
	}
}

if(isset($_GET['tendk']))
{
	$sql="SELECT * FROM nguoidung WHERE tendn='".$_REQUEST['tendk']."'";
	$result = DataToibangiay::executeQuery($sql);
	$row = mysqli_fetch_array($result);
	if($row>0)
	{
		echo '<br>
				<div class="alert alert-danger alert-dismissible fade show" id="danger">
					<strong>Tên đăng nhập đã tồn tại !</strong>
				</div>';
	}
	else {
		echo '<br>
				<div class="alert alert-primary alert-dismissible fade show" id="danger">
					<strong>Tên đăng nhập hợp lệ !</strong>
				</div>';
	}
	//echo "chao";
}
?>