<!DOCTYPE html>
<html>
<head>
	<title>ToiBanGiay.com</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
	include("header.php");
	$id = ((isset($_GET["id"])==true) ? $_GET["id"] : 0);
	switch ($id) {
		case 'NULL':
		include("product.php");
		break;
		case 'dk':
		if(isset($_SESSION['username'])) {
			echo '<h2 class="text-center">Bạn đang đăng nhập với tên tài khoản :'.$_SESSION['username'].'</h2><br>';
			break;
		}
		else{
			echo "<br>";
			include("dangky.php");
		}
		break;
		case 'dn':
		if(isset($_SESSION['username'])) {
			echo '<h2 class="text-center">Bạn đang đăng nhập với tên tài khoản :'.$_SESSION['username'].'</h2><br>';
			break;
		}
		else{
			echo "<br>";
			include("dangnhap.php");
		}
		
		break;
		case 'gh':
		echo "<br><br>";
		include("gh.php");
		break;
		case 'ctsp':
		echo "<br><br>";
		include("ctsp.php");
		break;
		case 'nike':
		echo "<br><br>";
		include("product.php");
		break;
		case 'adidas':
		echo "<br><br>";
		include("product.php");
		break;
		case 'asisc':
		echo "<br><br>";
		include("product.php");
		break;
		case 'hoadon':
		echo "<br><br>";
		include("hoadon.php");
		break;
		default:
			# code...
		break;
	}
	echo "<br><br><br>";
	include("footer.php");
	?>
</body>
</html>