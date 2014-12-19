@extends('user.template_user')

@section('title')
	<title>Cập nhật lịch ngừng cung điện</title>
	<script type="text/javascript">			
	        $(document).ready(function() {
				// $(function(){
		  //           $('#account').attr('class','active');
		  //       });
				var table = $('#lichcupdien').DataTable( {
					"scrollY": Math.min(500, ({{$lichcupdiens->count()}} * 70 + 70)) + "px",
					//"scrollX": true,		
					"paging": true, //phân trang
	        		"info": false, //show so lượng dòng,        		
				});
				$("#lichcupdien :checkbox").click(function (evt){
					$("#lichcupdien :checkbox").prop('checked',false);
					$(this).prop('checked',true);
					document.getElementById("edit").disabled=false;
					document.getElementById("del").disabled=false;						
				});
				if($("#lichcupdien input:checked").length==0){
					document.getElementById("edit").disabled=true;	
					document.getElementById("del").disabled=true;	
				}
			});

			function edit(value){
				alert(value);
			}
		</script>
@stop

@section('main-content')
	<div id="lichcup">

		<h3 class="tt1">THÔNG TIN NGỪNG CUNG CẤP ĐIỆN</h3>		
		<table id="lichcupdien" class="display" cellspacing="0" >
			<thead>
				<tr>
					<th width="7%"></th>
					<th width="15%">Ngày cúp điện</th>
					<th width="13%">Khu vực</th>
					<th width="17%">Thời gian</th>
					<th width="30%">Phạm vi</th>
					<th width="18%">Lý do</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($lichcupdiens as $k=>$v)
				<tr>
					<td><input type="checkbox" value="{{$v->id}}" onclick="edit_click('{{$v->ngaycupdien}}','{{$v->khuvuc}}','{{$v->thoigiancup}}','{{$v->phamvi}}','{{$v->lydocup}}')">
					</td>
					<td><?php 
							$date=strtotime($v->ngaycupdien);
							 $data =date('d-m-Y',$date);
							 echo $data;
						?></td>
					<td>{{$v->khuvuc}}</td>
					<td>{{$v->thoigiancup}}</td>
					<td>{{$v->phamvi}}</td>
					<td>{{$v->lydocup}}</td>	
				</tr>
				@endforeach
			</tbody>
		</table>
		<div id="control" class="text-left">
			<button class="btn btn-primary" id="new" data-toggle="modal" data-target="#myModalnew">Thêm mới</button>
			<button class="btn btn-primary" id="edit" data-toggle="modal" data-target="#myModal">Chỉnh sửa</button>
			<button class="btn btn-primary" id="del" data-toggle="modal" data-target="#myModaldel" >Xóa</button>
		</div>
<!-- thêm mới -->
		<div class="modal fade" id="myModalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Thêm Lịch ngắt điện</h4>
		      </div>
		      <form action="{{asset('user/lichngatdien')}}" id="formnew" method="post">
			      <div class="modal-body">				        
					<table >
						<tr>
							<td width="150px"><b>Ngày cúp điện</b></td>
							<td width="300px"><input type="date" class="form-control" name="ngaycupdien" id="ngaycupdien" placeholder="ngaycupdien"></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Khu vực</b></td>
							<td><select class="form-control" id="khuvuc" name="khuvuc">
						    		<option value="Quận 1">Quận 1</option>
						    		<option value="Quận 2">Quận 2</option>
						    		<option value="Quận 3">Quận 3</option>
						    		<option value="Quận 4">Quận 4</option>
						    		<option value="Quận 5">Quận 5</option>
						    	</select>
						    </td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Thời gian</b></td>
							<td>
								<select class="form-control" id="thoigian" name="thoigian">
						    		<option value="06h00">06h00</option>
						    		<option value="07h00">07h00</option>
						    		<option value="08h00">08h00</option>
						    		<option value="09h00">09h00</option>
						    		<option value="10h00">10h00</option>
						    		<option value="11h00">11h00</option>
						    		<option value="12h00">12h00</option>
						    		<option value="13h00">13h00</option>
						    	</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Phạm vi</b></td>
							<td><textarea class="form-control" name="phamvi" id="phamvi"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Lý do cúp</b></td>
							<td>
								<select class="form-control" id="lydo" name="lydo">
						    		<option value="Sửa chữa, bảo trì trên lưới điện.">Sửa chữa, bảo trì trên lưới điện.</option>
						    		<option value="Thay đổi bình điện.">Thay đổi bình điện.</option>
						    	</select>
							<td>
						</tr>
					</table>						
			      </div>
			      <div class="modal-footer">				        
			        <button class="btn btn-primary">Thêm mới</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<!-- Modal edit -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa lịch cúp điện</h4>
		      </div>
		      <form action="{{asset('user/sualichngatdien')}}" id="formedit" method="post">
			      <div class="modal-body">				        
					<table>
						<tr>
							<td width="150px"><b>Ngày cúp điện</b></td>
							<td width="300px">
								<input type="text" class="form-control" name="suangaycup" id="suangaycup">
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Khu vực</b></td>
							<td><select class="form-control" id="suakhuvuc" name="suakhuvuc">
						    		<option value="Quận 1">Quận 1</option>
						    		<option value="Quận 2">Quận 2</option>
						    		<option value="Quận 3">Quận 3</option>
						    		<option value="Quận 4">Quận 4</option>
						    		<option value="Quận 5">Quận 5</option>
						    	</select>
						    </td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Thời gian</b></td>
							<td>
								<select class="form-control" id="suathoigian" name="suathoigian">
						    		<option value="06h00">06h00</option>
						    		<option value="07h00">07h00</option>
						    		<option value="08h00">08h00</option>
						    		<option value="09h00">09h00</option>
						    		<option value="10h00">10h00</option>
						    		<option value="11h00">11h00</option>
						    		<option value="12h00">12h00</option>
						    		<option value="13h00">13h00</option>
						    	</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Phạm vi</b></td>
							<td><textarea class="form-control" name="suaphamvi" id="suaphamvi"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td>&nbsp</td>
						</tr>
						<tr>
							<td><b>Lý do cúp</b></td>
							<td>
								<input type="text" class="form-control" id="sualydo" name="sualydo">
							<td>
						</tr>
					</table>						
			      </div>
			      <div class="modal-footer">				        
			        <button class="btn btn-primary">Lưu lại</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
		<!-- Modal del -->
		<div class="modal fade" id="myModaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Xóa lịch ngắt điện</h4>
		      </div>
		      <form action="{{asset('user/xoalichngatdien')}}" id="formdel" method="post">
			      <div class="modal-body">				        
					<table>
						<p>Bạn có muốn xóa lịch ngắt điện ngày "<span id="ngaycupdien_del"></span>"?</p>
						<input class="hidden" type="text" id="ngaycupdien_del_" name="ngaycupdien_del_" style="display:none">
					</table>						
			      </div>
			      <div class="modal-footer">				        
			        <button class="btn btn-primary">Xóa</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
		
		<script type="text/javascript">
			function edit_click(ngaycupdien,khuvuc,thoigian,phamvi,lydocup){
				document.getElementById("suangaycup").value = ngaycupdien;
				document.getElementById("ngaycupdien_del").innerHTML = ngaycupdien;
				document.getElementById("ngaycupdien_del_").value = ngaycupdien;
				document.getElementById("suakhuvuc").value = khuvuc;
				document.getElementById("suathoigian").value = thoigian;
				document.getElementById("suaphamvi").value = phamvi;
				document.getElementById("sualydo").value = lydocup;	
			}
			

			$("#formnew").validate({
				rules:{
					ngaycupdien:{
						required:true,
						
					},
					phamvi:{
						required:true,	
					}
					
				},
				messages:{
					ngaycupdien:{
						required:"Ngày cúp điện không được trống"
					},
					phamvi:{
						required:"Phạm vi cần phải nhập"
					}
				}
			});
			$("#formedit").validate({
				rules:{
					email_edit:{
						required:true,
						email:true
					}
				}
			});
			</script>
	</div> 
	<br>

 <script>
		$(function() {
			$( "#ngaybd" ).datepicker({dateFormat: 'yy/mm/dd'});
		});
</script>
		
@stop