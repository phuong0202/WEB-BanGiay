
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
				//ki???m tra ????ng nh???p tr?????c khi mua h??ng v?? g???i th??ng tin v??o gi??? hang n???u ????ng
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
						alert("C???n ????ng nh???p tr?????c khi mua s???n ph???m !");
						window.location = 'index.php?id=dn#1';
					}
					else 
					{
						var xmlhttp = new XMLHttpRequest();
						if(s!=null)
						{
							xmlhttp.open("GET", "xulygiohang.php?idsp="+idsp+"&sl="+sl+"&size="+s, true);
							xmlhttp.send();
							alert("Th??m v??o gi??? h??ng th??nh c??ng");
						}
						else {
							
							
							alert("Vui l??ng ch???n size !");
							
						}

					}
				}
				//c???p nh???t l???i th??nh ti???n n???u ng d??ng thay ?????i s?? l?????ng trong gi??? h??ng
				function updatesl(masp,slm){
					var xmlhttp = new XMLHttpRequest();
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("thanhtien").innerHTML = this.responseText;
					}
					xmlhttp.open("GET", "xulygiohang.php?idsp="+masp+"&slm"+slm, true);
					xmlhttp.send();
				}
				//x??a 1 s???n ph???m trong gi??? h??ng
				function xoasp(str){
					var xmlhttp = new XMLHttpRequest();
					if (this.readyState == 4 && this.status == 200) 
					{
						header("index.php");
					}
					xmlhttp.open("GET", "xulygiohang.php?idspx="+str, true);
					xmlhttp.send();
				}
				//l???c th??ng tin t??m ki???m theo ng??y trong qu???n l?? h??a ????n
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
					//l???c th??ng tin t??m ki???m theo ng??y trong th???ng k??
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
						//x??a s???n ph???m c???a trang admin
						function xoasp(idsp)
						{
							var xmlhttp = new XMLHttpRequest();
							var xoa=confirm("B???n th???c s??? mu???n x??a s???n ph???m n??y !!!");
							if(xoa==true){
								// xmlhttp.open("GET", "xulyxoasp.php?idsp="+idsp, true);
								// xmlhttp.send();
								window.location="xulyxoasp.php?idsp="+idsp;
							}
						}
						//t??m ki???m s???n ph???m trang admin
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
						//ki???m tra t??n ????ng nh???p c?? h???p l??? ko
						function ktdk(str) {
							var xmlhttp = new XMLHttpRequest();
							xmlhttp.onreadystatechange = function() {
								(this.readyState == 4 && this.status == 200) 
								document.getElementById("kqkt").innerHTML = this.responseText;}
								xmlhttp.open("GET", "xulydangky.php?tendk="+str, true);
								xmlhttp.send();
							}
							//thanh to??n gi??? h??ng
							function thanhtoan(str) {

								
								alert("C???m ??n b???n ???? mua h??ng ! Ch??ng t??i s??? li??n l???c v???i b???n qua S??T v?? Email")
								window.location="xulygiohang.php?thanhtoan=1&tongtien=" + str;

							}
								//ki???m tra file h??nh load c?? tr??ng trong CSDL kh??ng 
								function ktfile1(str) {
									var xmlhttp = new XMLHttpRequest();
									xmlhttp.onreadystatechange = function() {
										(this.readyState == 4 && this.status == 200) 
										document.getElementById("fileloi").innerHTML = this.responseText;}
										xmlhttp.open("GET", "xulyfile.php?hinh="+str, true);
										xmlhttp.send();
									}
								</script>