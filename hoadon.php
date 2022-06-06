<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
<div class="container">
	<div class="row">
		<div class="col-sm-3 bestsearch" style="height:550px"> <!---- BEST SEARCH ------->
			<br>
			<h5 style="font-weight:bold;">Size:</h5>
			<form  method="get" class="form" role="form"  >
				<select class="browser-default custom-select"  id="size" >
					<option value="0">----</option>
					<option value="38">38</option>
					<option value="39">39</option>
					<option value="40">40</option>
					<option value="41">41</option>
					<option value="42">42</option>
					<option value="43">43</option>
				</select>
				<br>
				<p>------------------------------------------------</p>
				<h5 style="font-weight:bold;">Giá: vnđ</h5>
				<p>	
					<input type="text" id="price" id="price" readonly size="25px;" style="color:red; font-weight:bold;" >
				</p>
				<div id="slider-3" ></div>
				<br>
				<p>------------------------------------------------</p>
				<h5 style="font-weight:bold;">Thương hiệu:</h5>
				<!-- Material checked -->
				
				<label class="radio">NIKE
					<input type="radio"  id="NIKE" name="loai" value="NIKE">
					<span class="checkround"></span>
				</label>
				<label class="radio">ADIDAS
					<input type="radio"  id="ADIDAS" name="loai" value="ADIDAS">
					<span class="checkround"></span>
				</label>
				<label class="radio">ASISC
					<input type="radio"  id="ASISC" name="loai" value="ASISC">
					<span class="checkround"></span>
				</label>
				<br>
				<input type="button" class="btn btn-success" style="justify-content: center;" value="Tìm kiếm nâng cao" onclick="showsreachnc()">
			</form>
		</div>
		
		<div class="col-sm-9" id="txtHint" >
			<!-- 	Hien thi thong tin hoa don -->
			<h2 style="text-align: center;">HÓA ĐƠN CỦA BẠN</h2>
			<?php
			$sql="SELECT h.tennd,h.ngay,h.tongtien,h.mahd,h.tongtien FROM hoadon as h , chitiethoadon as c WHERE h.tennd='".$_SESSION['username']."' and h.xuly=1 and h.tongtien>0 GROUP BY h.mahd  ORDER BY  h.ngay DESC LIMIT 3";
			//echo $sql;
			$result = DataToibangiay::executeQuery($sql);
			if(mysqli_num_rows($result) == 0)
			{
				echo "Chưa có hóa đơn nào cả";
			}
			else{
				echo'
				<table class="table table-hover" id="hoadon">
				<thead>
				<tr>
				<th>Mã HD</th>
				<th>Chi tiết hóa đơn</th>
				<th>Ngày thanh toán</th>
				<th>Tổng tiền</th>
				</tr>
				</thead >
				<div >';
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$format = "%H:%M:%S %d-%B-%Y";
				$i = 1;
				while ($row = mysqli_fetch_array($result))
				{
					$sql1="SELECT COUNT(*) as n FROM chitiethoadon WHERE mahd=".$row['mahd'];
					$result1 = DataToibangiay::executeQuery($sql1);
					$row1 = mysqli_fetch_array($result1);
					$sql2="SELECT * FROM chitiethoadon WHERE mahd=".$row['mahd'];
					$result2 = DataToibangiay::executeQuery($sql2);
					echo'<tbody >';
					echo'<tr>
					<th rowspan="'.$row1['n'].'">'.$i.'</th>
					<th>';
					while ($row2 = mysqli_fetch_array($result2)){ 
						echo'<label ><span>Tên sản phẩm : <span class="required"></span>'.$row2['tensp'].'</span></label><br>
						<label ><span>Size : <span class="required"></span>'.$row2['size'].'</span></label><br>
						<label ><span>Số lượng : <span class="required"></span>'.$row2['soluong'].'</span></label><br>
						<label ><span>Đơn giá: <span class="required"></span>'.number_format($row2['dongia']).' VNĐ</span></label><br><hr>';
						}';
					</th>';
					$strTime = strftime($format, $row["ngay"]);
					echo'
					<th rowspan="'.$row1['n'].'">'.$strTime.'</th>
					<th rowspan="'.$row1['n'].'">'.number_format($row["tongtien"]).' VNĐ</th>
					</tr>

					</tbody>';$i++;}}
					echo'
					</table>
					</div>
					</div>
					</div>
					</div>';?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	//gia nang cao
	$(document).ready(function(){
		$( "#slider-3" ).slider({
			range:true,
			min: 1000000,
			max:4000000,
			values: [ 0, 4000000],
			step:10000,
			slide: function( event, ui ) {
				$("#price").val(ui.values[0] +"-" + ui.values[1]);
			}
		});
		price_data = $("#price").val($("#slider-3").slider("values", 0) +
			"-" + $("#slider-3").slider("values", 1) ); 

	});
	
</script>
<style type="text/css">
	.size button{
		font-weight: bold;
		font-family: Open Sans;
		src:url("Open_Sans/OpenSans-Light.ttf");
	}
	button:active{
		background-color: red;
	}
	.page-link{
		color: red;
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

