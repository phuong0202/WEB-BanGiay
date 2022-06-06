
<?php 
require 'functionajax.php';
$sql="SELECT COUNT(*) AS numrows FROM sanpham";
$result1 = DataToibangiay::executeQuery($sql);
$row1 = mysqli_fetch_array($result1);
$numrows=$row1['numrows'];
$rowsPerPage=6;
$pageNum=1;
if(isset($_GET['page']))
{
	$pageNum=$_GET['page'];
}
$offset=($pageNum-1)*$rowsPerPage;
$sql="SELECT * FROM sanpham  LIMIT ".$offset.",".$rowsPerPage;
if (isset($_GET["id"]))
{
	$id=$_GET["id"];
	$loai = ",loaisanpham as l where s.maloai=l.maloai and l.tenloai=N'".$_GET["id"]."'";
	$sql="SELECT COUNT(*) AS numrows FROM sanpham as s ".$loai;
	$result1 = DataToibangiay::executeQuery($sql);
	$row1 = mysqli_fetch_array($result1); 
	$numrows=$row1['numrows'];
	$sql="SELECT * FROM sanpham  as s ".$loai."  LIMIT ".$offset.",".$rowsPerPage;
}
// tim kien san pham thuong
if(isset($_GET["idsp"]))
{
	$idsp=$_GET["idsp"];
	$sql = "SELECT * FROM sanpham  WHERE tensp like '%" . $_GET['idsp'] . "%'  LIMIT ".$offset.",".$rowsPerPage;
	$slsp = "SELECT count(*) as numrows FROM sanpham WHERE tensp like '%" . $_GET['idsp'] . "%'";
	$result1 = DataToibangiay::executeQuery($slsp);
	$row1 = mysqli_fetch_array($result1);
	$numrows=$row1['numrows'];
	echo "<div class='row'>
	<div class='col-sm-12 ' id='kq1' style='text-align:center;'>Kết quả tìm kiếm :".$numrows." </div>
	</div>";
	//echo $sql;

}
$result = DataToibangiay::executeQuery($sql);
$maxPage=ceil($numrows/$rowsPerPage);
$seft="index.php";
$nav="";
if($maxPage>5)
{
	if($pageNum==1)
	{
		for ($page=1; $page <=3; $page++) { 
			if($page==$pageNum){
				$nav.="<li class='page-item'><button class='page-link' >$page</button></li>";
			}
			else 
			{
				if(isset($_GET["id"])){
					$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
				}
				else
				{

					if (isset($_GET["idsp"])){
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
					}
					else
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
				}

			}
		}
		$nav=$nav."<li class='page-item'><button class='page-link' >...</button></li>";
	}
	else{
		for ($page=$pageNum-1; $page <=$pageNum +1; $page++) { 
			if($page==$pageNum){
				$nav.="<li class='page-item'><button class='page-link' >$page</button></li>";
			}
			else 
			{
				if(isset($_GET["id"])){
					$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
				}
				else
				{

					if (isset($_GET["idsp"])){
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
					}
					else
						$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
				}

			}
		}
		$nav="<li class='page-item'><button class='page-link' >...</button></li>".$nav."<li class='page-item'><button class='page-link' >...</button></li>";
	}
	
}
else{
	for ($page=1; $page <=$maxPage; $page++) { 
		if($page==$pageNum){
			$nav.="<li class='page-item'><button class='page-link' >$page</button></li>";
		}
		else 
		{
			if(isset($_GET["id"])){
				$nav.="<li class='page-item'><button class='page-link' onclick='phantrangloaisp($page)'>$page</button></li>";
			}
			else
			{

				if (isset($_GET["idsp"])){
					$nav.="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'>$page</button></li>";
				}
				else
					$nav.="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>$page</button></li>";
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
	else
	{
		if (isset($_GET["idsp"])){
			$prev="<li class='page-item'><button class='page-link' onclick='phantrangsearch($page,".$_GET['idsp'].")'><</button></li>";
			$first="<li class='page-item'><button class='page-link' onclick='phantrangsearch(1,".$_GET['idsp'].")'>Trang đầu</button></li>";
		}
		else
		{
			$prev="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'><</button></li>";
			$first="<li class='page-item'><button class='page-link' onclick='phantrangindex(1)'>Trang đầu</button></li>";
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
	else
	{
		if (isset($_GET["idsp"])){
			$next="<li class='page-item'><button class='page-link'onclick='phantrangsearch($page,".$_GET['idsp'].")'>></button></li>";
			$last="<li class='page-item'><button class='page-link' onclick='phantrangsearch($maxPage,".$_GET['idsp'].")'>Trang cuối</button></li>";
		}
		else{
			$next="<li class='page-item'><button class='page-link' onclick='phantrangindex($page)'>></button></li>";
			$last="<li class='page-item'><button class='page-link' onclick='phantrangindex($maxPage)'>Trang cuối</button></li>";
		}
	}

}
else
{
	$next="&nbsp";
	$last="&nbsp";
}

?>