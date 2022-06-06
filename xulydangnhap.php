<?php
session_start();
require 'DataToibangiay.php';
if(isset($_REQUEST['loai']))
{
	$loai = $_REQUEST['loai'];
	switch($loai)
	{
		case 0: // login
			if(login())
				header('Location:index.php');
			else
				header('Location:index.php?id=dn&loi=1#1');
			break;
			
		case 1: // logout
			$_SESSION['username'] = NULL;
			header('Location:index.php');
			break;
			
		default: // do nothing
			header('Location:index.php');			
			break;
	}
}

// trả về true || false
function login()
{
	$username = $_REQUEST['txtUser'];
	$password = $_REQUEST['txtPass'];
	
	// giả sử dữ liệu đúng
	
	
	$sQuery = "SELECT * FROM nguoidung WHERE tendn='".$username."'";
	
	$result = DataToibangiay::executeQuery($sQuery);
	
	if(mysqli_num_rows($result) == 1)
	{
		$row = mysqli_fetch_array($result);
		
		//$row[0] ~ $row['username']
		if ($row['matkhau'] == md5($password))
		{
			// login đúng
			$_SESSION['username'] = $username;
			//echo('Logined');
			
			
			return true;
		}
	}
	
	mysqli_close($con);
		
	// lỗi
	//header('Location:dangnhap.php?loi=1');
	return false;
}
//xu ly dang nhap trang admin
if(isset($_REQUEST['dn']))
{
	$loai = $_REQUEST['dn'];
	switch($loai)
	{
		case 1: // login
			if(loginadmin())
				header('Location:qlsp.php');
			else
				header('Location:loginadmin.php?loi=1');
			break;
		default: // do nothing
			header('Location:admin.php');			
			break;
	}
}

// trả về true || false
function loginadmin()
{
	$username = $_REQUEST['tendangnhap'];
	$password = $_REQUEST['matkhau'];
	
	// giả sử dữ liệu đúng
	
	
	$sQuery = "SELECT * FROM nguoidung WHERE tendn='".$username."' and mavt=0";
	
	$result = DataToibangiay::executeQuery($sQuery);
	
	if(mysqli_num_rows($result) == 1)
	{
		$row = mysqli_fetch_array($result);
		
		//$row[0] ~ $row['username']
		if ($row['matkhau'] == md5($password))
		{
			// login đúng
			$_SESSION['usernameadmin'] = $username;
			//echo('Logined');
			
			
			return true;
		}
	}
	
	mysqli_close($con);
		
	// lỗi
	//header('Location:dangnhap.php?loi=1');
	return false;
}
?>