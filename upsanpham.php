<?php require 'DataToibangiay.php';
  if (isset($_POST['masp']) && isset($_POST['malo']) && isset($_POST['name']) && isset($_POST['sl']) && isset($_POST['price']) && isset($_POST['image'])){
    $sql = "UPDATE sanpham SET" .
      " maloai='" . $_POST['malo'] . "'," . 
      " tensp='" . $_POST['name'] . "'," . 
      " soluong='" . $_POST['sl'] . "'," . 
      " gia=" . $_POST['price'] ."'," .
      " hinh=" . $_POST['image'] .
      " WHERE masp=" . $_POST['masp'] . ";";
    //echo $sql;
    DataProvider::executeQuery($sql);
  }
  /* Redirect to a different page in the current directory that was requested */
 $hostURL  = $_SERVER['HTTP_HOST'];
  $dirURL   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extraURL = 'editsanpham.php';
  $strURL = "http://" . $hostURL . $dirURL . "/" . $extraURL;
  //echo($strURL);
  header("Location:$strURL");
  exit;