@extends('home.template')

@section('title')
	<title>An Toàn tiết kiện</title>
@stop

@section('main-content')
	<div id="tintuc">
		<h3 class="tt1"><b>AN TOÀN TIẾT KIỆM ĐIỆN NƯỚC</b></h3>
			<table class="tt2" width="100%">
				<thead>
					<tr>
						<th width="30%">&nbsp</th>
						<th width="70%">&nbsp</th>
					</tr>
				</thead>
				<tbody>
				@foreach($tintucs as $y)
					
					<tr>
						<td class="tt2">
							<span >
								<img src="{{$y->hinhanhtt}}" atl="cham soc" width="230px" height="170px">
							</span>
						</td>
						<td class="tt3">
							<b><a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a></b><br>
							{{$y->tieudett}}
							<p class="text-right"><i>(<?php 
							$date=strtotime($y->ngaydangtin);
							 $data =date('d-m-Y h:m',$date);
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
									echo $weekday .', '.$data;
		 			?>)</i></p>
						</td>
					</tr>
					
				@endforeach
				</tbody>
			</table>

			
		<div id="cttt">
			<h4>&nbsp</h4>
			<h4><b>Các tin khác</b></h4>
			<?php  $tin = DB::table('tintucs')->where('chuyenmuctt','=', 'sukien')
										->orderBy('id','asc')
										->take(10)
										->offset(5) 
										->get();
										?>
			@foreach($tin as $y)
				
					<?php  
						$date=strtotime($y->ngaydangtin);
						$date = date('d-m-Y', $date);						
					?>
					<ul id="cttt">
						<li><a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a>&nbsp<i>({{$date}})</i>
						</li>
					</ul>
				
			@endforeach
		</div>
	</div>
	<br>	
@stop
