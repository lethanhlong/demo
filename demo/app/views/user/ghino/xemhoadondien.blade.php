<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="{{asset('images/favicon22.ico')}}">
		<!-- Bootstrap CSS -->
		<link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/bootstrap-theme.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery-ui.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery-ui.min.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery.ui.theme.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/nav.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery.dataTables.css')}}" rel="stylesheet">
		{{HTML::style('bootstrap/css/user.css')}}
		
		
		<!-- jQuery -->
		<script src="{{asset('bootstrap/js/jquery-2.1.0.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-2.1.0.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-ui.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.dataTables.min.js')}}"></script>
 	   <!-- jquery validate -->
 	    <script src="{{asset('bootstrap/js/jquery.validate.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.validate.min.js')}}"></script>

		
		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	</head>
	<body>
	
		<div class="container-fluid">
			<div class="row">

				@foreach ($hoadon as $k)
				<div class="col-lg-8">
	<?php
if($k->tenloai == 'điện' && $k->tenht == 'Sinh hoạt'){
				$dgia =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','<','50')
								->where('dongias.chisomax','>=','0')
								->pluck('cogias.co_gia');

				$dgia1 =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','<','100')
								->where('dongias.chisomax','>=', '51')
								->pluck('cogias.co_gia');

				$dgia2 =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','<','150')
								->where('dongias.chisomax','>=','101')
								->pluck('cogias.co_gia');

				$dgia3 =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','<','200')
								->where('dongias.chisomax','>=', '151')
								->pluck('cogias.co_gia');

				$dgia4 =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','<','300')
								->where('dongias.chisomax','>=','201')
								->pluck('cogias.co_gia');

				$dgia5 =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','<','400')
								->where('dongias.chisomax','>=', '301')
								->pluck('cogias.co_gia');
				$dgia6 =  DB::table('dongias')
								->join('cogias', function($join)
								 	{
						            $join->on('dongias.stt', '=', 'cogias.stt');
						        })
						        ->join('htsds', function($join)
								 	{
						            $join->on('cogias.tenht','=','htsds.tenht')
						            ->orOn('cogias.tenloai','=','htsds.tenloai');
						        })
								->join('hopdongs', function($join)
								 	{
						            $join->on('htsds.tenht','=','hopdongs.tenht')
						            ->orOn('htsds.tenloai','=','hopdongs.tenloai');
						        })
								 
								->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
								->where('cogias.tenht','=', $k->tenht)
								->where('cogias.tenloai','=',$k->tenloai)
								->where('hopdongs.socongto','=',$k->socongto)
								->where ('dongias.chisomin','>','400')
								->pluck('cogias.co_gia');
		}

		if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){
		     $dgia7 =  DB::table('dongias')
					->join('cogias', function($join)
					{
						$join->on('dongias.stt', '=', 'cogias.stt');
					})
					->join('htsds', function($join)
					{
						$join->on('cogias.tenht','=','htsds.tenht')
						->orOn('cogias.tenloai','=','htsds.tenloai');
					})
					->join('hopdongs', function($join)
					{
						$join->on('htsds.tenht','=','hopdongs.tenht')
						->orOn('htsds.tenloai','=','hopdongs.tenloai');
					})				 
					->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
					->where('cogias.tenht','=', $k->tenht)
					->where('cogias.tenloai','=',$k->tenloai)
					->where('hopdongs.socongto','=',$k->socongto)
					->pluck('cogias.co_gia');
					

	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		    $dgia8 =  DB::table('dongias')
			->join('cogias', function($join)
			{
			    $join->on('dongias.stt', '=', 'cogias.stt');
			})
			->join('htsds', function($join)
			{
		 		$join->on('cogias.tenht','=','htsds.tenht')
		        ->orOn('cogias.tenloai','=','htsds.tenloai');
		    })
			->join('hopdongs', function($join)
		 	{
		        $join->on('htsds.tenht','=','hopdongs.tenht')
		        ->orOn('htsds.tenloai','=','hopdongs.tenloai');
		    })				 
			->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
			->where('cogias.tenht','=', $k->tenht)
			->where('cogias.tenloai','=',$k->tenloai)
			->where('hopdongs.socongto','=',$k->socongto)
			->pluck('cogias.co_gia');
			
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			$dgia9 =  DB::table('dongias')
			->join('cogias', function($join)
			{
				$join->on('dongias.stt', '=', 'cogias.stt');
			})
			->join('htsds', function($join)
			{
				$join->on('cogias.tenht','=','htsds.tenht')
				->orOn('cogias.tenloai','=','htsds.tenloai');
			})
			->join('hopdongs', function($join)
			{
				$join->on('htsds.tenht','=','hopdongs.tenht')
				->orOn('htsds.tenloai','=','hopdongs.tenloai');
			})
								 
			->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
			->where('cogias.tenht','=', $k->tenht)
			->where('cogias.tenloai','=',$k->tenloai)
			->where('hopdongs.socongto','=',$k->socongto)	
			->pluck('cogias.co_gia');
			
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			$dgia10 =  DB::table('dongias')
				->join('cogias', function($join)
				{
					 $join->on('dongias.stt', '=', 'cogias.stt');
				})
				->join('htsds', function($join)
				{
					$join->on('cogias.tenht','=','htsds.tenht')
					->orOn('cogias.tenloai','=','htsds.tenloai');
				})
				->join('hopdongs', function($join)
				{
					$join->on('htsds.tenht','=','hopdongs.tenht')
					->orOn('htsds.tenloai','=','hopdongs.tenloai');
				})
								 
				->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
				->where('cogias.tenht','=', $k->tenht)
				->where('cogias.tenloai','=',$k->tenloai)
				->where('hopdongs.socongto','=',$k->socongto)
				->pluck('cogias.co_gia');
				
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			$dgia11 =  DB::table('dongias')
				->join('cogias', function($join)
				{
					$join->on('dongias.stt', '=', 'cogias.stt');
				})
				->join('htsds', function($join)
				{
					 $join->on('cogias.tenht','=','htsds.tenht')
					->orOn('cogias.tenloai','=','htsds.tenloai');
				})
				->join('hopdongs', function($join)
				{
					$join->on('htsds.tenht','=','hopdongs.tenht')
					->orOn('htsds.tenloai','=','hopdongs.tenloai');
				})	 
				->where('cogias.ngay','=',(DB::table('cogias')->max('ngay')))
				->where('cogias.tenht','=', $k->tenht)
				->where('cogias.tenloai','=',$k->tenloai)
				->where('hopdongs.socongto','=',$k->socongto)
				->pluck('cogias.co_gia');
				
		}

echo"<div id='xemhd'>
		<div class='row'>

			<div class='col-md-2 text-center' id='xemhdlogo'>
				<br><br><br>
			</div>
			<div class='col-md-7 text-center'>
				<b><p id='tthd'>
					HÓA ĐƠN GTGT ("; if($k->tenloai == 'điện'){ echo "TIỀN ĐIỆN";} else {echo "TIỀN NƯỚC";} echo ")
				</p><p>(Bản thể hiện của hóa đơn điện tử)</p></b>
				Kỳ: 1 &nbsp&nbsp Từ ngày: <font id='dh'>";
		$month = strtotime(date("Y-m-d", strtotime($k->thang)) . " -1 month");
		$month = strftime("%Y-%m-%d",$month);
		$ngay = strtotime(date("Y-m-d", strtotime($month)) . " +1 day");
		$ngay = strftime("%d/%m/%Y",$ngay);
		$ngayky = strtotime(date("Y-m-d", strtotime($k->thang)) . " +1 day");
		$ngayky = strftime("%d/%m/%Y",$ngayky);
			echo $ngay;
			echo "</font>&nbsp&nbsp&nbsp&nbsp&nbspĐến ngày: <font id='dh'>"; 
		$denngay=strtotime($k->thang);
		$denngay = date('d/m/Y', $denngay);
			echo $denngay;
	   echo"</font></div>
	  
			<div class='col-md-3'>
			<p>Ký Hiệu: <font id='dh'>DD/14E</p></font>
			Số: <font id='dh'>0102411</font><br>
			ID HĐ: <font id='dh'>2136".$k->stt_hd ."</font>
			</div>
		</div>
		<b><p>Công ty Điện nước Minh Long</p></b>
		<b>Địa chỉ:</b> <font id='dh'>Số 1 Hưng Đạo Vương.</font>
		
		<div class='row'>
			<div class='col-md-4'>
				<b>Điện thoại:</b> 0945989323
			</div>
			<div class='col-md-4'>
				<b>MST:</b><font id='dh'> 00300942001-021</font>
			</div>
			<div class='col-md-4'>
				<b>ĐT sữa chữa:</b> 01677399607
			</div>
		</div><br>
		<p><b>Tên khách hàng: <font id='dh'> ".$k->tenkh."</font></b></p>
		<p><b>Địa chỉ: </b><font id='dh'> ".$k->diachi."</font></p>

		<div class='row'>
			<div class='col-md-4'>
				<b>Điện thoại:</b><font id='dh'> ".$k->sodt_kh."</font>
			</div>
			<div class='col-md-4'>
				<b>MST:</b><font id='dh'> 00300942001-021</font>
			</div>
			<div class='col-md-4'>
				<b>Số công tơ: </b><font id='dh'>".$k->socongto."</font>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-4'>
				<b>Mã KH:</b><font id='dh'> PB".$k->makh."</font>
			</div>
			<div class='col-md-4'>
				<b>Số hộ:</b><font id='dh'>1</font>
			</div>
		</div>
		<div id='banghd'>
			<table class='table table-bordered'>
	            <thead>
	                <tr id='banghd_tt'>
	                	<th>BỘ CS</th>
	                    <th>CHỈ SỐ MỚI</th>
	                    <th>CHỈ SỐ CŨ</th>
	                    <th>HS NHÂN</th>
	                    <th>TIÊU THỤ</th>
	                    <th>ĐƠN GIÁ</th>
	                    <th>THÀNH TIỀN</th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr class='text-center'>
	                	<td><font id='dh'>KT</font></td>
	                    <td><font id='dh'>".$k->cscm."</font></td>
	                    <td><font id='dh'>".$k->cscu."</font></td>
	                   
	                    <td><font id='dh'>".$k->tt."</font></td>
	                    <td></td>
	                    <td></td>
	                </tr>
	                <tr class='text-right'>
	                	<td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td><font id='dh'>";
	    if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){
	        if($k->tt <= 50){
				echo $k->tt;
			} else if($k->tt <= 100){			
				echo "50<br>"; echo $k->tt-50;
			} else if($k->tt<=150){ 
				echo "50<br>50<br>"; echo $k->tt-100;
				
			} else if($k->tt <= 200){
				echo "50<br>50<br>50<br>"; echo $k->tt-150;
			}
			else if($k->tt <= 300){
				echo "50<br>50<br>50<br>50<br>"; echo $k->tt-200;
			}
			else if($k->tt <= 400){
				echo "50<br>50<br>50<br>50<br>100<br>"; echo $k->tt-300;		
			} else {
				echo "50<br>50<br>50<br>50<br>100<br>100<br>"; echo $k->tt-400;
			}
	    }
	    if($k->tenloai == 'điện'&& $k->tenht == 'Sản xuất'){
		     echo $k->tt;
	    }
	    if($k->tenloai == 'điện'&& $k->tenht == 'Kinh doanh'){
		     echo $k->tt;
	    }
	    if($k->tenloai == 'nước'&& $k->tenht == 'Sinh hoạt'){
		     echo $k->tt;
	    }
	    if($k->tenloai == 'nước'&& $k->tenht == 'Sản xuất'){
		     echo $k->tt;
	    }
	    if($k->tenloai == 'nước'&& $k->tenht == 'Kinh doanh'){
		     echo $k->tt;
	    }

	                echo"</font></td>
	                    <td><font id='dh'>";
	    if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){    
			if($k->tt <= 50){
				echo number_format($dgia,0,",",".");
			} else if($k->tt <= 100){			
				echo number_format($dgia,0,",",".") ."<br>". number_format($dgia1,0,",",".");
			} else if($k->tt<=150){ 
				echo number_format($dgia,0,",",".") ."<br>".number_format($dgia1,0,",",".")."<br>".number_format($dgia2,0,",",".");
			} else if($k->tt <= 200){
				echo number_format($dgia,0,",",".") ."<br>" . number_format($dgia1,0,",",".") ."<br>" . number_format($dgia2,0,",",".") ."<br>" . number_format($dgia3,0,",",".");
			}
			else if($k->tt <= 300){
				echo number_format($dgia,0,",",".") ."<br>" . number_format($dgia1,0,",",".") ."<br>" . number_format($dgia2,0,",",".") ."<br>" . number_format($dgia3,0,",",".") ."<br>" . number_format($dgia4,0,",",".");
			}
			else if($k->tt <= 400){
				echo number_format($dgia,0,",",".") ."<br>" . number_format($dgia1,0,",",".") ."<br>" . number_format($dgia2,0,",",".") ."<br>" . number_format($dgia3,0,",",".") ."<br>" . number_format($dgia4,0,",",".")."<br>" . number_format($dgia5,0,",",".");		
			} else {
				echo number_format($dgia,0,",",".") ."<br>" . number_format($dgia1,0,",",".") ."<br>" . number_format($dgia2,0,",",".") ."<br>" . number_format($dgia3,0,",",".") ."<br>" . number_format($dgia4,0,",",".")."<br>" . number_format($dgia5,0,",",".") ."<br>" . number_format($dgia6,0,",",".");	
			}
	    }

	    if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){    
			echo number_format($dgia7,0,",",".");
	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		   
			echo number_format($dgia8,0,",",".");
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			
			echo number_format($dgia9,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			
			echo number_format($dgia10,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			
			echo number_format($dgia11,0,",",".");
		}


	                echo"</font></td>
	                    <td><font id='dh'>";
	    //thanh tien cua tung don gia ********************************************************
	    if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){    
			if($k->tt <= 50){
				echo number_format($k->tt*$dgia,0,",",".");
			} else if($k->tt <= 100){			
				echo number_format(50*$dgia,0,",",".") ."<br>". number_format(($k->tt-50)*$dgia1,0,",",".");
			} else if($k->tt<=150){ 
				echo number_format(50*$dgia,0,",",".") ."<br>".number_format(50*$dgia1,0,",",".")."<br>".number_format(($k->tt-100)*$dgia2,0,",",".");
			} else if($k->tt <= 200){
				echo number_format(50*$dgia,0,",",".") ."<br>" . number_format(50*$dgia1,0,",",".") ."<br>" . number_format(50*$dgia2,0,",",".") ."<br>" . number_format(($k->tt-150)*$dgia3,0,",",".");
			}
			else if($k->tt <= 300){
				echo number_format(50*$dgia,0,",",".") ."<br>" . number_format(50*$dgia1,0,",",".") ."<br>" . number_format(50*$dgia2,0,",",".") ."<br>" . number_format(50*$dgia3,0,",",".") ."<br>" . number_format(($k->tt-200)*$dgia4,0,",",".");
			}
			else if($k->tt <= 400){
				echo number_format(50*$dgia,0,",",".") ."<br>" . number_format(50*$dgia1,0,",",".") ."<br>" . number_format(50 *$dgia2,0,",",".") ."<br>" . number_format(50*$dgia3,0,",",".") ."<br>" . number_format(100*$dgia4,0,",",".")."<br>" . number_format(($k->tt-300)*$dgia5,0,",",".");		
			} else {
				echo number_format(50*$dgia,0,",",".") ."<br>" . number_format(50*$dgia1,0,",",".") ."<br>" . number_format(50*$dgia2,0,",",".") ."<br>" . number_format(50*$dgia3,0,",",".") ."<br>" . number_format(100*$dgia4,0,",",".")."<br>" . number_format(100*$dgia5,0,",",".") ."<br>" . number_format(($k->tt-400)*$dgia6,0,",",".");	
			}
	    }

	    if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){    
			echo number_format($k->tt*$dgia7,0,",",".");
	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		   
			echo number_format($k->tt*$dgia8,0,",",".");
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			
			echo number_format($k->tt*$dgia9,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			
			echo number_format($k->tt*$dgia10,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			
			echo number_format($k->tt*$dgia11,0,",",".");
		}

	                echo"</font></td>
	                </tr>
	                <tr>
	                	<td colspan='4'>Cộng: </td>
	                    
	                    <td class='text-right'><font id='dh'><b>".$k->tt."</b></font></td>
	                    <td></td>
	                    <td class='text-right'><font id='dh'><b>";
	    // thành tiền chưa có thuế
	    if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){    
			if($k->tt <= 50){
				echo number_format($k->tt*$dgia,0,",",".");
			} else if($k->tt <= 100){			
				echo number_format((50*$dgia)+(($k->tt-50)*$dgia1),0,",",".");
			} else if($k->tt<=150){ 
				echo number_format((50*$dgia)+(50*$dgia1)+(($k->tt-100)*$dgia2),0,",",".");
			} else if($k->tt <= 200){
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(($k->tt-150)*$dgia3),0,",",".");
			}
			else if($k->tt <= 300){
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(($k->tt-200)*$dgia4),0,",",".");
			}
			else if($k->tt <= 400){
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(($k->tt-300)*$dgia5),0,",",".");		
			} else {
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(100*$dgia5)+(($k->tt-400)*$dgia6),0,",",".");	
			}
	    }

	    if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){    
			echo number_format($k->tt*$dgia7,0,",",".");
	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		   
			echo number_format($k->tt*$dgia8,0,",",".");
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			
			echo number_format($k->tt*$dgia9,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			
			echo number_format($k->tt*$dgia10,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			
			echo number_format($k->tt*$dgia11,0,",",".");
		}

	                echo"</b></font></td>
	                </tr>
	                <tr>
	                	<td colspan='4'>Thuế suất GTGT: <font id='dh'> 10% </font></td>
	                    
	                    <td colspan='2'>Thuế GTGT: </td>
	                    
	                    <td class='text-right'><font id='dh'><b>";
	    //thuế suất 10% thanh tiền**********************************************************

	    if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){    
			if($k->tt <= 50){
				echo number_format(round(($k->tt*$dgia)*0.1),0,",",".");
			} else if($k->tt <= 100){			
				echo number_format(round(((50*$dgia)+(($k->tt-50)*$dgia1))*0.1),0,",",".");
			} else if($k->tt<=150){ 
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(($k->tt-100)*$dgia2))*0.1),0,",",".");
			} else if($k->tt <= 200){
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(($k->tt-150)*$dgia3))*0.1),0,",",".");
			}
			else if($k->tt <= 300){
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(($k->tt-200)*$dgia4))*0.1),0,",",".");
			}
			else if($k->tt <= 400){
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(($k->tt-300)*$dgia5))*0.1),0,",",".");		
			} else {
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(100*$dgia5)+(($k->tt-400)*$dgia6))*0.1),0,",",".");	
			}
	    }

	    if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){    
			echo number_format(round($k->tt*$dgia7*0.1),0,",",".");
	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		   
			echo number_format(round($k->tt*$dgia8*0.1),0,",",".");
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			
			echo number_format(round($k->tt*$dgia9*0.1),0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			
			echo number_format(round($k->tt*$dgia10*0.1),0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			
			echo number_format(round($k->tt*$dgia11*0.1),0,",",".");
		}

	                echo"</b> </font></td>
	                </tr>
	                <tr>
	                	<td colspan='6'>Tổng cộng tiền thanh toán: </td>
           
	                    <td class='text-right'><font id='dh'><b>".number_format($k->thanhtien,0,",",".")."</b></font></td>
	                </tr>
	                <tr>
	                	<td colspan='7'><i>Số tiền viết bằng chữ: </i><font id='dh'> ";
	    //Đổi số thành chữ***********************************************
	                	$number =$k->thanhtien;
	    function convert_number_to_words($number) {
		 
		$hyphen      = ' ';
		$conjunction = '  ';
		$separator   = ' ';
		// $negative    = 'âm ';
		// $decimal     = ' phẩy ';
		$dictionary  = array(
		0                   => 'không',
		1                   => 'một',
		2                   => 'hai',
		3                   => 'ba',
		4                   => 'bốn',
		5                   => 'năm',
		6                   => 'sáu',
		7                   => 'bảy',
		8                   => 'tám',
		9                   => 'chín',
		10                  => 'mười',
		11                  => 'mười một',
		12                  => 'mười hai',
		13                  => 'mười ba',
		14                  => 'mười bốn',
		15                  => 'mười năm',
		16                  => 'mười sáu',
		17                  => 'mười bảy',
		18                  => 'mười tám',
		19                  => 'mười chín',
		20                  => 'hai mươi',
		30                  => 'ba mươi',
		40                  => 'bốn mươi',
		50                  => 'năm mươi',
		60                  => 'sáu mươi',
		70                  => 'bảy mươi',
		80                  => 'tám mươi',
		90                  => 'chín mươi',
		100                 => 'trăm',
		1000                => 'nghìn',
		1000000             => 'triệu',
		1000000000          => 'tỷ',
		
		); 
		if (!is_numeric($number)) {
			return false;
		}
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		// overflow
			trigger_error(
			'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		} 
		// if ($number < 0) {
		// 	return $negative . convert_number_to_words(abs($number));
		// } 
		$string = $fraction = null;
		 
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
		 
		switch (true) {
		case $number < 21:
			$string = $dictionary[$number];
		break;
		case $number < 100:
			$tens   = ((int) ($number / 10)) * 10;
			$units  = $number % 10;
			$string = $dictionary[$tens];
			if ($units) {
				$string .= $hyphen . $dictionary[$units];
				}
		break;
		case $number < 1000:
			$hundreds  = $number / 100;
			$remainder = $number % 100;
			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
			if ($remainder) {
				$string .= $conjunction . convert_number_to_words($remainder);
			}
		break;
		default:
			$baseUnit = pow(1000, floor(log($number, 1000)));
			$numBaseUnits = (int) ($number / $baseUnit);
			$remainder = $number % $baseUnit;
			$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
			if ($remainder) {
				$string .= $remainder < 100 ? $conjunction : $separator;
				$string .= convert_number_to_words($remainder);
			}
		break;
		}

		return $string;
}
					echo ucfirst(convert_number_to_words($k->thanhtien));

	                echo"&nbspđồng. </font></td>
	                </tr>
	                <tr>
	                	<td colspan='7' class='text-right'><b><p><font id='dh'>Ngày ký: ".$ngayky."<br>
	                	Người ký: Công ty Điện nước Minh Long</font></p></b>
	                	</td>
	                </tr>
	                
	            </tbody>
	        </table>
	    </div>
	</div>";
	?>
			</div>

			<div class="col-lg-4">

				<div id="xemhd"><b>CÔNG TY ĐIỆN LỰC MINH LONG</b><br>
					Mã số thuế: <font id="dh"> 00300942001-021</font><br><br>	
					<div class="text-center" id="tdgbao"><b>
						GIẤY BÁO 
						@if($k->tenloai == 'điện')
							TIỀN ĐIỆN
						 @endif
						@if ($k->tenloai == 'nước') 
							TIỀN NƯỚC
						@endif
					</b><br>
					(Không phải hóa đơn)

					</div>
					<br>

	<?php
		echo "Kỳ: 1 &nbsp Từ ngày: <font id='dh'>";
		$month = strtotime(date("Y-m-d", strtotime($k->thang)) . " -1 month");
		$month = strftime("%Y-%m-%d",$month);
		$ngay = strtotime(date("Y-m-d", strtotime($month)) . " +1 day");
		$ngay = strftime("%d/%m",$ngay);
		$ngayky = strtotime(date("Y-m", strtotime($k->thang)) . " +1 day");
		$ngayky = strftime("%d/%m",$ngayky);
			echo $ngay;
			echo "</font>&nbsp&nbspĐến ngày: <font id='dh'>"; 
		$denngay=strtotime($k->thang);
		$denngay = date('d/m', $denngay);
			echo $denngay;
	   echo"</font>";
	?>
				<br><br>
				KH: <font id="dh">{{$k->tenkh}}</font><br>
				ĐC: <font id="dh">{{$k->diachi}}</font><br>
				<br>
				Mã KH: <font id="dh">{{$k->makh}}</font><br>
				<br>
				CSM: <font id="dh">{{$k->cscm}}</font><br>
				CSC: <font id="dh">{{$k->cscu}}</font><br>
				HSN: <font id="dh">1</font><br>
				ĐNTT: <font id="dh">{{$k->tt}}</font><br>
				Tiền chưa thuế: <font id="dh">
<?php
				if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){    
			if($k->tt <= 50){
				echo number_format($k->tt*$dgia,0,",",".");
			} else if($k->tt <= 100){			
				echo number_format((50*$dgia)+(($k->tt-50)*$dgia1),0,",",".");
			} else if($k->tt<=150){ 
				echo number_format((50*$dgia)+(50*$dgia1)+(($k->tt-100)*$dgia2),0,",",".");
			} else if($k->tt <= 200){
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(($k->tt-150)*$dgia3),0,",",".");
			}
			else if($k->tt <= 300){
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(($k->tt-200)*$dgia4),0,",",".");
			}
			else if($k->tt <= 400){
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(($k->tt-300)*$dgia5),0,",",".");		
			} else {
				echo number_format((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(100*$dgia5)+(($k->tt-400)*$dgia6),0,",",".");	
			}
	    }

	    if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){    
			echo number_format($k->tt*$dgia7,0,",",".");
	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		   
			echo number_format($k->tt*$dgia8,0,",",".");
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			
			echo number_format($k->tt*$dgia9,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			
			echo number_format($k->tt*$dgia10,0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			
			echo number_format($k->tt*$dgia11,0,",",".");
		}
		?>
			</font><br>
			Thuế GTGT: <font id="dh">10%</font><br>
			Tiền thuế: <font id="dh">
		<?php
		if($k->tenloai=='điện'&& $k->tenht == 'Sinh hoạt'){    
			if($k->tt <= 50){
				echo number_format(round(($k->tt*$dgia)*0.1),0,",",".");
			} else if($k->tt <= 100){			
				echo number_format(round(((50*$dgia)+(($k->tt-50)*$dgia1))*0.1),0,",",".");
			} else if($k->tt<=150){ 
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(($k->tt-100)*$dgia2))*0.1),0,",",".");
			} else if($k->tt <= 200){
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(($k->tt-150)*$dgia3))*0.1),0,",",".");
			}
			else if($k->tt <= 300){
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(($k->tt-200)*$dgia4))*0.1),0,",",".");
			}
			else if($k->tt <= 400){
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(($k->tt-300)*$dgia5))*0.1),0,",",".");		
			} else {
				echo number_format(round(((50*$dgia)+(50*$dgia1)+(50*$dgia2)+(50*$dgia3)+(100*$dgia4)+(100*$dgia5)+(($k->tt-400)*$dgia6))*0.1),0,",",".");	
			}
	    }

	    if($k->tenloai=='điện'&& $k->tenht == 'Sản xuất'){    
			echo number_format(round($k->tt*$dgia7*0.1),0,",",".");
	    }
	    if($k->tenloai=='điện'&& $k->tenht == 'Kinh doanh'){
		   
			echo number_format(round($k->tt*$dgia8*0.1),0,",",".");
	    } 
	    if($k->tenloai == 'nước' && $k->tenht == 'Sinh hoạt'){
			
			echo number_format(round($k->tt*$dgia9*0.1),0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Sản xuất'){
			
			echo number_format(round($k->tt*$dgia10*0.1),0,",",".");
		}
		if($k->tenloai == 'nước' && $k->tenht == 'Kinh doanh' ){
			
			echo number_format(round($k->tt*$dgia11*0.1),0,",",".");
		}
		?>
			</font><br>
			<br>
			<br>
			Tổng tiền: <b><font id="dh">{{$k->thanhtien}}</font></b><br>
			<p class="text-center">Đề nghị khách hàng thanh toán đúng hạn.</p>
			<p class="text-center">Ký tên.</p>
				</div>
			</div>
				@endforeach
	    </div>
	</div>
		
	</body>
</html>