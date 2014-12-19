@extends('home.template')

@section('title')
	<title>Trang chủ</title>
@stop

@section('main-content')
	<div id="nut">
   		@if (Session::has('global'))
			<p>{{ Session::get('global') }}</p>
		@endif 
	</div>
	<div class="row">
		<div class="col-md-6" id="tchu">
			<div id="">
				<a href="{{asset('home')}}"><img src="{{asset('images/nuoc/nuoc.jpg')}}" alt="" width="100%" hieght="auto" ></a>
			</div><!-- end wrapper -->
  		</div>
  		<div class="col-md-6" id="vanban">
			<div id="home1">
				<div class="alert alert-info text-center" ><b><i>VĂN BẢN PHÁP LUẬT</i></b></div>
				<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" width="100%" height="200" align="center">
					<ul>
						<li>
							<a href="{{URL::to('uploads/thutuc/4887_QD_BCT_30_05_2014.pdf')}}"><sup style="color:#000; font-size:13pt;"><i>30/05/2014: </i></sup>Bảng giá bán điện và thủ tục thực hiện</a>
						</li>
						<li></li>
						<li>
							<a href="{{URL::to('uploads/thutuc/thongtuxuly.pdf')}}"><sup style="color:#000;font-size:13pt;"><i>26/05/2014: </i></sup>Quy định trình tự xác minh và xử phạt vi phạm hành chính trong lĩnh vực
điện lực</a>
						</li>
						<li></li>
						<li>
							<a href="{{URL::to('uploads/thutuc/TT19-2013-BCT_01_08_2013.pdf')}}"><sup style="color:#000;font-size:13pt;"><i>01/08/2013: </i></sup>Thông tư quy định về giá bán điện và hướng dẫn thực hiện </a>
						</li>
						<li></li>
						<li>
							<a href="{{URL::to('uploads/thutuc/4887_QD_BCT_30_05_2014.pdf')}}"><sup style="color:#000; font-size:13pt;"><i>22/12/2012: </i></sup>Thông tư quy định về giá bán điện và hướng dẫn thực hiện </a>
						</li>
					</ul>

				</marquee>
			</div>
		</div>
		</div>
		<div class="row">
			<div id="tchu6"  >
				<h3 class="alert alert-warning text-left">Tin tức - sự kiện</h3>
				<div id="tchu5">
				<table>
					<tbody>
						<tr>
							<td width="55%" id="tchu4">
								<?php  $tintucs = DB::table('tintucs')->where('chuyenmuctt','=', 'sukien')
										->orderBy('id','asc')
										->take(1)
										->get();
								?>

								@foreach($tintucs as $y)
								
								
								<img src="{{$y->hinhanhtt}}" atl="cham soc" width="160px" height="140px">
							<b><a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a></b><br>
								{{$y->tieudett}}
							
							@endforeach
								
							</td>
							<td width="45%" id="tchu3">
								<?php  $tin = DB::table('tintucs')->where('chuyenmuctt','=', 'sukien')
										->orderBy('id','asc')
										->take(4)
										->offset(1) 
										->get();
								?>
										@foreach($tin as $y)
												
													<li>
														<a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a>
													</li>
												
											
										@endforeach
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="tchu6">
				<h3 class="alert alert-warning text-left">Tin ngành điện</h3>
				<div id="tchu5">
				<table>
					<tbody>
						<tr>
							<td width="55%" id="tchu4">
								<?php  $tintucs = DB::table('tintucs')->where('chuyenmuctt','=', 'tindien')
										->orderBy('id','asc')
										->take(1)
										->get();
								?>

								@foreach($tintucs as $v)
								
									<img src="{{$v->hinhanhtt}}" atl="cham soc" width="160px" height="140px">
								
									<b><a href="{{asset('home/tin/'.$v->id)}}">{{$v->tentt}}</a></b><br>
										{{$v->tieudett}}
									
								
								@endforeach
								
							</td>
							<td width="45%" id="tchu3">
								<?php  $tin = DB::table('tintucs')->where('chuyenmuctt','=', 'tindien')
										->orderBy('id','asc')
										->take(4)
										->offset(1) 
										->get();
								?>
										@foreach($tin as $y)
												
													<li>
														<a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a>
													</li>
												
											
										@endforeach
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>

  		</div>
  		<div class="row">
			<div id="tchu6">
				<h3 class="alert alert-warning text-left">An toàn tiết kiệm điện nước</h3>
				<div id="tchu5">
				<table>
					<tbody>
						<tr>
							<td width="55%" id="tchu4">
								<?php  $tintucs = DB::table('tintucs')->where('chuyenmuctt','=', 'antoandien')
										->orderBy('id','asc')
										->take(1)
										->get();
								?>

								@foreach($tintucs as $y)
								<!-- <div id="tchu4"> -->
									<img src="{{$y->hinhanhtt}}" atl="cham soc" width="160px" height="140px">
								
								<b><a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a></b><br>
									{{$y->tieudett}}
								
								@endforeach
								<!-- </div> -->
							</td>
							<td width="45%" id="tchu3">
								<?php  $tin = DB::table('tintucs')->where('chuyenmuctt','=', 'antoandien')
										->orderBy('id','asc')
										->take(4)
										->offset(1) 
										->get();
								?>
										@foreach($tin as $y)
												
													<li>
														<a href="{{asset('home/tin/'.$y->id)}}">{{$y->tentt}}</a>
													</li>
												
											
										@endforeach
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			<br>
  		</div>
  	
  	<div class="row">
  		<div id="tchu6">
  			<img src="{{asset('images/banner-footer1.gif')}}" width="100%" >
  		</div>
  	</div>

@stop