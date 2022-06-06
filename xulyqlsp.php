 	<?php 	
require 'DataToibangiay.php';
$idsp=$_GET['idsp'];
echo '
<thead>
<tr>
<th>STT</th>
<th>Mã loại</th>
<th>Tên</th>
<th>Size---SL</th>
<th>Tổng SL</th>
<th>Giá :VNĐ</th>
<th>Hình</th>
<th>Tùy chọn</th>
</tr>
</thead>';
$sql = "SELECT * FROM sanpham WHERE tensp like '%" . $idsp . "%'";
//echo $sql;
$result = DataToibangiay::executeQuery($sql);
$i = 1;
while ($row = mysqli_fetch_array($result)) 
{
	echo'<tbody>';
	echo'<tr>
	<th>'.$i.'</th>
	<th>'.$row["maloai"].'</th>
	<th>'.$row["tensp"].'</th>';
	$size="SELECT * FROM sanpham as s , size WHERE s.masp=size.masp AND s.masp=".$row['masp'];
	$result1 = DataToibangiay::executeQuery($size);
	GLOBAL $tongsoluong;
	echo'<th>';
	while ($row1 = mysqli_fetch_array($result1))
	{
		echo substr($row1["masize"], 0,2).'----'.$row1['soluong'].'<br>';
		$tongsoluong=$tongsoluong+$row1['soluong'];
	}
	echo'</th>';
	echo'<th>'.$tongsoluong.'</th>';
	$tongsoluong=0;
	echo'
	<th>'.number_format($row["gia"]).'</th>
	<th><div class="col-sm-2 hidden-xs"><a href="editsanpham.php?idsp='.$row["masp"].'"><img  src="Images/'.$row["hinh"].'" class="img-responsive" width="100"></a></div>
	</div> </th> 
	<th>
	<a href="editsanpham.php?idsp='.$row["masp"].'">
	<button  class="btn btn-info">Sửa</button></a>
	<button  class="btn btn-danger" onclick="xoasp('.$row["masp"].')">Xóa</button></a>
	</th>
	</tr>
	</tbody>';
}
?>