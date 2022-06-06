<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
<?php 
require 'DataToibangiay.php';
$rowsPerPage=6;
$pageNum=1;
if(isset($_GET['page']))
{
	$pageNum=$_GET['page'];
}
$offset=($pageNum-1)*$rowsPerPage;
// tim kien san pham thuong
if(isset($_GET["idsp"]))
{
	$idsp=$_GET["idsp"];
	$sql = "SELECT * FROM sanpham  WHERE tensp like '%" . $_GET['idsp'] . "%'  LIMIT ".$offset.",".$rowsPerPage;
	$slsp = "SELECT count(*) as numrows FROM sanpham WHERE tensp like '%" . $_GET['idsp'] . "%'";
	$result1 = DataToibangiay::executeQuery($slsp);
	$row1 = mysqli_fetch_array($result1);
	$numrows=$row1['numrows'];
}
if(isset($_GET["index"]))
{
	$sql="SELECT COUNT(*) AS numrows FROM sanpham";
	$result1 = DataToibangiay::executeQuery($sql);
	$row1 = mysqli_fetch_array($result1);
	$numrows=$row1['numrows'];
	$sql="SELECT * FROM sanpham  LIMIT ".$offset.",".$rowsPerPage;
}
// trang loai san pham
if (isset($_GET["id"]))
{
	$id=$_GET["id"];
	$loai = ",loaisanpham as l where s.maloai=l.maloai and l.tenloai=N'".$id."'";
	$sql="SELECT COUNT(*) AS numrows FROM sanpham as s ".$loai;
	$result1 = DataToibangiay::executeQuery($sql);
	$row1 = mysqli_fetch_array($result1);
	$numrows=$row1['numrows'];
	$sql="SELECT * FROM sanpham  as s ".$loai."  LIMIT ".$offset.",".$rowsPerPage;
}
// tim kiem nang cao
if(isset($_GET["size"]))
{
	if($_GET["size"]==0)
	{
		$gia=$_GET["price"];
		list($dau,$cuoi) = explode('-', $gia);
		if(isset($_GET["loai"]))
		{
			$loai=strtolower($_GET["loai"]);
			$sql1="SELECT COUNT(*) AS numrows FROM sanpham as s,loaisanpham as l WHERE  s.maloai=l.maloai and l.tenloai='" . 
			$loai . "'and s.gia between ".$dau." and ".$cuoi." "  ;
			$result1 = DataToibangiay::executeQuery($sql1);
			$row1 = mysqli_fetch_array($result1);
			$numrows=$row1['numrows'];
			$sql="SELECT * FROM sanpham as s,loaisanpham as l WHERE  s.maloai=l.maloai and l.tenloai='" . 
			$loai . "'and s.gia between ".$dau." and ".$cuoi." LIMIT ".$offset.",".$rowsPerPage; ;
			$kq=0;
		}
		else {
			$sql1="SELECT COUNT(*) AS numrows FROM sanpham as s  WHERE s.gia between ".$dau." and ".$cuoi  ;
			$result1 = DataToibangiay::executeQuery($sql1);
			$row1 = mysqli_fetch_array($result1);
			$numrows=$row1['numrows'];
			$sql="SELECT * FROM sanpham as s  WHERE s.gia between ".$dau." and ".$cuoi." LIMIT ".$offset.",".$rowsPerPage;
		}
	}
	if($_GET["size"]>0)
	{
		$gia=$_GET["price"];
		list($dau, $cuoi) = explode('-', $gia);
		if(isset($_GET["loai"]))
		{
			$loai=strtolower($_GET["loai"]);
			$sql1="SELECT COUNT(*) AS numrows FROM sanpham as s , size as si,loaisanpham as l WHERE s.masp=si.masp and s.maloai=l.maloai and l.tenloai='" . $loai . "'and  si.masize like'".$_GET["size"]."%' and s.gia between ".$dau." and ".$cuoi." "  ;
			$result1 = DataToibangiay::executeQuery($sql1);
			$row1 = mysqli_fetch_array($result1);
			$numrows=$row1['numrows'];
			$sql="SELECT * FROM sanpham as s , size as si,loaisanpham as l WHERE s.masp=si.masp and s.maloai=l.maloai and l.tenloai='" . $loai . "'and  si.masize like'".$_GET["size"]."%' and s.gia between ".$dau." and ".$cuoi." LIMIT ".$offset.",".$rowsPerPage;
		}
		else {
			$sql1="SELECT COUNT(*) AS numrows FROM sanpham as s , size as si WHERE s.masp=si.masp and  si.masize like'".$_GET["size"]."%' and s.gia between ".$dau." and ".$cuoi  ;
			$result1 = DataToibangiay::executeQuery($sql1);
			$row1 = mysqli_fetch_array($result1);
			$numrows=$row1['numrows'];
			$sql="SELECT * FROM sanpham as s , size as si WHERE s.masp=si.masp and  si.masize like'".$_GET["size"]."%' and s.gia between ".$dau." and ".$cuoi." LIMIT ".$offset.",".$rowsPerPage;
		}
	}
	echo "<div class='row'>
	<div class='col-sm-12 ' style='text-align:center;'>Kết quả tìm kiếm :".$numrows." </div>
	</div>";
}
//ket noi db va hien thi ket qua
$result = DataToibangiay::executeQuery($sql);
$i=0;
//echo $sql;
echo '<div class="row"  >';
while ($row = mysqli_fetch_array($result)){ 
	echo '
	<div class="col-md-4 col-sm-6 col-12 mb-3">
	<div class="card card-product">
	<img src="Images/'.$row["hinh"].'" class="card-img-top" alt="...">
	<div class="card-body">
	<h5 class="card-title product-title" id='. $row["masp"] .'>'. $row["tensp"] .'</h5>
	<div class="card-text product-price">
	<span class="price">'.number_format($row["gia"]).' vnđ</span>
	<br>
	</div>
	<a class="btn btn-outline-info btn-detail" href="index.php?id=ctsp&idsp='.$row["masp"].'#1">Xem chi tiết</a>
	</div>
	</div>
	</div>
	';$i++;
}

//phan trang
$maxPage=ceil($numrows/$rowsPerPage);
$seft="index.php";
$nav="";
if($maxPage>5)
{
	if($pageNum==1)
	{
		for ($page=1; $page <=3; $page++) { 
			if($page==$pageNum){
				$nav.="<li class='page-item'><a class='page-link' >$page</a></li>";
			}
			else 
			{
				if(isset($_GET["id"])){
					$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
				}
				else{
					if (isset($_GET["idsp"])){
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
					}
					else{

						if( isset($_GET["loai"])){
							$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
						}
						else{
							if(isset($_GET["size"]) && isset($_GET["loai"])==false){
								$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
							}
							else
							{
								$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
							}
						}

					}
				}
			}
		}
		$nav=$nav."<li class='page-item'><button class='page-link' >...</button></li>";
	}
	else{
		if($pageNum<$maxPage)
		{
			for ($page=$pageNum-1; $page <=$pageNum+1; $page++) { 
				if($page==$pageNum){
					$nav.="<li class='page-item'><a class='page-link' >$page</a></li>";
				}
				else 
				{
					if(isset($_GET["id"])){
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
					}
					else{
						if (isset($_GET["idsp"])){
							$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
						}
						else{

							if( isset($_GET["loai"])){
								$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
							}
							else{
								if(isset($_GET["size"]) && isset($_GET["loai"])==false){
									$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
								}
								else
								{
									$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
								}
							}

						}
					}
				}
			}
			$nav="<li class='page-item'><button class='page-link' >...</button></li>".$nav."<li class='page-item'><button class='page-link' >...</button></li>";
		}
		else{
			for ($page=$pageNum-2; $page <=$pageNum; $page++) { 
				if($page==$pageNum){
					$nav.="<li class='page-item'><a class='page-link' >$page</a></li>";
				}
				else 
				{
					if(isset($_GET["id"])){
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
					}
					else{
						if (isset($_GET["idsp"])){
							$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
						}
						else{

							if( isset($_GET["loai"])){
								$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
							}
							else{
								if(isset($_GET["size"]) && isset($_GET["loai"])==false){
									$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
								}
								else
								{
									$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
								}
							}

						}
					}
				}
			}
			$nav="<li class='page-item'><button class='page-link' >...</button></li>".$nav;
		}
		
	}
	
}
else{
	for ($page=1; $page <=$maxPage; $page++) { 
		if($page==$pageNum){
			$nav.="<li class='page-item'><a class='page-link' >$page</a></li>";
		}
		else 
		{
			if(isset($_GET["id"])){
				$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
			}
			else{
				if (isset($_GET["idsp"])){
					$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
				}
				else{

					if( isset($_GET["loai"])){
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
					}
					else{
						if(isset($_GET["size"]) && isset($_GET["loai"])==false){
							$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>$page</button></li>";
						}
						else
						{
							$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
						}
					}

				}
			}
		}
	}
}

if($pageNum>1)
{
	$page=$pageNum-1;
	if(isset($_GET["id"])){
		$prev="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'><</button></li>";
		$first="<li class='page-item'><button class='page-link' onclick='phantrangloaisp(1)'>Trang đầu</button></li>";
	}
	else{
		if (isset($_GET["idsp"])){
			$prev="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'><</button></li>";
			$first="<li class='page-item'><button class='page-link' onclick='phantrangsearch(1,".$_GET['idsp'].")'>Trang đầu</button></li>";

		}
		else{
			if(isset($_GET["loai"])){

				$prev="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'><</button></li>";
				$first="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc(1)'>Trang đầu</button></li>";
			}
			else{
				if(isset($_GET["size"]) && isset($_GET["loai"])==false){
					$prev="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'><</button></li>";
					$first="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc(1)'>Trang đầu</button></li>";
				}
				else
				{
					$prev="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'><</button></li>";
					$first="<li class='page-item'><button class='page-link' onclick='phantrangindex(1)'>Trang đầu</button></li>";
				}
			}

		}
	}	
}
else
{
	$prev="&nbsp";
	$first="&nbsp";
}
if($pageNum<$maxPage)
{
	$page=$pageNum+1;
	if(isset($_GET["id"])){
		$next="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>></button></li>";
		$last="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($maxPage)'>Trang cuối</button></li>";
	}
	else{
		if (isset($_GET["idsp"])){
			$next="<li class='page-item'><button class='page-link'onclick='phantrangsearch($page,".$_GET['idsp'].")'>></button></li>";
			$last="<li class='page-item'><button class='page-link' onclick='phantrangsearch($maxPage,".$_GET['idsp'].")'>Trang cuối</button></li>";

		}
		else{
			if(isset($_GET["loai"])){

				$next="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>></button></li>";
				$last="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($maxPage)'>Trang cuối</button></li>";
			}
			else{
				if(isset($_GET["size"]) && isset($_GET["loai"])==false){
					$next="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($page)'>></button></li>";
					$last="<li class='page-item'><button class='page-link' onclick='phantrangsearchnc($maxPage)'>Trang cuối</button></li>";
				}
				else
				{
					$next="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>></button></li>";
					$last="<li class='page-item'><button class='page-link' onclick='phantrangindex($maxPage)'>Trang cuối</button></li>";
				}
			}

		}
	}
}
else
{
	$next="&nbsp";
	$last="&nbsp";
}
echo'
<div class="container">
<div class="row" >
<div class="col-sm-3" ></div>
<div class="col-sm-9" >
<nav aria-label="Page navigation example">
<ul class="pagination  justify-content-center" >'.$first.$prev.$nav.$next.$last.'
</ul>
</nav>
</div>
</div>
</div>
</div>';
?>