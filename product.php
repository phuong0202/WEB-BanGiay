<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
<?php require 'load.php' ?>
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
				
				<label class="radio">Nike
					<input type="radio"  id="NIKE" name="loai" value="NIKE">
					<span class="checkround"></span>
				</label>
				<label class="radio">Adidas
					<input type="radio"  id="ADIDAS" name="loai" value="ADIDAS">
					<span class="checkround"></span>
				</label>
				<label class="radio">Asics
					<input type="radio"  id="ASISC" name="loai" value="ASISC">
					<span class="checkround"></span>
				</label>
				<br>
				<input type="button" class="btn btn-success" style="justify-content: center;" value="Tìm kiếm nâng cao" onclick="showsreachnc()">
			</form>
		</div>
		<div class="col-sm-9" id="txtHint" >
			<!-- 	Hien thi san pham -->
			<div class="row" >
				<!--------------------- END BEST SEARCH ---------------------->
				<!--------------------- PRODUCT ----------------------->
				<?php 
				$i=1;
				while ($row = mysqli_fetch_array($result)){
					echo '
					<div class="col-md-4 col-sm-6 col-12 mb-3">
					<div class="card card-product">

					<img src="Images/'.$row["hinh"].'" class="card-img-top" alt="...">
					<div class="card-body">
					<h5 class="card-title product-title" style="font-weight: bold;" id='. $row["masp"] .'>'. $row["tensp"] .'</h5>
					<div class="card-text product-price">
					<span class="price" style="color: red; font-weight: bold;">'.number_format($row["gia"]).' VNĐ</span>
					<br>
					</div>
					
					<a class="btn btn-outline-info btn-detail" href="index.php?id=ctsp&idsp='.$row["masp"].'#1">Xem chi tiết</a>
					</div>
					</div>
					</div>';$i++;
				}?> 
			</div>
			<div class="row" >
				<div class="col-sm-11" >
					<nav aria-label="Page navigation example">
						<ul class="pagination  justify-content-center" >
							<?php 
							echo $first.$prev.$nav.$next.$last; ?> 
						</ul>
					</nav>
				</div>
				<div class="col-sm-1" >
					
				</div>
			</div>
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
	.card-img-top:hover{
		width: 250px;
		height: 250px;
	}
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

