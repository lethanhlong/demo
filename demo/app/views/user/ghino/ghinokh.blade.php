@extends('user.template_user')

@section('title')
	<title>Khách hàng tiêu thụ điện</title>
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
		<div id="thongbao" class="alert-success">Danh sách khách hàng thu tiền điện</div>
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
			@if($date2 == $date && $h->tenloai == 'điện' && $h->no == 0 && $h->ttghi == 0)
					<tr>

						<td><a href="{{asset('user/xemhoadondien/'.$h->id)}}">{{$h->tenkh}}</a></td>
						
						<td>{{$h->socongto}}</td>
						<td>{{$h->thang}}</td>
						<td>{{$h->tt}}</td>
						<td>{{number_format($h->thanhtien,0,",",".")}}</td>
						<td>
							<button type="button" class="btn btn-info" onclick="ghino('{{$h->stt_hd}}')">Ghi nợ</button>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- Modal new -->
<!-- 		<div class="modal fade" id="myModalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Ghi chỉ số điện</h4>
		      </div>
		      <form action="{{asset('user/ghichisodien')}}" id="formnew" method="post">
			      <div class="modal-body">				        
					<table>
						<tr>
							<td width="150px"><b>Tên khách hàng</b></td>
							<td width="300px"><input type="text" class="form-control" name="tenkh" id="tenkh" ></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Số công tơ</b></td>
							<td><input type="text" class="form-control" id="socongto" name="socongto" readonly="true"></td>
						</tr>
						<tr><td>&nbsp</td><td>&nbsp</td></tr>
						<tr>
							<td><b>CS cũ</b></td>
							<td><input type="text" class="form-control" id="cscu" name="cscu" ></td>
						</tr>
						<tr><td>&nbsp</td><td>&nbsp</td></tr>
						<tr>
							<td><b>CS mới</b></td>
							<td><input type="text" class="form-control" name="cscm" id="cscm" onkeyup="update()"></td>
						</tr>

						<tr>
							<td><b>Số kWh tiêu thụ: </b></td>
							<td>&nbsp&nbsp&nbsp<span id="total">0.0</span></td>
						</tr>
						
					</table>						
			      </div>
			      <div class="hidden">
			      	<input type="text" class="form-control" name="tenht" id="tenht" >
			      	<input type="text" class="form-control" name="tenloai" id="tenloai" >
			      </div>
			      <div class="modal-footer">				        
			        <button class="btn btn-primary">Lưu lại</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<br> -->
</div>
		<script>
	
	function ghino(id) {
			if (confirm("Bạn có muốn ghi nợ khách hàng không ?")) {
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