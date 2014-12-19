@extends('home.template')

@section('title')
	<title>Liên hệ</title>
@stop

@section('main-content')
	
	<div id="lienhe">
			<h3>Liên hệ</h3>
			<h4>CÔNG TY ĐIỆN NƯỚC MINH LONG</h4>
			<span><sup><img src="{{asset('images/con_address.png')}}" atl="Dia chi"></sup>
				<i> Số 01 Hưng Đạo Vương .</i><br>
				<img src="{{asset('images/con_tel.png')}}"> 0945989323<br>
				<b>Gửi Email</b><br>
				
			</span>
	<div>
		<form action="#" method="POST" role="form" id="lienhe1">
			<legend><small>Gửi Email. Tất cả các thông tin được đánh dấu * là bắt buộc.</small></legend>
			<div class="form-group ">
				<label for="ten">Tên *</label>
				<input type="text" class="form-control" id="ten" name="ten" placeholder="Họ tên khách hàng">
			</div>
			<div class="form-group ">
				<label for="email">Email *</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Example@gmail.com">
			</div>
			<div class="form-group ">
				<label for="tieude">Tiêu đề *</label>
				<input type="text" class="form-control" id="tieude" name="tieude" placeholder="Tiêu đề">
			</div>
			<div class="form-group ">
				<label for="noidunglh">Nội dung *</label>

				<textarea type="textarea" class="form-control" id="noidunglh" name="noidunglh" placeholder="Nội dung" ></textarea>
			</div>
		
			<button type="submit" class="btn btn-info"><b>Gửi liên hệ</b></button>
		</form>
	</div>
	</div>
	<br>
	<script type="text/javascript">
			$("#lienhe1").validate({
				rules:{
					ten:{
						required:true,
						minlength:3,
						},
					email:{
						required:true,
						email:true,
						},
					tieude:{
						required:true,
					},
					noidunglh:{
						required:true,
					}
				},
				messages:{
					ten:{
						required:"Xin vui lòng nhập họ tên",
						minlength:"chiều dài họ tên phải dài hơn 3 ký tự",
						
					},
					
					email:{
						required:"Xin vui lòng nhập Email",
						email:"Không đúng định dạng Email"
					},
					tieude:{
						required:"Xin vui lòng nhập tiêu đề",
					},
					noidunglh:{
						required:"Xin vui lòng nhập nội dung",
					},
				}
			})
		</script>
@stop