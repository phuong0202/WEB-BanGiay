<button class="btn btn-info" onclick="suasph()" >Sửa</button>
<div id="suasph" class="overlay1">
	<a href="javascript:void(0)" class="closebtn" onclick="closeCTSP()">&times;</a>
	<div class="overla1-content">
		<div class="suasp" id="suasp">
			<form class="form-style-71" id="f77" style="display: none;">
				<ul>
					<li>
						<label for="name" id="ten" >Tên sản phẩm</label>
						<input type="text"  maxlength="100" >
						<span>Nhập tên cần sửa</span>
					</li>
					<li>
						<label for="email" id="gia">Giá</label>
						<input type="text" name="gia" maxlength="100" >
						<span>Nhập giá mới</span>
					</li>
					<li>
						<label for="url" id="hinh"> Hình ảnh</label>
						<span>Hình hiện tại</span>
					</li>
					<li>
						<label for="url" > Hình ảnh</label>
						<input type="file" name="myFile" >
						<span>Chọn hình ảnh thay thế</span>
					</li>
					<li>
						<label for="bio">Mô tả</label>
						<textarea name="bio" onkeyup="adjust_textarea(this)"></textarea>
						<span>Mô tả sản phẩm thay thế</span>
					</li>
					<li>
						<input type="submit" value="Cập nhật">
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>