@extends('home.template')

@section('title')
	<title>Tin tức</title>
@stop

@section('main-content')
	<div>
		@foreach($tintucs as $y)
			<div id="cttt"> 
				<h3><b><a href="#">{{$y->tentt}}</a></b></h3>
				<p><b>{{$y->tieudett}}</b></p>
					<img src="{{$y->hinhanhtt}}" atl="cham soc" width="90%"><br>
					<div>{{$y->noidungtt}}</div>
				<p class="text-right"><i>
					(<?php 
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
			</div>
			
		@endforeach
	<div id="cttt">
		<h4>&nbsp</h4>
		<h4><b>Các tin khác</b></h4>
		<?php  $tin = Tintuc::paginate(5);?>
		@foreach($tin as $y)
		
			<ul id="cttt">
				<li><a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a>&nbsp<span><small><i>({{$y->ngaydangtin}})</i></small></span>
				</li>
			</ul>
		@endforeach
		<div class="row">
  <div class="col-md-4 col-md-offset-4">{{$tin->links();}}</div>
</div>
		
	</div>
	</div>
	<br>
	<script>
	$( ".pagination ul" ).addClass( "pagination" );
	</script>	
@stop
