@extends('user.template_user')

@section('title')
	<title>Cập nhật hợp đồng</title>
@stop
@section('main-content')
	
	<div> 
		<div id="thongbao" class="alert-success">Danh sách khách hàng đăng ký</div>
		<br>
		<div id="cnhopdong">
			@if (Session::has('global'))
				<p>{{ Session::get('global') }}</p>
			@endif
		</div>
		<div id="cnhopdong1">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tên khách hàng</th>
						<th>CMND</th>
						<th>Tên loại</th>
						<th>Hình thức thức sử dụng</th>
						<th>Ngày ký hợp đồng</th>
						<th>&nbsp</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach ($hopdong as $h)
						@if ($h->tinhtrang == 'Đang xử lý') 
					<tr>
						<td><a href="#">{{$h->tenkh}}</a></td>
						<td>{{$h->cmt}}</td>
						<td>{{$h->tenloai}}</td>
						<td>{{$h->tenht}}</td>
						<td>{{$h->ngayky}}</td>
						<td><button type="button" class="btn btn-info" onclick="cnhopdong('{{$h->id}}')">Cập nhật</button></td>

					</tr>
						@endif
					@endforeach
				</tbody>
			</table>

			{{$hopdong->links();}}
		</div>
		<script>
	$( ".pagination ul" ).addClass( "pagination text-center" );
	function cnhopdong(id) {
			if (confirm("Bạn có muốn cập nhật hợp đồng không ?")) {
				var attrib = document.createElement("input");
				attrib.setAttribute("name", "attrib");
				attrib.setAttribute("value", id);

				var form = document.createElement('form');
			    form.setAttribute('method', 'post');
			    form.setAttribute('action', '{{Request::url()}}');
			    form.style.display = 'hidden';

			    form.appendChild(attrib);
			    form.submit();
			}
		}
	</script>
@stop