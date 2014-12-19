@extends('user.template_user')

@section('title')
	<title>Xóa nợ khách hàng</title>
	<script type="text/javascript">
	$(document).ready(function(){
			
			 var table = $('#bang1').DataTable( {
					"scrollY": Math.min(500, ({{$hoadon->count()}} * 100 + 100)) + "px",
					"paging": true, 
	        		"info": false,         		
				});
			
			 });

	 </script>
@stop
@section('main-content')
	
	<div> 
		<div id="thongbao" class="alert-success">Danh sách khách hàng nợ hóa đơn</div>
		<br>
		<div id="cnhopdong">
			@if (Session::has('global'))
				<p>{{ Session::get('global') }}</p>
			@endif
		</div>
		<div id="cnhopdong1">
			<table class="display" id="bang1">
				<thead>
					<tr>
						
						<th>Tên khách hàng</th>
						<th>Số công tơ</th>
						<th>Tháng</th>
						<th>Tiêu thụ</th>
						<th >Thành tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
	<?php 

		$hoadon = DB::table('hoadons')
		->join('hopdongs', function($join)
		 	{
            $join->on('hoadons.socongto', '=', 'hopdongs.socongto');
        })
		 ->join('khachhangs', function($join)
        {
            $join->on('hopdongs.makh', '=', 'khachhangs.makh');
        })
		 ->join('tieuthus', function($join)
        {
            $join->on('hoadons.socongto', '=', 'tieuthus.socongto')->on('hoadons.thang', '=', 'tieuthus.thang');
        })
		// ->where('hoadons.thang','=',(DB::table('hoadons')->max('thang')))
		->orderBy('hoadons.thang', 'asc')
		->distinct()
		->get();
	?>
					@foreach ($hoadon as $h)
			<?php
				$date=strtotime(date('Y-m-d'));
				$date = date('m', $date);
						
		 		$date1=strtotime($h->thang);
				$date2 = date('m', $date1);
			?>
			@if($date2 == $date && $h->tenloai == 'điện' && $h->no != 0 && $h->ttghi == 0)
					<tr>

						<td><a href="{{asset('user/xemhoadondien/'.$h->id)}}">{{$h->tenkh}}</a></td>
						
						<td>{{$h->socongto}}</td>
						<td>{{$h->thang}}</td>
						<td>{{$h->tt}}</td>
						<td>{{number_format($h->thanhtien,0,",",".")}}</td>
						<td>
							<button type="button" class="btn btn-info" onclick="xoano('{{$h->stt_hd}}')">Xóa nợ</button>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<script>
	
	function xoano(id) {
			if (confirm("Bạn có muốn xóa nợ khách hàng không ?")) {
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