<?php	require 'DataToibangiay.php';
	if (isset($_REQUEST['masp'])){
		$masp = $_REQUEST['masp'];
		$sql = "select * from sanpham where masp=" . $masp;
		$result = DataToibangiay::executeQuery($sql);
		$row = mysqli_fetch_array($result);
		$malo = $row['maloai'];
		$name = $row['tensp'];
		$sl = $row['soluong'];
		$price = $row['gia'];
		$image = $row['hinh'];
	}?>
<form action='upsanpham.php' method='post'>
	<input type='hidden' name='masp' value="<?php echo($masp); ?>">
	<table align='center'>
		<tr>
		<td>Mã loại</td>
		<td><input type='text' name='malo' 
			value="<?php echo($malo);?>" /></td>
		</tr>
		<tr>
		<td>Tên sản phẩm</td>
		<td><input type='text' name='name' 
			value="<?php echo($name);?>" /></td>
		</tr>
		<tr>
		<td>Số lượng</td>
		<td>
			<input type='text' name='sl'
			value="<?php echo($sl);?>">
		</td>
		</tr>
		<tr>
		<td>Gía</td>
		<td>
			<input type='text' name='gia'
			value="<?php echo($price);?>">
		</td>
		</tr>
		<tr>
		<td>Hình: </td>
		<td>
			<input type='file' name='hinh' 
			value="<?php echo($image);?>">
		</td>
		</tr>
		<tr>
		<td><input type='submit' value='Cập nhật'></td>
		<td><input type='reset' value='Làm lại'></td>
		</tr>
	</table>
</form>
