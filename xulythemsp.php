<?php
session_start();
if(isset($_SESSION['usernameadmin']))
{
  require 'DataToibangiay.php';
$hostURL  = $_SERVER['HTTP_HOST'];
$dirURL   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extraURL = 'addsanpham.php';
$strURL = "http://" . $hostURL . $dirURL . "/" . $extraURL;
//echo $_FILES['hinh']['name'];
if(($_FILES['hinh']['type']=='image/jpeg' || $_FILES['hinh']['type']=='image/png' || $_FILES['hinh']['type']=='image/gif' ) )
{
  if($_FILES['hinh']['size']>400000)
  {
    header("Location:addsanpham.php?loifile=1");
  }
  else
  {
    move_uploaded_file($_FILES['hinh']['tmp_name'], './images/'.$_FILES['hinh']['name']);
    //echo "Thanh cong";
    $sql = " INSERT INTO `sanpham`( `maloai`, `tensp`, `gia`, `hinh`) VALUES ('".$_POST['loai']."','".$_POST['ten']."','".$_POST['gia']."','".$_FILES['hinh']['name']."')";
    DataToibangiay::executeQuery($sql);
    $masp="SELECT Max(masp) as lastmasp FROM sanpham";
    $result2=DataToibangiay::executeQuery($masp);
    $row2 = mysqli_fetch_array($result2); 
    $lastmasp=$row2['lastmasp'];
    for ($i=38; $i <=42; $i++) { 
      $sql1="INSERT INTO `size`(`masp`, `masize`, `soluong`) VALUES ('".$lastmasp."','".$i.$lastmasp."','".$_POST["soluong".$i]."')";
      //echo $sql1;
      DataToibangiay::executeQuery($sql1);
    }
    //echo $sql1;
    header("Location:qlsp.php");
  }  
}
else  header("Location:$strURL?loi=1");
}
else echo "Bạn chưa đăng nhập";
?>