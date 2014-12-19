@extends('home.template')

@section('title')
	<title>Đăng ký mua điện</title>
	
@stop

@section('main-content')
	<div> 
		<div id="thongbao" class="alert-success">ĐĂNG KÝ THÔNG TIN MUA ĐIỆN NƯỚC</div>
		<br>
		<div id="hopdong1">
			@if (Session::has('global'))
				<p>{{ Session::get('global') }}</p>
			@endif
		</div>
		
		<form action="" method ="POST" class="form-horizontal" role="form" id="dangky">
		  <div class="form-group">
		    <label for="tenloai" class="col-sm-3 control-label">Loại đăng ký </label>
		    <div class="col-sm-2">
		    	<select class="form-control" id="tenloai" name="tenloai">
		    		
		    		<option value="điện">Điện</option>
		    		<option value="nước">Nước</option>
		    	</select>
		    	@if ($errors->has('tenloai'))
           		 	{{ $errors->first('tenloai') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="tenkh" class="col-sm-3 control-label">Họ tên khách hàng</label>
		    <div class="col-sm-7">
		      	<input type="text" class="form-control" id="tenkh" name="tenkh" placeholder="Vui lòng nhập vào họ tên">
		      	@if ($errors->has('tenkh'))
           		 	{{ $errors->first('tenkh') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="ngaysinh" class="col-sm-3 control-label">Ngày sinh</label>
		    <div class="col-sm-4">
		    	<input type="date" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="Vui lòng nhập vào ngày sinh">
		    	@if ($errors->has('ngaysinh'))
           		 	{{ $errors->first('ngaysinh') }}
            	@endif
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="trinhdo" class="col-sm-3 control-label">Trình độ</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" id="trinhdo" name="trinhdo" placeholder="Trình độ">
		    </div>
		  </div>
		 
		  <div class="form-group">
		    <label for="chucvu" class="col-sm-3 control-label">Chức vụ</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" id="chucvu" name="chucvu" placeholder="Chức vụ">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="cmt" class="col-sm-3 control-label">CMND</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" id="cmt" name="cmt" placeholder="Chứng minh nhân dân">
		      	@if ($errors->has('cmt'))
           		 	{{ $errors->first('cmt') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="ngaycap" class="col-sm-3 control-label">Ngày cấp</label>
		    <div class="col-sm-4">
		     	<input type="date" class="form-control" id="ngaycap" name="ngaycap" placeholder="Vui lòng nhập vào ngày cấp" onblur="sosanh();">
		      	@if ($errors->has('ngaycap'))
           		 	{{ $errors->first('ngaycap') }}
            	@endif
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="noicap" class="col-sm-3 control-label">Nơi cấp</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" id="noicap" name="noicap" placeholder="Nơi cấp">
		      	@if ($errors->has('noicap'))
           		 	{{ $errors->first('noicap') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="email" class="col-sm-3 control-label">Email</label>
		    <div class="col-sm-7">
		      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
		      	@if ($errors->has('email'))
           		 	{{ $errors->first('email') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="sdt" class="col-sm-3 control-label">Số điện thoại</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Số điện thoại">
		      	@if ($errors->has('sdt'))
           		 	{{ $errors->first('sdt') }}
            	@endif
		    </div>
		  </div>
		   <div class="form-group">
		    <label for="diachi" class="col-sm-3 control-label">Địa chỉ liên hệ</label>
		    <div class="col-sm-7">
		    	<textarea class="form-control" rows="3" id="diachi" name="diachi" placeholder="Địa chỉ liên hệ"></textarea>
		      
		      	@if ($errors->has('diachi'))
           		 	{{ $errors->first('diachi') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="tenht" class="col-sm-3 control-label">Mục đích sử dụng</label>
		    <div class="col-sm-3">
		    	<select class="form-control" id="tenht" name="tenht">
		    		
		    		<option value="Sinh hoạt">Sinh hoạt</option>
		    		<option value="Sản xuất">Sản xuất</option>
		    		<option value="Kinh doanh">Kinh doanh</option>
		    		
		    	</select>
		    	@if ($errors->has('tenht'))
           		 	{{ $errors->first('tenht') }}
            	@endif
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-10">
		      <span name ="txtCaptchaDiv" id="txtCaptchaDiv" class="txtCaptchaDiv" style="color:#F00"></span> 

		    </div>
		  </div>
		  <div class="form-group">
		    <label for="code" class="col-sm-3 control-label">Vui lòng nhập mã code</label>
		    <div class="col-sm-7">
		     	<input type="hidden" id="txtCaptcha" class="txtCaptcha">
      			<input type="text" name="txtInput" id="txtInput" class="txtInput" size="30" onkeyup="ValidCaptcha();"><br>
      			<span name ="txt" id="txt" class="txt" style="color:#F00"></span> 
		    </div>
		  </div>
		  <div class="form-group" id="dk1">
		    <div class="col-sm-offset-3 col-sm-10">
		      <button type="submit" class="btn btn-info">Đăng ký</button>
		      <button type="reset" class="btn btn-info">Nhập lại</button>
		    </div>
		  </div>
		</form>
		<a href="{{URL::to('uploads/thutuc.doc')}}">Thủ tục hồ sơ đăng ký mua điện nước</a><br>
		<a href="{{Asset('home/tracuudangky')}}">Tra cứu thông tin phản hồi</a>
	</div>
	<br>
<script>
		$(function() {
			
			$( "#ngaysinh" ).datepicker();
			$( "#ngaycap" ).datepicker();
			$("#dangky").validate({
				rules:{
					tenloai:{
						required:true,
					},
					tenkh:{
						required:true,
					},
					ngaysinh:{
						required:true,
					},
					cmt:{
						required:true,
						remote:{
							url:"{{Asset('home/checkcmt')}}",
							type:"post"
						}
					},
					noicap:{
						required:true,
					},
					ngaycap:{
						required:true,
					},

					email:{
						required:true,
						email:true,
						},
					sdt:{
						required:true,
					},
					diachi:{
						required:true,
					},
					tenht:{
						required:true,
					},
				},
				messages:{
					tenloai:{
						required:"Xin vui lòng chọn loại đăng ký",
						
					},
					tenkh:{
						required:"Xin vui lòng nhập họ tên",
					},
					ngaysinh:{
						required:"Vui lòng nhập vào ngày sinh",
					},
					cmt:{
						required:"Xin vui lòng nhập chứng minh nhân dân",
						remote :"CMND đã tồn tại",
					},
					noicap:{
						required:"Xin vui lòng nhập nơi cấp",
					},
					ngaycap:{
						required:"Xin vui lòng nhập ngày cấp",
					},
					email:{
						required:"Xin vui lòng nhập Email",
						email:"Không đúng định dạng Email"
					},
					sdt:{
						required:"Xin vui lòng nhập số điện thoại",
					},
					diachi:{
						required:"Xin vui lòng nhập địa chỉ liên hệ",
					},
					tenht:{
						required:"Xin vui lòng chọn hình thức sử dụng",
					},
				}
			})

		});
</script>

<script type="text/javascript">
	
//Generates the captcha function    
	var a = Math.ceil(Math.random() * 9)+ '';
	var b = Math.ceil(Math.random() * 9)+ '';       
	var c = Math.ceil(Math.random() * 9)+ '';  
	var d = Math.ceil(Math.random() * 9)+ '';  
	var e = Math.ceil(Math.random() * 9)+ '';  
	  
	var code = a + b + c + d + e;
	document.getElementById("txtCaptcha").value = code;
	document.getElementById("txtCaptchaDiv").innerHTML = code;	
	var ns = document.getElementById("ngaysinh").value ;
	var nc = document.getElementById("ngaycap").value ;
// Validate the Entered input aganist the generated security code function   
function ValidCaptcha(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
	var str2 = removeSpaces(document.getElementById('txtInput').value);
	if (str1 == str2){
		 document.getElementById("txt").innerHTML = "";	
	} else {
		 document.getElementById("txt").innerHTML = "Mã captcha không chính xác";
	}
}

function sosanh(){
	var ns = document.getElementById("ngaysinh").value ;
	var nc = document.getElementById("ngaycap").value ;
	if (nc > ns){
		 	
	} else {
		document.getElementById("ngaycap").value = "";
		 alert('Ngày cấp phải lớn hơn ngày sinh');
		
	}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
	return string.split(' ').join('');
}
</script>

@stop