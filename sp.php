<div class="container">
	<div class="row">
		<div class="col-sm-3 bestsearch"> <!---- BEST SEARCH ------->
			<h4>Size</h4>
			<div class="size">
				<button type="button" class="btn btn-outline-dark">36</button>
				<button type="button" class="btn btn-outline-dark">37</button>
				<button type="button" class="btn btn-outline-dark">38</button>
				<button type="button" class="btn btn-outline-dark">38</button>
				<button type="button" class="btn btn-outline-dark">39</button>
				<button type="button" class="btn btn-outline-dark">39</button>
				<button type="button" class="btn btn-outline-dark">40</button>
				<button type="button" class="btn btn-outline-dark">40</button>
				
			</div>

			<p>__________________________________</p>
			<h4>Giá</h4>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Từ 500k - 1 triệu</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Từ 1 triệu - 1,5 triệu</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Từ 1,5 triệu - 2 triệu</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Trên 2 triệu</label>
			</div>
			<p>__________________________________</p>
			<h4>Thương hiệu</h4>
			<div class="form-check">
				<?php echo loai(); ?>
			</div>
			
		</div>
		<!--------------------- END BEST SEARCH ---------------------->
		<!--------------------- PRODUCT ----------------------->
		<div class="col-md-3 col-sm-6 col-12 mb-3">
			<div class="card card-product">
				<img src="Images/ni1.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title product-title">Product</h5>
					<div class="card-text product-price">
						<span class="del-price">1.500.000 VNĐ</span>
						<span class="new-price">1.360.000 VNĐ</span>

					</div>
					<a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
					<a class="btn btn-outline-info btn-detail" href="index.php?id=ctsp#1">Xem chi tiết</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12 ">
			<div class="card card-product">
				<img src="Images/ni2.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title product-title">Product</h5>
					<div class="card-text product-price">
						<span class="price">1.300.000 VNĐ</span>


					</div>
					<a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
					<a class="btn btn-outline-info btn-detail" href="index.php?id=ctsp#1">Xem chi tiết</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12 mb-3">
			<div class="card card-product">
				<img src="Images/das2.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title product-title">Product</h5>
					<div class="card-text product-price">
						<span class="del-price">1.220.000 VNĐ</span>
						<span class="new-price">1.100.000 VNĐ</span>

					</div>
					<a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
					<a class="btn btn-outline-info btn-detail" href="index.php?id=ctsp#1">Xem chi tiết</a>
				</div>
			</div>
		</div>			
	</div>
</div>
<div class="container">
	<div class="row" >
		<div class="col-sm-3" ></div>
		<div class="col-sm-9" >
			<nav aria-label="Page navigation example">
				<ul class="pagination  justify-content-center" >
					<li class="page-item">
						<a class="page-link" href="#">Lùi</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Tiến</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
</div>
<style type="text/css">
	.page-link{
		color: red;
	}
</style>