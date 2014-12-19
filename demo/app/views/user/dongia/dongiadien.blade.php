@extends('user.template_user')

@section('title')
	<title>Cập nhật đơn giá điện</title>
@stop

@section('main-content')
	<div id="tintuc">
		<h3 class="tt1"><b>BẢNG GIÁ ĐIỆN SỬ DỤNG</b></h3>
		
		<form action="" method="POST" class="form-inline" role="form">	
		<table class="table table-hover tt2" id="lichcup1">
				<thead>
					<tr id="gianuoc1">
						<th width="25%">Đối tượng</th>
						<th width="25%">Chỉ số min</th>
						<th width="25%">Chỉ số max</th>
						<th width="25%">Giá</th>
					</tr>
				</thead>
				<tbody class ="text-center">
					<tr>
						<th rowspan="7">Sinh hoạt</th>
						<td>0</td>
						<td>50</td>
						<td><input type="text" class="form-control" name="sh1" id="sh1"></td>
					</tr>
					<tr>
						<td>51</td>
						<td>100</td>
						<td><input type="text" class="form-control" name="sh2" id="sh2"></td>
					</tr>
					<tr>
						<td>101</td>
						<td>150</td>
						<td><input type="text" class="form-control" name="sh3" id="sh3"></td>
					</tr>
					<tr>
						<td>151</td>
						<td>200</td>
						<td><input type="text" class="form-control" name="sh4" id="sh4"></td>
					</tr>
					<tr>
						<td>201</td>
						<td>300</td>
						<td><input type="text" class="form-control" name="sh5" id="sh5"></td>
					</tr>
					<tr>
						<td>301</td>
						<td>400</td>
						<td><input type="text" class="form-control" name="sh6" id="sh6"></td>
					</tr>
					<tr>
						<td>401</td>
						<td></td>
						<td><input type="text" class="form-control" name="sh7" id="sh7"></td>
					</tr>
					<tr>
						<th>Sản xuất</th>
						<td></td>
						<td></td>
						<td><input type="text" class="form-control" name="sx8" id="sx8"></td>
					</tr>
					<tr>
						<th>Kinh doanh</th>
						<td></td>
						<td></td>
						<td><input type="text" class="form-control" name="kd9" id="kd9"></td>
					</tr>
				</tbody>
			</table>	
			<button type="submit" class="btn btn-info">Lưu lại</button>
			<button type="reset" class="btn btn-info">Nhập lại</button>
		</form>
			
	</div>
	<br>	
@stop