
<?php  
require 'functionajax.php';
$idsp=$_GET["idsp"];
$sql1="SELECT * FROM sanpham WHERE masp=";
$sql=$sql1.$idsp;
$size="SELECT masize FROM size WHERE masp=".$idsp." and soluong>0";

$result = DataToibangiay::executeQuery($sql);
$result1 = DataToibangiay::executeQuery($size);
$i=1;
while ($row = mysqli_fetch_array($result)){
	echo '

	<div class="container">
	<div class="row">
	<div class="col-sm-4">
	<div class="card-body">
	<img src="Images/';echo $row["hinh"].'" class="card-img-top">
	</div>
	</div>
	<div class="col-sm-8">
	<h1 class="title-head" style="font-weight: bold;">';
	echo $row["tensp"].'
	</h1>
	<div class="price-detail">
	<p class="price" style="color: red; font-size: 25px; font-weight: bold;">
	<span id="product-price-detail">';echo number_format($row["gia"]).' vnđ</span>
	</p>
	</div>';echo'
	<h4 class="size" style="text-decoration: underline;">
	Bảng size: 
	</h4>
	<form class="box-options" id="form-options">
	<div class="product-card-options">';
	while ($row1 = mysqli_fetch_array($result1)){
		echo '
		<label class="radio">';echo substr($row1["masize"], 0,2) .'
		<input type="radio"  name="size" value="'.substr($row1["masize"], 0,2) .'">
		<span class="checkround"></span>
		</label>
		';$i++;};
		echo'
		</div>
		</form>
		<hr>
		<tr class="quantity-title" style="overflow: hidden; height: auto;">
		<td class="pull-left">
		<p style="font-weight: bold;"> Số lượng: </p>
		</td>
		<td style="overflow: hidden;">
		<div class="addtocart_quantity" style="width: 8%">
		<input class="form-control text-center" id="sl" value="1" type="number"  min="1" max="5">
		</div>
		<div class="addtocart_button" style="margin-top: 20px; margin-bottom: 30px;">';
		echo '
		<button class="btn btn-warning" onclick="ktgh('. $row["masp"] .')">Thêm vào giỏ
		</button>';
		echo'
		</div>
		</td>
		</tr>
		</div>
		</div>
		</div>';$i++;}
		?>
		<style type="text/css">
			.card-img-top{
				max-width: 100%;

				-moz-transition: all 0.3s;
				-webkit-transition: all 0.3s;
				transition: all 0.3s;
			}
			.card-img-top:hover{
				-moz-transform: scale(1.1);
				-webkit-transform: scale(1.1);
				transform: scale(1.1);
			}
			.radio {
 
     display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 20px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

/* Hide the browser's default radio button */
.radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkround {

    position: absolute;
    top: 6px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff ;
    border-color:#f8204f;
    border-style:solid;
    border-width:2px;
     border-radius: 50%;
}


/* When the radio button is checked, add a blue background */
.radio input:checked ~ .checkround {
    background-color: #fff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkround:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio input:checked ~ .checkround:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radio .checkround:after {
     left: 2px;
    top: 2px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background:#f8204f;
    
 
}

/* The check */
.check {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 12px;
    padding-right: 15px;
    cursor: pointer;
    font-size: 18px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.check input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 3px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #fff ;
    border-color:#f8204f;
    border-style:solid;
    border-width:2px;
}



/* When the checkbox is checked, add a blue background */
.check input:checked ~ .checkmark {
    background-color: #fff  ;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.check input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.check .checkmark:after {
    left: 5px;
    top: 1px;
    width: 5px;
    height: 10px;
    border: solid ;
    border-color:#f8204f;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.cust-btn{
	margin-bottom: 10px;
	background-color: #f8204f;
	border-width: 2px;
	border-color: #f8204f;
	color: #fff;
}
.cust-btn:hover{
	
	border-color: #f8204f;
	background-color: #fff;
	color: #f8204f;
	border-radius: 20px;
	transform-style: 2s;

}
		</style>
