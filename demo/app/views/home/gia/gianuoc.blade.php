@extends('home.template')

@section('title')
	<title>Trang chủ</title>
@stop

@section('main-content')
	<div id="tintuc">
		<h3 class="tt1"><b>BẢNG GIÁ NƯỚC SỬ DỤNG</b></h3>
		<div>
			
	</div>
			<table class="table table-hover tt2" width="100%">
				<thead>
					<tr id="gianuoc1">
						<th>Đối tượng áp dụng</th>
						<th>Giá</th>
					</tr>
				</thead>
				<tbody>
				@foreach($cogias as $y)
					@if($y->tenloai == 'nước' && $y->ngay == '2014-06-01')
					<tr>
						<td >
							{{$y->tenht}}
						</td>
						<td >
							{{$y->co_gia}}
						</td>

					</tr>
					@endif
				@endforeach
				</tbody>
			</table>


	</div>
	<br>	
@stop