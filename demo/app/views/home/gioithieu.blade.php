@extends('home.template')

@section('title')
	<title>Gioi thieu</title>
@stop

@section('main-content')
	<div>
		@foreach($gioithieus as $y)

			<div id="gthieu"> 
					<h3><b>{{$y->tieude}}</b></h3>
					 <?php  
					 	$date=strtotime($y->ngaydang);
					 	$date = date('d-m-Y', $date);						
					 ?>
					<span><small>Ngày đăng: <i>{{$date}}.</i></small></span><br>
					{{$y->noidung}}
			</div>
		@endforeach
	</div>
	<br>	
@stop

