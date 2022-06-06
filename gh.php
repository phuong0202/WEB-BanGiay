<?php 
require 'functionajax.php';
if(isset($_SESSION['username']))
{
  $kt="SELECT * FROM hoadon as h , chitiethoadon as c WHERE h.mahd=c.mahd AND h.tennd='".$_SESSION['username']."' AND h.xuly=0";
  $tv = DataToibangiay::executeQuery($kt);
  while ($tv1 = mysqli_fetch_array($tv)){
    $_SESSION['cart'][$tv1['masp']]= array($tv1['masp'],$tv1['soluong'],$tv1['size']);
  }
  $tongtien=0;
}

if(isset($_SESSION['cart']))
{
  echo'
  <h2 class="text-center">Giỏ hàng của bạn</h2><br>
  <div class="container"> 
  <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
  <tr> 
  <th style="width:40%">Tên sản phẩm</th> 
  <th style="width:5%">Size</th>
  <th style="width:20%;text-align: center;" >Giá</th> 
  <th style="width:10%;text-align: center;">Số lượng</th> 
  <th style="width:20%" class="text-center">Thành tiền</th> 
  <th style="width:5%">Tùy chọn</th> 
  </tr> 
  </thead> 
  <tbody >';
  
  foreach ($_SESSION['cart'] as $idsp) {
  # code...
    $sql="SELECT * FROM sanpham WHERE masp='".$idsp['0']."'";
    $result = DataToibangiay::executeQuery($sql);
    $i=1;
    while ($row = mysqli_fetch_array($result)){
      echo '
      <tr > 
      <td data-th="Product"> 
      <div class="row"> 
      <div class="col-sm-2 hidden-xs"><a href="index.php?id=ctsp&idsp='.$row["masp"].'#1"><img  src="Images/'.$row["hinh"].'" class="img-responsive" width="100"></a></div>
      </div> 
      <div class="col-sm-9"> 
      <h4 class="nomargin"><a href="index.php?id=ctsp&idsp='.$row["masp"].'#1">'.
      $row["tensp"].'</a></h4> 
      </div> 
      </div> 
      </td> 
      <td data-th="size">'.$idsp['2'].'</td> 
      <td data-th="Price" style="text-align: center;">';echo number_format($row["gia"]).' VNĐ</td> 
      <td data-th="Quantity">
      <input class="form-control text-center" value="'.$idsp['1'].'" disabled>
      </td> ';
      $thanhtien=$idsp['1']*$row["gia"];
      echo'
      <td data-th="Subtotal" class="text-center" id="thanhtien">';echo number_format($thanhtien).' VNĐ</td> 
      <td class="actions" data-th="">
      <button class="btn btn-light btn-sm" ><a href="xulygiohang.php?idspx='. $row["masp"] .'"><i class="fa fa-trash-o">Xóa</i></a>
      </button>
      </td> 
      </tr> ';
      $i++;
      GLOBAL $tongtien;
      $tongtien=$tongtien+$thanhtien;
    }
  }
  echo '</tbody>
  <tfoot> 
  <tr> 
  <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
  </td> 
  <td colspan="2" class="hidden-xs"> </td>
  <td> </td> ';
  echo'
  <td class="hidden-xs text-center"><strong style="color :red;">Tổng tiền: ';echo number_format($tongtien).' VNĐ</strong>
  </td> 
  <td>';
  if($_SESSION['cart']!=null)
  {
    echo '<a onclick="thanhtoan('.$tongtien.')" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>';
  }
  else
  {
    echo '<a class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>';
  }
  echo'
  </td> 
  </tr> 
  </tfoot> 
  </table>
  </div>';

}
else{
  if(isset($_SESSION['username']))
  {
    echo '<h2 class="text-center">Giỏ hàng của bạn đang rỗng !</h2><br>';
  }
  else 
  {
    echo '<h2 class="text-center">Bạn cần đăng nhập trước khi mua hàng !</h2><br>';
  }
  
}
?>


<!-- <----------------------------- -->
<style type="text/css">.table&amp;amp;gt;tbody&amp;amp;gt;tr&amp;amp;gt;td, .table&amp;amp;gt;tfoot&amp;amp;gt;tr&amp;amp;gt;td {  
  vertical-align: middle;


  @media screen and (max-width: 600px) { 
    table#cart tbody td .form-control { 
      width:20%; 
      display: inline !important;
    } 

    .actions .btn { 
      width:36%; 
      margin:1.5em 0;
    } 

    .actions .btn-info { 
      float:left;
    } 

    .actions .btn-danger { 
      float:right;
    } 

    table#cart thead {
      display: none;
    } 

    table#cart tbody td {
      display: block;
      padding: .6rem;
      min-width:320px;

    } 

    table#cart tbody tr td:first-child {
      background: #333;
      color: #fff;
    } 

    table#cart tbody td:before { 
      content: attr(data-th);
      font-weight: bold; 
      display: inline-block;
      width: 8rem;
    } 

    table#cart tfoot td {

      display:block;
    } 
    table#cart tfoot td .btn {
      display:block;
    }
  }}</style>
