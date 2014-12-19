<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
		return "long";
	}
	public function getHome()
	{
		
		return View::make('home/home');
	}
	public function getGioithieu()
	{
		$gioithieus = Gioithieu::all();
		return View::make('home/gioithieu')->with('gioithieus', $gioithieus);
	}
	public function getLienhe()
	{
		return View::make('home/lienhe');
	}
	public function getTintuc()

	{
		$tintucs = DB::table('tintucs') ->where('chuyenmuctt','=', 'sukien')
										->orderBy('id', 'asc')
										->take(5) 
										->get();
		return View::make('home/tintuc')->with('tintucs', $tintucs);
	}
	public function getTin($id)
	{
		$tintucs = DB::table('tintucs')->where('id', $id)->get();	
		return View::make('home/tin')->with('tintucs', $tintucs);
	}
	public function getAntoandien()

	{
		$tintucs = DB::table('tintucs') ->where('chuyenmuctt','=', 'antoandien')
										->orderBy('id', 'asc')
										->take(5) 
										->get();
										// take(5) lấy thông tin từ trong khoang 1 den 5. desc sắp xếp giảm dần.
		return View::make('home/antoandien')->with('tintucs', $tintucs);
	}
	public function getTinnganhdien()

	{
		$tintucs = DB::table('tintucs') ->where('chuyenmuctt','=', 'tindien')
										->orderBy('id', 'asc')
										->take(5) 
										->get();
										// take(5) lấy thông tin từ trong khoang 1 den 5. desc sắp xếp giảm dần.
		return View::make('home/tinnganhdien')->with('tintucs', $tintucs);
	}

	// public function getGiadien1()
	// {
	// 	return View::make('giadien/gia');
	// }


	public function getGiadien()

	{
		$cogias = DB::table('cogias') ->join('dongias','cogias.stt','=','dongias.stt')
									 ->get();
		return View::make('home/gia/giadien')->with('cogias', $cogias);
	}
	public function getGianuoc()

	{
		$cogias = DB::table('cogias')
									 ->join('dongias','cogias.stt','=','dongias.stt') 
									 ->get();
		return View::make('home/gia/gianuoc')->with('cogias', $cogias);
	}


	public function getLichcupdien()
	{
		return View::make('home/lichcupdien/lichcupdien');
	}
	public function getDangkymuadien()
	{
		return View::make('home/hopdong/hopdong');
	}
	public function postDangkymuadien()

	{
		$rules = array(
			'tenloai'	=> 'required',
			'tenkh' 	=> 'required|regex:/^[^0-9]+$/',
			'ngaysinh'	=> 'required',
			'cmt'		=> 'required',
			'email'		=> 'required|email',
			'sdt'		=>'required|regex:/^0\d{9,10}$/',
			
				);
		$messages = array(
			'tenloai.required'	=> 'Phải nhập loại đăng ký',
    		'tenkh.required' 	=> 'Nhập vào tên khách hàng',
    		'tenkh.regex'		=> 'Tên khách hàng không chứa ký tự số',
    		
    		'sdt.regex'			=> 'Vui lòng nhập lại số điện thoại'
			);
		$validator = Validator::make(Input::all(),$rules, $messages);
		
		if($validator->fails()){
			return Redirect::to('home/dangkymuadien')
					->withErrors($validator)
					->withInput();
		} else {
			$makh = DB::table('khachhangs')->max('makh');
			$makh = $makh + 1 ;
		Hopdong::save_hopdong(Input::get('tenloai'),Input::get('tenht'),$makh,Input::get('tenkh'),Input::get('cmt'));
		
		$khach = new Khachhang();
			$khach->makh=$makh;
			$khach->tenkh = Input::get('tenkh');
			$khach->ngaysinh = Input::get('ngaysinh');
			$khach->trinhdo = Input::get('trinhdo');
			$khach->diachi = Input::get('diachi');
			$khach->chucvu = Input::get('chucvu');
			$khach->sodt_kh = Input::get('sdt');
			$khach->cmt = Input::get('cmt');
			$khach->ngaycap =Input::get('ngaycap');
			$khach->noicap = Input::get('noicap');
			$khach->email =Input::get('email');

			$khach->save();

		return Redirect::to('home/dangkymuadien')
						->with('global','Đăng ký thành công');
		}
	}
	public function getTracuudangky()
	{
		return View::make('home/hopdong/tracuudangky');
	}
	
	public function postTracuudangky()
	{
		$dks = DB::table('hopdongs')->where('cmt', Input::get('cmt'))->pluck('tinhtrang');
		if ($dks == null) {
			return Redirect::to('home/tracuudangky')->with('global','Số chứng minh không có trong dữ liệu, vui lòng kiểm tra lại');
		}
		
		return Redirect::to('home/tracuudangky')->with('global',$dks);
	}
	public function getDangkygiaybao()
	{

		return View::make('home/hopdong/dkgiaybao');
	}
	public function postDangkygiaybao()
	{
		if(Input::get('email')==null){
			return View::make('home/hopdong/dkgiaybao')->with('global','lỗi');
		} else{
		return View::make('home/hopdong/dkgiaybao')->with('global','Đăng ký thành công');
		}
	}

	public function getTracuunokh()
	{
		
		return View::make('home/tracuu/tracuunokh');

	}
	public function postTracuunokh()
	{
		 $makh = Input::get('param1');
		 $tuthang = Input::get('param2');
		$denthang = Input::get('param3');

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
            $join->on('hoadons.socongto', '=', 'tieuthus.socongto');
        })
						         ->where('khachhangs.makh', $makh)
						        // ->where('hoadons.thang','<',$tuthang)
						         // ->where('hoadons.thang','<',$n_date)
						         ->orderBy('hoadons.thang', 'desc')
								->take(1)  
								->get();
								$date=strtotime($tuthang);
							 	$date = date('m', $date);

							 	$da=strtotime($denthang);
							 	$da = date('m', $da);
				foreach ($hoadon as $k) 			 	
			echo "<div class='row'>
					<div class='col-md-6 col-md-offset-3 '>
						<h3>Khách hàng: <b>".$k->tenkh."</b><br>".
						"Mã khách hàng: <b>".$k->makh.
						"</b></h3></div></div>";

		$hoadon1 = DB::table('hoadons')
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
		 
						        ->where('khachhangs.makh', $makh)
						        // ->where('hoadons.thang', '=', 'tieuthus.thang')
						         
						        ->orderBy('hoadons.thang', 'asc')
						        ->groupBy('tieuthus.cscm')
						             
						         ->distinct()
						        ->get();
			
										echo"<table class='table table-bordered table-hover' id='lichcup1'>
			<thead>
				<tr id='gianuoc1'>
					<th width='10%'>Tháng</th>
					<th width='10%'>Năm</th>
					<th width='10%' >Tiêu thụ</th>
					<th width='15%' >Số tiền</th>
					<th width='30%' >Trạng thái thanh toán</th>
					<th width='25%'>Gửi thông báo</th>
				</tr>
			</thead>
			<tbody class='text-center'><tr >";

			foreach ($hoadon1 as $h) {

				$date1=strtotime($h->thang);
					$date2 = date('m', $date1);
					$date3 = date('Y',$date1);

				if ($date2 > $date && $date2 <= $da && $h->tt != 0 && $h->tenloai=='điện'){ 
					echo"
					<td>".$date2."</td>
					<td>".$date3."</td>
					<td>".$h->tt."</td>
					<td>".$h->thanhtien."</td>
					<td>";if($h->thuhd==1){echo "Đã thanh toán";}else { echo"Chưa thanh toán";}
					echo"</td>
					<td>Đã gởi</td>
					</tr>";
					}
				}
				echo"</tbody></table>";
				
	}
	public function getTracuuhd()
	{

		return View::make('home/tracuu/tracuuhd');
	}
	public function postTracuuhd()
	{
		$makh = Input::get('param1');
		$tuthang = Input::get('param2');
		$loaict = Input::get('param3');

		$hoadon = DB::table('hoadons')
		->join('hopdongs', function($join)
		 	{
            $join->on('hoadons.socongto', '=', 'hopdongs.socongto');
        })
		 ->join('khachhangs', function($join)
        {
            $join->on('hopdongs.makh', '=', 'khachhangs.makh');
        })
		 ->join('congtos', function($join)
        {
            $join->on('hopdongs.socongto', '=', 'congtos.socongto');
        })
		 ->join('tieuthus', function($join)
        {
            $join->on('hoadons.socongto', '=', 'tieuthus.socongto');
        })
						         ->where('khachhangs.makh', $makh)
						         ->where('hopdongs.tenloai',$loaict)
						         // ->where('hoadons.thang',$tuthang)
						         ->orderBy('hoadons.thang', 'desc')
								// ->take(1)  
								->get();

			$date=strtotime($tuthang);
			$date = date('m', $date);
		foreach ($hoadon as $k)
		 	$date1=strtotime($k->thang);
			$date2 = date('m', $date1);
			if($date2 == $date){
		//Don gia dien
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
	                    <td><font id='dh'>".$k->kyhieu."</font></td>
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
		 
		// if (null !== $fraction && is_numeric($fraction)) {
		// 	$string .= $decimal;
		// 	$words = array();
		// 	foreach (str_split((string) $fraction) as $number) {
		// 		$words[] = $dictionary[$number];
		// 	}
		// 	$string .= implode(' ', $words);
		// }
		return $string;
}
					echo ucfirst(convert_number_to_words($k->thanhtien));

	                echo"&nbspđồng. </font></td>
	                </tr>
	                <tr>
	                	<td colspan='7' class='text-right'><b><p><font id='dh'>Ngày ký: ".$ngayky."<br>
	                	Người ký: Công ty Điện nước Minh Long</font></p></b><br>
	                	</td>
	                </tr>
	                
	            </tbody>
	        </table>
	    </div>

	</div>";}
				
	}


	// kiểm tra chung minh co tồn tại hay chưa
	public function postCheckcmt(){
		if(Hopdong::where('cmt', Input::get('cmt'))->count()>1)
			return "false";
		else
			return "true";
	}


}