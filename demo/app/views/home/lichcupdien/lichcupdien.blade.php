@extends('home.template')

@section('title')
	<title>Lịch ngừng cung điện</title>
@stop

@section('main-content')
	<div id="lichcup">
		<h3 class="tt1"><b>THÔNG TIN NGỪNG CUNG CẤP ĐIỆN</b></h3>
		<div>
			
		</div>
		<?php 
			$lichcup = DB::table('lichcupdiens')
													->orderBy('id', 'desc')
													->take(8) 
													->get();
		?>
		
		<table class="table table-bordered table-hover" id="lichcup1">
			<thead>
				<tr id="gianuoc1">
					<th width="15%" >Ngày</th>
					<th width="10%" >Khu vực</th>
					<th width="10%" >Thời gian</th>
					<th width="40%" >Phạm vi áp dụng</th>
					<th width="25%">Lý do</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($lichcup as $lich => $v) 					
				
				<tr >
					<td id="gianuoc1"><?php 
							$date=strtotime($v->ngaycupdien);
							 $data =date('d-m-Y',$date);
							 	$weekday = date("l", $date);
							 	switch($weekday) {
								    case 'Monday':
								        $weekday = 'Thứ hai';
								        break;
								    case 'Tuesday':
								        $weekday = 'Thứ ba';
								        break;
								    case 'Wednesday':
								        $weekday = 'Thứ tư';
								        break;
								    case 'Thursday':
								        $weekday = 'Thứ năm';
								        break;
								    case 'Friday':
								        $weekday = 'Thứ sáu';
								        break;
								    case 'Saturday':
								        $weekday = 'Thứ bảy';
								        break;
								    default:
								        $weekday = 'Chủ nhật';
								        break;
									}
									echo $weekday .'<br>';
									echo $data;
		 			?></td>
					<td > {{$v->khuvuc}}</td>
					<td >{{$v->thoigiancup}}</td>
					<td >{{$v->phamvi}}</td>
					<td >{{$v->lydocup}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div> 
	<br>

 <script>
		$(function() {
			$( "#ngaybd" ).datepicker({dateFormat: 'yy/mm/dd'});
			$( "#ngaykt" ).datepicker({dateFormat: 'yy/mm/dd'});
		});
</script>
		
@stop