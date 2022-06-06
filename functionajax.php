
<?php 
if(isset($_GET["id"]))
	$id=$_GET["id"];
?>
<script>
	//tim kiem nang cao
	function showsreachnc() {
		document.getElementById("idsp").value="";
		if ($("#kq1").length){
			document.getElementById("kq1").style.display='none';
		}
		var size=document.getElementById("size").value;
		var price=document.getElementById("price").value;
		var loainike=document.getElementById("NIKE").checked;
		var loaiad=document.getElementById("ADIDAS").checked;
		var loaisi=document.getElementById("ASISC").checked;
		var loai="";
		if(loainike==true) loai="NIKE";
		if(loaiad==true) loai="ADIDAS";
		if(loaisi==true) loai="ASISC";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			(this.readyState == 4 && this.status == 200) 
			document.getElementById("txtHint").innerHTML = this.responseText;	
		};
		if(loai!="")
		{
			xmlhttp.open("GET", "xuly.php?size="+size+"&price="+price+"&loai="+loai, true);
			xmlhttp.send();
		}
		else {
			xmlhttp.open("GET", "xuly.php?size="+size+"&price="+price, true);
			xmlhttp.send();
		}
	}
	//phan trang search nang cao
	function phantrangsearchnc(page) {
		var size=document.getElementById("size").value;
		var price=document.getElementById("price").value;
		var loainike=document.getElementById("NIKE").checked;
		var loaiad=document.getElementById("ADIDAS").checked;
		var loaisi=document.getElementById("ASISC").checked;
		var loai="";
		if(loainike==true) loai="NIKE";
		if(loaiad==true) loai="ADIDAS";
		if(loaisi==true) loai="ASISC";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			(this.readyState == 4 && this.status == 200) 
			document.getElementById("txtHint").innerHTML = this.responseText;}
			if(loai!="")
			{
				xmlhttp.open("GET", "xuly.php?size="+size+"&price="+price+"&loai="+loai+"&page=" +page+"#1", true);
				xmlhttp.send();
			}
			else {
				xmlhttp.open("GET", "xuly.php?size="+size+"&price="+price+"&page=" +page+"#1", true);
				xmlhttp.send();
			}
		}
		//phan trang loai san pham
		function phantrangloaisp(page) {
			var x = document.URL;
			var id=x.slice(35);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				(this.readyState == 4 && this.status == 200) 
				document.getElementById("txtHint").innerHTML = this.responseText;}
				xmlhttp.open("GET", "xuly.php?page=" +page+"&id="+id, true);
				xmlhttp.send();
			}
		//phan trang search thuong
		function phantrangsearch(page,idsp) {
			var x = document.URL;
			var id=x.slice(37);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				(this.readyState == 4 && this.status == 200) 
				document.getElementById("txtHint").innerHTML = this.responseText;}
				xmlhttp.open("GET", "xuly.php?page="+page+"&idsp=" +id+"#1", true);
				xmlhttp.send();
			}
			
				//phan trang index
				function phantrangindex(page) {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						(this.readyState == 4 && this.status == 200) 
						document.getElementById("txtHint").innerHTML = this.responseText;}
						xmlhttp.open("GET", "xuly.php?index=0&page=" +page+"#1", true);
						xmlhttp.send();
					}
				//hien thi tim kiem thuong
				function showsreach() {
					var str=document.getElementById("idsp").value;
					
					{
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("txtHint").innerHTML = this.responseText;
								document.getElementById("size").value=0 ;
								document.getElementById("price").value=1000000+"-"+4000000;
							}
						};
						xmlhttp.open("GET", "xuly.php?idsp=" + str, true);
						xmlhttp.send();
					}
				}
				//kiểm tra đăng nhập trước khi mua hàng và gửi thông tin vào giỏ hang nếu đúng
				function ktgh(idsp){
					
					var kt= <?php echo isset($_GET['idsp']) ? '1' : '0'; ?>;
					if(kt==1) 
					{ 
						var sl=document.getElementById("sl").value ;
					}
					else  
					{
						sl=1;
					}
					var size = document.getElementsByName("size");
					for (var i = 0; i < size.length; i++){
						if (size[i].checked === true){
							var s=size[i].value;
						}
					}
					var is_logged = <?php echo isset($_SESSION['username']) ? '1' : '0'; ?>;
					if(is_logged==0)
					{
						alert("Cần đăng nhập trước khi mua sản phẩm !");
						window.location = 'index.php?id=dn#1';
					}
					else 
					{
						var xmlhttp = new XMLHttpRequest();
						if(s!=null)
						{
							xmlhttp.open("GET", "xulygiohang.php?idsp="+idsp+"&sl="+sl+"&size="+s, true);
							xmlhttp.send();
							alert("Thêm vào giỏ hàng thành công");
						}
						else {
							
							
							alert("Vui lòng chọn size !");
							
						}

					}
				}
				//cập nhật lại thành tiền nếu ng dùng thay đổi sô lượng trong giỏ hàng
				function updatesl(masp,slm){
					var xmlhttp = new XMLHttpRequest();
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("thanhtien").innerHTML = this.responseText;
					}
					xmlhttp.open("GET", "xulygiohang.php?idsp="+masp+"&slm"+slm, true);
					xmlhttp.send();
				}
				//xóa 1 sản phẩm trong giỏ hàng
				function xoasp(str){
					var xmlhttp = new XMLHttpRequest();
					if (this.readyState == 4 && this.status == 200) 
					{
						header("index.php");
					}
					xmlhttp.open("GET", "xulygiohang.php?idspx="+str, true);
					xmlhttp.send();
				}
				//lọc thông tin tìm kiếm theo ngày trong quản lý hóa đơn
				function qlhd(){
					var xmlhttp = new XMLHttpRequest();
					var tu=document.getElementById("tu").value;
					var den=document.getElementById("den").value;
					xmlhttp.onreadystatechange = function() {
						(this.readyState == 4 && this.status == 200) 
						document.getElementById("hoadon").innerHTML = this.responseText;}
						xmlhttp.open("GET", "xulyqlhd.php?tu="+tu+"&den="+den, true);
						xmlhttp.send();
					}
					//lọc thông tin tìm kiếm theo ngày trong thống kê
					function qlthongke(){
						var xmlhttp = new XMLHttpRequest();
						var tu=document.getElementById("bd").value;
						var den=document.getElementById("kt").value;
						xmlhttp.onreadystatechange = function() {
							(this.readyState == 4 && this.status == 200) 
							document.getElementById("thongke").innerHTML = this.responseText;}
							xmlhttp.open("GET", "xulythongke.php?bd="+tu+"&kt="+den, true);
							xmlhttp.send();
						}
						//xóa sản phẩm của trang admin
						function xoasp(idsp)
						{
							var xmlhttp = new XMLHttpRequest();
							var xoa=confirm("Bạn thực sự muốn xóa sản phẩm này !!!");
							if(xoa==true){
								// xmlhttp.open("GET", "xulyxoasp.php?idsp="+idsp, true);
								// xmlhttp.send();
								window.location="xulyxoasp.php?idsp="+idsp;
							}
						}
						//tìm kiếm sản phẩm trang admin
						function showsreachadmin(str) {

							{
								var xmlhttp = new XMLHttpRequest();
								xmlhttp.onreadystatechange = function() {
									if (this.readyState == 4 && this.status == 200) {
										document.getElementById("qlsp").innerHTML = this.responseText;
									}
								};
								xmlhttp.open("GET", "xulyqlsp.php?idsp=" + str, true);
								xmlhttp.send();
							}
						}
						//kiểm tra tên đăng nhập có hợp lệ ko
						function ktdk(str) {
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() {
								(this.readyState == 4 && this.status == 200) 
								document.getElementById("kqkt").innerHTML = this.responseText;}
								xmlhttp.open("GET", "xulydangky.php?tendk="+str, true);
								xmlhttp.send();
							}
							//thanh toán giở hàng
							function thanhtoan(str) {

								
								alert("Cảm ơn bạn đã mua hàng ! Chúng tôi sẽ liên lạc với bạn qua SĐT và Email")
								window.location="xulygiohang.php?thanhtoan=1&tongtien=" + str;

							}
								//kiểm tra file hình load có trùng trong CSDL không 
								function ktfile1(str) {
									var xmlhttp = new XMLHttpRequest();
									xmlhttp.onreadystatechange = function() {
										(this.readyState == 4 && this.status == 200) 
										document.getElementById("fileloi").innerHTML = this.responseText;}
										xmlhttp.open("GET", "xulyfile.php?hinh="+str, true);
										xmlhttp.send();
									}
								</script>