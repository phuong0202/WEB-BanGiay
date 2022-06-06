<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <style type="text/css">
   body{
    background-image: url("Images/suasp.jpg");
 }
</style>
<?php
session_start();
require 'functionajax.php';
echo '
<div class="form-style-2">
<div class="form-style-2-heading" >Thông tin sản phẩm cần thêm</div>
<form action="xulythemsp.php" method="POST" style="text-align: left; margin-left: 550px; width: 400px;color: red;" enctype="multipart/form-data" onsubmit="return(ktfile())">
<label for="field1"><span>Tên sản phẩm :<span class="required"></span></span>
<input type="text" class="input-field" name="ten"  size="100px" maxlength="30" required=""  pattern="[a-zA-Z0-9 ]{7,50}" title="Tên sản phẩm không phù hợp" />
</label>
<label for="field2"><span>Giá : VNĐ<span class="required"></span></span>
<input type="number" class="input-field"  name="gia"   maxlength="10" required="" max="10000000"/>
</label>
<label for="field2"><span>Hình mới:<span class="required"></span>Tối đa 10 ký tự và nhỏ hơn 400KB</span>
<input type="file" class="input-field"  name="hinh" id="file"  required="" onchange="ktfile1(this.files[0].name)"/>
</label>
<div id="fileloi"></div>';
if (isset($_REQUEST['loifile']))
{
  echo'<div class="alert alert-danger alert-dismissible fade show" id="danger" style="text-align: center;">
  <strong>File tải lên khích thước quá lớn !</strong>
  </div>';
}

echo'
<label for="field"><span>Bảng Size :</span></label>
<table>
<tr>
<th>Size</th>
<th>Số lượng</th>
</tr>
<tr>
<th><input type="radio"   value="38" checked>38<br></th>
<th><input type="number" class="input-field"  name="soluong38"   required="" value="1" /></th>
</tr>
<tr>
<th><input type="radio"   value="39">39<br></th>
<th><input type="number" class="input-field"  name="soluong39"   required="" value="0"/></th>
</tr>
<tr>
<th><input type="radio"   value="40">40<br></th>
<th><input type="number" class="input-field"  name="soluong40"   required="" value="0"/></th>
</tr>
<tr>
<th><input type="radio"   value="41">41<br></th>
<th><input type="number" class="input-field"  name="soluong41"   required="" value="0"/></th>
</tr>
<tr>
<th><input type="radio"   value="42">42<br></th>
<th><input type="number" class="input-field"  name="soluong42"   required="" value="0"/></th>
</tr>
</table>
<br>
<label for="field4"><span>Loại sản phẩm :</span><select name="loai" class="select-field" required=""  >
<option  value="ni">Nike</option>
<option  value="ad">Adidas</option>
<option  value="as">Asics</option>
</select></label>
<label><span> </span><button type="submit"  name="them" value="ok" class="btn btn-md btn-danger pull-right" >Thêm sản phẩm</button></label>
<label><span> </span><input type="reset" value="Đặt lại" /></label>
</form>
</div>
';


?>
</body>
</html>

<script type="text/javascript">
 function ktfile() {
   var tk = <?php echo isset($_SESSION['usernameadmin']) ? '1' : '0'; ?>;
   var hinh=document.getElementById("hinh").value;
   //alert(hinh);
   var co1=0;
   var co2=0;
   if(tk==0)
   {
       alert("Bạn chưa đăng nhập !!");
   }
        // lay dung luong va kieu file tu the input file
        var fsize = $('#file')[0].files[0].size;
        if(fsize>400000) //thuc hien dieu gi do neu dung luong file vuot qua 1MB
        {
          alert("File hình có khích thước quá lớn !");
          co1=0;
       }
       else co1=1;
      // lay dung luong va kieu file tu the input file
      var fsize = $('#file')[0].files[0].size;
      var ftype = $('#file')[0].files[0].type;
      var fname = $('#file')[0].files[0].name;
      switch(ftype)
      {
         case 'image/png':
         case 'image/gif':
         case 'image/jpeg':
         case 'image/pjpeg':
         co2=1;
         break;
         default:
         alert('Kiểu File tải lên không chấp nhận !');
         co2=0;
      }

      if(co1==1 && co2==1 && tk==1 && hinh==1) return true;
      else return false;
   }
</script>
<style type="text/css">
   .form-style-2{
      max-width: 500px;
      padding: 20px 12px 10px 20px;
      font: 13px Arial, Helvetica, sans-serif;
   }
   .form-style-2-heading{
      font-weight: bold;
      font-style: italic;
      border-bottom: 2px solid #ddd;
      margin-bottom: 20px;
      font-size: 15px;
      padding-bottom: 3px;
      text-align: center;
      border-color: red;

   }
   .form-style-2 label{
      display: block;
      margin: 0px 0px 15px 0px;
   }
   .form-style-2 label > span{
      width: 150px;
      font-weight: bold;
      float: left;
      padding-top: 8px;
      padding-right: 5px;
   }
   .form-style-2 span.required{
      color:red;
   }
   .form-style-2 .tel-number-field{
      width: 40px;
      text-align: center;
   }
   .form-style-2 input.input-field, .form-style-2 .select-field{
      width: 60%; 
   }
   .form-style-2 input.input-field, 
   .form-style-2 .tel-number-field, 
   .form-style-2 .textarea-field, 
   .form-style-2 .select-field{
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      border: 1px solid #C2C2C2;
      box-shadow: 1px 1px 4px #EBEBEB;
      -moz-box-shadow: 1px 1px 4px #EBEBEB;
      -webkit-box-shadow: 1px 1px 4px #EBEBEB;
      border-radius: 3px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      padding: 7px;
      outline: none;
   }
   .form-style-2 .input-field:focus, 
   .form-style-2 .tel-number-field:focus, 
   .form-style-2 .textarea-field:focus,  
   .form-style-2 .select-field:focus{
      border: 1px solid #0C0;
   }
   .form-style-2 .textarea-field{
      height:100px;
      width: 55%;
   }
   .form-style-2 input[type=submit],
   .form-style-2 input[type=button],
   .form-style-2 input[type=reset]{
      border: none;
      padding: 8px 15px 8px 15px;
      background: #FF8500;
      color: #fff;
      box-shadow: 1px 1px 4px #DADADA;
      -moz-box-shadow: 1px 1px 4px #DADADA;
      -webkit-box-shadow: 1px 1px 4px #DADADA;
      border-radius: 3px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
   }
   .form-style-2 input[type=submit]:hover,
   .form-style-2 input[type=button]:hover{
      background: #EA7B00;
      color: #fff;
   }
</style>