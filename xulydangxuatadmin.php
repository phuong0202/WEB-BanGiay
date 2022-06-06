<?php session_start(); 
if (isset($_SESSION['usernameadmin'])){
	 //xóa login admin
    unset($_SESSION['usernameadmin']); // xóa session login
    setcookie('ckName', $_GET['tendangnhap']);
    setcookie('ckPass', $_GET['matkhau']);
    setcookie('ckName', '', time()-3600);
    setcookie('ckPass', '', time()-3600);
    header('Location:loginadmin.php');
}
?>