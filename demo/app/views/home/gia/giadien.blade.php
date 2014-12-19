@extends('home.template')

@section('title')
	<title>Trang chủ</title>
@stop

@section('main-content')
	<div id="tintuc">
		<h3 class="tt1"><b>BẢNG GIÁ ĐIỆN SỬ DỤNG</b></h3>
		<div>
			Ngày áp dụng: <i><?php $ngay = DB::table('ngays')->max('ngay');
								$date=strtotime($ngay);
							 $data =date('d-m-Y',$date);
							 echo $data;
			?></i>
		</div><br>
			<table class="table table-hover tt2" width="100%">
				<thead>
					<tr id="gianuoc1">
						<th>Đối tượng</th>
						<th>Chỉ số min</th>
						<th>Chỉ số max</th>
						<th>Giá</th>
					</tr>
				</thead>
				<tbody>
				@foreach($cogias as $y)
					@if($y->tenloai == 'điện' && $y->ngay == $ngay)
					<tr>
						<td >{{$y->tenht}}</td>
						<td>{{$y->chisomin}}</td>
						<td>{{$y->chisomax}}</td>
						<td >{{$y->co_gia}}</td>
					</tr>
					@endif
				@endforeach
				</tbody>
			</table>
	</div>
	<br>	
@stop