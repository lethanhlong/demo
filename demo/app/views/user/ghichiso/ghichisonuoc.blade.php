@extends('user.template_user')

@section('title')
	<title>Ghi chi số nước tiêu thụ</title>
	<script type="text/javascript">
	$(document).ready(function(){
			
			 var table = $('#bang1').DataTable( {
					"scrollY": Math.min(500, ({{$hopdong->count()}} * 100 + 100)) + "px",
						
					"paging": false, 
	        		"info": false,         		
				});
			 
			 });

	 </script>
@stop
@section('main-content')
	<div> 
		<div id="thongbao" class="alert-success">Danh sách khách hàng ghi chỉ số nước</div>
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
						<th >CMND</th>
						<th >Số công tơ</th>
						<th>Địa chỉ</th>
						<!-- <th >cscu</th>
						<th >cscm</th> -->
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$hopdong = DB::table('hopdongs')
								 ->join('khachhangs', function($join)
						        {
						            $join->on('hopdongs.makh', '=', 'khachhangs.makh');
						         })
								 ->join('tieuthus', function($join)
								 	{
						            $join->on('hopdongs.socongto', '=', 'tieuthus.socongto');
						        })
								->where('hopdongs.tenloai','=','nước')
								->distinct()
								->get();
					?>
					@foreach ($hopdong as $h)
						<?php 
						$date= date('Y-m-d');
						// tháng trước đó
							$new_date = strtotime ( '-1 month' , strtotime ( $date ) ) ;
							$new_date = date ( 'Y-m-d' , $new_date );
						// Trả về trước đó 2 tháng
							$n_date = strtotime ( '-2 month' , strtotime ( $date ) ) ;
							$n_date = date ( 'Y-m-d' , $n_date );
						?>
						@if($h->ttghi == 0 )
					<tr>
						
						<td><a href="{{asset('user/cnchisodien/'.$h->id)}}">{{$h->tenkh}}</a></td>
						<td>{{$h->cmt}}</td>
						<td>{{$h->socongto}}</td>
						<td>{{$h->diachi}}</td>
						<!-- <td>{{$h->cscu}}</td>
						<td>{{$h->cscm}}</td> -->
						<td>
							<button class="btn btn-primary" id="new" data-toggle="modal" data-target="#myModalnew" onclick="edit_click('{{$h->tenkh}}','{{$h->socongto}}','{{$h->cscm}}','{{$h->tenht}}','{{$h->tenloai}}')">Ghi CS</button>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- Modal new -->
		<div class="modal fade" id="myModalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Ghi chỉ số nước</h4>
		      </div>
		      <form action="{{asset('user/ghichisonuoc')}}" id="formnew" method="post">
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
							<td><b>Số M<sup>3</sup> tiêu thụ: </b></td>
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
		<br>
		</div>
<script type="text/javascript">
	function edit_click(tenkh,socongto,cscm,tenht,tenloai){
		document.getElementById("tenkh").value = tenkh;
		document.getElementById("socongto").value = socongto;
		document.getElementById("cscu").value = cscm;
		document.getElementById("tenht").value = tenht;
		document.getElementById("tenloai").value = tenloai;
				
	};
	function update(){
		var csu = document.getElementById("cscu").value;
		var csm = document.getElementById("cscm").value;
		document.getElementById("total").innerHTML = csm - csu;
	}
</script>
@stop