@extends('user.template_user')

@section('title')
	<title>Ghi chỉ số</title>

@stop
@section('main-content')
	
	<div> 
		<div id="thongbao" class="alert-success">Thông tin chi tiết khách hàng ký hợp đồng</div>
		<br>
		<div id="cnhopdong">
			@if (Session::has('global'))
				<p>{{ Session::get('global') }}</p>
			@endif
		</div>
		<div id="cnhopdong1">
			@foreach ($hopdong  as $k)
				<form action="" method="POST" class="form-horizontal disabled" role="form">
						
						<div class="form-group ">
						    <label for="tenkh" class="col-sm-3 control-label">Họ tên khách hàng</label>
						    <div class="col-sm-4 ">
						      	<input type="text" class="form-control disabled" id="tenkh" name="tenkh" value="{{$k->tenkh}}">
						      	@if ($errors->has('tenkh'))
				           		 	{{ $errors->first('tenkh') }}
				            	@endif
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="cmt" class="col-sm-3 control-label">CMND</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control " id="cmt" name="cmt" value="{{$k->cmt}}">
						      	@if ($errors->has('tenkh'))
				           		 	{{ $errors->first('tenkh') }}
				            	@endif
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="email" class="col-sm-3 control-label">Email</label>
						    <div class="col-sm-4">
						      <input type="email" class="form-control" id="email" name="email" value="{{$k->email}}">
						      	@if ($errors->has('email'))
				           		 	{{ $errors->first('email') }}
				            	@endif
						    </div>
						  </div>
						
				
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-3">
								<button type="submit" class="btn btn-primary ">Cập nhật</button>
							</div>
						</div>
				</form>
			@endforeach
	</div>
		
@stop