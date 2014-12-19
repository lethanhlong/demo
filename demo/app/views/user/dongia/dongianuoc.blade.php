@extends('user.template_user')

@section('title')
	<title>Cập nhật đơn giá nước</title>
@stop

@section('main-content')
	<div id="tintuc">
		<h3 class="tt1"><b>BẢNG GIÁ NƯỚC SỬ DỤNG</b></h3>
		
		<form action="" method="POST" class="form-inline" role="form" width="80%">	
		<table class="table table-hover tt2" id="lichcup1" >
				<thead>
					<tr id="gianuoc1">
						<th width="70%">Đối tượng áp dụng</th>
						<th width="30%">Giá</th>
						
					</tr>
				</thead>
				<tbody class ="text-center">
					<tr>
						<th>Sinh hoạt</th>
						<td><input type="text" class="form-control" name="nsh" id="nsh"></td>
					</tr>
					
					<tr>
						<th>Sản xuất</th>
						
						<td><input type="text" class="form-control" name="nsx" id="nsx"></td>
					</tr>
					<tr>
						<th>Kinh doanh</th>
						
						<td><input type="text" class="form-control" name="nkd" id="nkd"></td>
					</tr>
				</tbody>
			</table>	
			<button type="submit" class="btn btn-info">Lưu lại</button>
			<button type="reset" class="btn btn-info">Nhập lại</button>
		</form>
			
	</div>
	<br>	
@stop