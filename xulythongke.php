<?php 
require 'DataToibangiay.php';
require 'functionajax.php';
$sql="SELECT max(masp) as maxmasp FROM sanpham";
$result = DataToibangiay::executeQuery($sql);
$row = mysqli_fetch_array($result);
$maxmasp=$row['maxmasp'];
GLOBAL $sql3;
GLOBAL $sql1;
GLOBAL $sql2;
//lấy thông tin nếu chi chọn ngày bắt đầu và đến
if($_GET['bd']!=null && $_GET['kt']!=null)
{
	
	$tu=strtotime($_GET['bd']);
	$den=strtotime($_GET['kt']);
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql3.="SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql3.=" SELECT   mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql3="SELECT l.tenloai,SUM(sl.tongtien) as tongtien FROM hoadon as h, sanpham as s ,loaisanpham as l,(".$sql3.") as sl WHERE s.masp=sl.masp AND s.maloai=l.maloai and h.mahd=sl.mahd and h.ngay BETWEEN ".$tu ." AND ".$den." GROUP BY s.maloai";
	//echo $sql3;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql1.="SELECT   mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql1.=" SELECT   mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql1="SELECT * FROM hoadon as h,(".$sql1.") as sl WHERE h.ngay BETWEEN ".$tu ." AND ".$den. "  and h.mahd=sl.mahd ORDER BY soluong DESC  LIMIT 10";
								//echo $sql1;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql2.="SELECT   mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql2.=" SELECT  mahd, masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql2="SELECT * FROM hoadon as h , (".$sql2.") as sl WHERE h.ngay BETWEEN ".$tu ." AND ".$den. " and h.mahd=sl.mahd ORDER BY sl.tongtien DESC  ";
								//echo $sql2;
}
//lấy thông tin nếu chi chọn ngày bắt đầu
if($_GET['bd']!=null && $_GET['kt']==null)
{

	$tu=strtotime($_GET['bd']);
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql3.="SELECT   mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql3.=" SELECT   mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql3="SELECT l.tenloai,SUM(sl.tongtien) as tongtien FROM hoadon as h, sanpham as s ,loaisanpham as l,(".$sql3.") as sl WHERE s.masp=sl.masp AND s.maloai=l.maloai AND h.mahd=sl.mahd and h.ngay > ".$tu." GROUP BY s.maloai";
	//echo $sql3;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql1.="SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql1.=" SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql1="SELECT * FROM hoadon as h,(".$sql1.") as sl WHERE h.ngay > ".$tu ." and  h.mahd=sl.mahd ORDER BY soluong DESC  LIMIT 10";
								//echo $sql1;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql2.="SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql2.=" SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql2="SELECT * FROM hoadon as h , (".$sql2.") as sl WHERE h.ngay > ".$tu ." and h.mahd=sl.mahd ORDER BY sl.tongtien DESC  ";
								//echo $sql2;
}
		//lấy thông tin nếu chi chọn ngày đến
if($_GET['bd']==null && $_GET['kt']!=null)
{

	$den=strtotime($_GET['kt']);
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql3.="SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql3.=" SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql3="SELECT l.tenloai,SUM(sl.tongtien) as tongtien FROM hoadon as h, sanpham as s ,loaisanpham as l,(".$sql3.") as sl WHERE s.masp=sl.masp AND s.maloai=l.maloai AND h.mahd=sl.mahd and h.ngay < ".$den." GROUP BY s.maloai";
	//echo $sql3;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql1.="SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql1.=" SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql1="SELECT * FROM hoadon as h,(".$sql1.") as sl WHERE h.ngay < ".$den. " AND  h.mahd=sl.mahd ORDER BY soluong DESC  LIMIT 10";
								//echo $sql1;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql2.="SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql2.=" SELECT  mahd,masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql2="SELECT * FROM hoadon as h , (".$sql2.") as sl WHERE h.ngay < ".$den. " AND  h.mahd=sl.mahd ORDER BY sl.tongtien DESC  ";
								//echo $sql2;
}
		//nếu không nhập
if($_GET['bd']==null && $_GET['kt']==null)
{
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql3.="SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql3.=" SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql3="SELECT l.tenloai,SUM(sl.tongtien) as tongtien FROM sanpham as s ,loaisanpham as l,(".$sql3.") as sl WHERE s.masp=sl.masp AND s.maloai=l.maloai GROUP BY s.maloai ";
	//echo $sql3;
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql1.="SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql1.=" SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql1="SELECT * FROM (".$sql1.") as sl  ORDER BY soluong DESC  LIMIT 10";
	for($i=1;$i<=$maxmasp;$i++)
	{
		if($i<$maxmasp)
		{
			$sql2.="SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i." UNION ";
		}
		else
		{
			$sql2.=" SELECT  masp,tensp,SUM(soluong)as soluong, SUM(thanhtien) as tongtien  FROM chitiethoadon WHERE masp=".$i;
		}
	}
	$sql2="SELECT * FROM (".$sql2.") as sl  ORDER BY tongtien DESC  ";
}
$result = DataToibangiay::executeQuery($sql);
echo'
<div class="row">
<div class="col-md-4">
<h2>Thống kê</h2>
</div>
<div class="col-md-8">	
<div class="row">
<div class="col-md-1">	Từ</div>
<div class="col-md-3">	<input class="form-control" value="'.$_GET['bd'].'"  name="tu" id="bd" type="date" style="width: 180px;"> </div>
<div class="col-md-1">	Đến</div>
<div class="col-md-3"><input class="form-control" value="'.$_GET['kt'].'" name="den" id="kt" type="date" style="width: 180px;" ></div>
<div class="col-md-1"></div>
<div class="col-md-3"><button class="btn btn-success" onclick="qlthongke()">Đi</button></div>
</div>	
</div>
</div>
<div class="row">
<div class="col-md-5">
<h3>Thống kê doanh thu loại sản phẩm</h3>
<table class="table table-hover">
<thead>
<tr>
<th>STT</th>
<th>Loại sản phẩm</th>
<th>Tổng tiền:VNĐ</th>
</tr>';


GLOBAL $tong;
$result3 = DataToibangiay::executeQuery($sql3);
$i=1;
while ($row3 = mysqli_fetch_array($result3)){
	if($i==4) break;
	echo'<tbody >
	<tr>
	<th>'.$i.'</th>
	<th>'.$row3["tenloai"].'</th>
	<th>'.number_format($row3["tongtien"]).'</th>
	</tr>
	</tbody>';$i++;
	
	$tong=$tong+$row3["tongtien"];
};
if($tong==0) $tong=0;
echo'
</thead >
</table>
<h1 style="color: red">TỔNG DOANH THU : '. number_format($tong).' VNĐ</h1>
</div>
<div class="col-md-7">
<h3>TOP 10 sản phẩm bán chạy nhất</h3>
<table class="table table-hover" id="thongke">
<thead>
<tr>
<th>STT</th>
<th>Tên sản phẩm</th>
<th>Tổng số lượng đã bán</th>
<th>Tổng tiền: VNĐ</th>
</tr>';




$result1 = DataToibangiay::executeQuery($sql1);
$i=1;
while ($row1 = mysqli_fetch_array($result1)){
	if($i==11) break;
	echo'<tbody >
	<tr>
	<th>'.$i.'</th>
	<th>'.$row1["tensp"].'</th>
	<th>'.$row1["soluong"].'</th>
	<th>'.number_format($row1["tongtien"]).'</th>
	</tr>
	</tbody>';$i++;
}
echo'
</thead >
</table>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h3>Thống kê doanh thu tất cả sản phẩm</h3><p>(theo tổng tiền)</p>
<table class="table table-hover" id="thongke">
<thead>
<tr>
<th>STT</th>
<th>Tên sản phẩm</th>
<th>Số lượng đã bán</th>
<th>Tổng tiền: VNĐ</th>
</tr>';



$result2 = DataToibangiay::executeQuery($sql2);
$i=1;
while ($row2 = mysqli_fetch_array($result2)){
	if($row2['tensp']==null) break;
	echo'<tbody >
	<tr>
	<th>'.$i.'</th>
	<th>'.$row2["tensp"].'</th>
	<th>'.$row2["soluong"].'</th>
	<th>'.number_format($row2["tongtien"]).'</th>
	</tr>
	</tbody>';$i++;
}
echo'
</thead >
</table>
</div>
</div>';
?>