<?php

class UserController extends BaseController 
{
	public function getIndex()
	{
		return View::make('hello');
	}
	public function getCnhopdong()
	{
		$hopdong = Hopdong::paginate(10); 
		return View::make('user/cnhopdong')->with('hopdong', $hopdong);
	}

	public function postCnhopdong()
	{
		$t = Input::get("attrib");
		if($t){
			$cto = DB::table('congtos')->max('socongto');
			$ct = new Congto();
			$ct->socongto = $cto + 1;
			$ct->save();
			$ctt=DB::table('congtos')->max('socongto');
			// Hopdong::where('id', $id)->update(array('tinhtrang' => 'Đã xử lý');

			Hopdong::where('hopdongs.id', $t)
	            ->update(array('tinhtrang' => 'Đã xử lý', 'socongto'=>$ctt));
			Tieuthu::save_tt($ctt, date('Y-m-d'));
			return Redirect::to('user/cnhopdong')->with('global','Cập nhật hợp đồng thành công');
		}
		return Redirect::to('user/cnhopdong')->with('global','Cập nhật hợp đồng thất bại');
	}


	public function getGhichisodien()
	{
		$hopdong = Tieuthu::distinct()->groupBy('socongto')->get(); 
		return View::make('user/ghichiso/ghichiso')->with('hopdong', $hopdong);
	}
	public function postGhichisodien(){
		$kh = Input::get('tenkh');
		$scto = Input::get('socongto');
		$csc = Input::get('cscu');
		$csm = Input::get('cscm');
		$tenht = Input::get('tenht');
		$tenloai =Input::get('tenloai');
		if($csm == ''){
			$date = date('Y-m-d');

					$new_date = strtotime ( '-1 month' , strtotime ( $date ) ) ;
					$new_date = date ( 'Y-m-d' , $new_date );

					$n_date = strtotime ( '-4 month' , strtotime ( $date ) ) ;
									$n_date = date ( 'Y-m-d' , $n_date );

				$sott = DB::table('tieuthus')
                     			->select(DB::raw('avg(tt) as tb'))
			                    ->where('socongto','=',$scto)
								->where('thang','<=',$new_date)
								->where('thang','>=',$n_date)
								->groupBy('socongto')
								->get();
				foreach ($sott as $k) {
					$tt = round($k->tb);
					$csm = round($csc + $k->tb);
				}
			// return $tt;
		} else{
			$tt = $csm - $csc;
		}
		if($tenloai == 'điện' && $tenht == 'Sinh hoạt'){
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
								->where ('dongias.chisomin','>','400')
								->pluck('cogias.co_gia');
				
			if($tt > 1 && $tt <=50){
				 $thanhtien = $tt * $dgia;
				 $thanhtien = round($thanhtien  + ($thanhtien * 0.1));

			} else if($tt<=100){			
				$thanhtien = ($tt-50)*$dgia1 + (50*$dgia);
				$thanhtien =  round($thanhtien  + ($thanhtien * 0.1));
				
			} else if($tt<=150){ 
				$thanhtien = ($tt-100)*$dgia2 + (50*$dgia1) + (50*$dgia);
				$thanhtien = round( $thanhtien  + ($thanhtien * 0.1));
				
			} else if($tt<=200){
				$thanhtien = ($tt-150)*$dgia3 + (50*$dgia2) + (50*$dgia1) + (50*$dgia);
				$thanhtien =round( $thanhtien  + ($thanhtien * 0.1));
				
			}
			else if($tt<=300){
				$thanhtien = ($tt-200)*$dgia4 + (50*$dgia3) + (50*$dgia2) + (50*$dgia1) + (50*$dgia);
				$thanhtien = round( $thanhtien  + ($thanhtien * 0.1));
				
			}
			else if($tt<=400){
				$thanhtien = ($tt-300)*$dgia5 + (100*$dgia4) + (50*$dgia3) + (50*$dgia2) + (50*$dgia1) + (50*$dgia);
				$thanhtien = round( $thanhtien  + ($thanhtien * 0.1));
				
			} else {
				$thanhtien = ($tt-400)*$dgia6 + (100*$dgia5) + (100*$dgia4) + (50*$dgia3) + (50*$dgia2) + (50*$dgia1) + (50*$dgia);
				$thanhtien = round( $thanhtien  + ($thanhtien * 0.1));

			}
		}
		if($tenloai == 'điện' && $tenht == 'Sản xuất' && $tt >= 1){
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
								// ->where ('dongias.chisomin','>','400')
								->pluck('cogias.co_gia');

			$thanhtien = $tt * $dgia;
			$thanhtien = round($thanhtien  + ($thanhtien * 0.1));

		}
		if($tenloai == 'điện' && $tenht == 'Kinh doanh' && $tt >= 1){
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
								
								->pluck('cogias.co_gia');

			$thanhtien = $tt * $dgia;
			$thanhtien = round($thanhtien  + ($thanhtien * 0.1));
			
		}

		if($thanhtien){
				$tieuthu = new Tieuthu();
				$tieuthu->socongto = $scto;
				$tieuthu->thang = date('Y-m-d');
				$tieuthu->cscu = $csc;
				$tieuthu->cscm = $csm;
				$tieuthu->tt = $tt;
				$tieuthu->save();
				if($tieuthu){
					$date = date('Y-m-d');

					$new_date = strtotime ( '-1 month' , strtotime ( $date ) ) ;
					$new_date = date ( 'Y-m-d' , $new_date );

					$n_date = strtotime ( '-2 month' , strtotime ( $date ) ) ;
									$n_date = date ( 'Y-m-d' , $n_date );
					Tieuthu::where('tieuthus.socongto', $scto)
							->where('tieuthus.thang','<=',$new_date)
							->where('tieuthus.thang','>',$n_date)
			            	->update(array('ttghi' => 1));

			        $mahd = DB::table('hoadons')->max('stt_hd');
					$mahd = $mahd + 1 ;

			        $hoadon = new Hoadon();
			        $hoadon->stt_hd = $mahd;
					$hoadon->socongto = $scto;
					$hoadon->thang = date('Y-m-d');
					$hoadon->cscu = $csc;
					$hoadon->cscm = $csm;
					$hoadon->thanhtien = $thanhtien;
					$hoadon->save();

				return "<script type='text/javascript'>
							alert('Ghi chỉ số thành công.');
							window.location = '".asset('user/ghichisodien')."';</script>";
				}
			}

		return "<script type='text/javascript'>
							alert('Ghi chỉ số thất bại.');
							window.location = '".asset('user/ghichisodien')."';</script>";

	}

	public function getGhichisonuoc()
	{
		$hopdong = Tieuthu::distinct()->groupBy('socongto')->get(); 
		return View::make('user/ghichiso/ghichisonuoc')->with('hopdong', $hopdong);
	}
	public function postGhichisonuoc(){
		$kh = Input::get('tenkh');
		$scto = Input::get('socongto');
		$csc = Input::get('cscu');
		$csm = Input::get('cscm');
		$tenht = Input::get('tenht');
		$tenloai =Input::get('tenloai');
		if($csm == ''){
			$date = date('Y-m-d');

					$new_date = strtotime ( '-1 month' , strtotime ( $date ) ) ;
					$new_date = date ( 'Y-m-d' , $new_date );

					$n_date = strtotime ( '-4 month' , strtotime ( $date ) ) ;
									$n_date = date ( 'Y-m-d' , $n_date );

				$sott = DB::table('tieuthus')
                     			->select(DB::raw('avg(tt) as tb'))
			                    ->where('socongto','=',$scto)
								->where('thang','<=',$new_date)
								->where('thang','>=',$n_date)
								->groupBy('socongto')
								->get();
				foreach ($sott as $k) {
					$tt = round($k->tb);
					$csm = round($csc + $k->tb);
				}
		} else {
			$tt = $csm - $csc;
		}

		if($tenloai == 'nước' && $tenht == 'Sinh hoạt' && $tt >= 1){
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
								// ->where ('dongias.chisomin','>','400')
								->pluck('cogias.co_gia');

			$thanhtien = $tt * $dgia;
			$thanhtien = round($thanhtien  + ($thanhtien * 0.1));

		}
		if($tenloai == 'nước' && $tenht == 'Sản xuất' && $tt >= 1){
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
								
								->pluck('cogias.co_gia');

			$thanhtien = $tt * $dgia;
			$thanhtien = round($thanhtien  + ($thanhtien * 0.1));
		}
		if($tenloai == 'nước' && $tenht == 'Kinh doanh' && $tt >= 1){
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
								->where('cogias.tenht','=', $tenht)
								->where('cogias.tenloai','=',$tenloai)
								->where('hopdongs.socongto','=',$scto)
								
								->pluck('cogias.co_gia');

			$thanhtien = $tt * $dgia;
			$thanhtien = round($thanhtien  + ($thanhtien * 0.1));
		}
		if($thanhtien){
				$tieuthu = new Tieuthu();
				$tieuthu->socongto = $scto;
				$tieuthu->thang = date('Y-m-d');
				$tieuthu->cscu = $csc;
				$tieuthu->cscm = $csm;
				$tieuthu->tt = $tt;
				$tieuthu->save();
				if($tieuthu){
					$date = date('Y-m-d');

					$new_date = strtotime ( '-1 month' , strtotime ( $date ) ) ;
					$new_date = date ( 'Y-m-d' , $new_date );

					$n_date = strtotime ( '-2 month' , strtotime ( $date ) ) ;
									$n_date = date ( 'Y-m-d' , $n_date );
					Tieuthu::where('tieuthus.socongto', $scto)
							->where('tieuthus.thang','<=',$new_date)
							->where('tieuthus.thang','>',$n_date)
			            	->update(array('ttghi' => 1));

			        $mahd = DB::table('hoadons')->max('stt_hd');
					$mahd = $mahd + 1 ;

			        $hoadon = new Hoadon();
			        $hoadon->stt_hd = $mahd;
					$hoadon->socongto = $scto;
					$hoadon->thang = date('Y-m-d');
					$hoadon->cscu = $csc;
					$hoadon->cscm = $csm;
					$hoadon->thanhtien = $thanhtien;
					$hoadon->save();

				return "<script type='text/javascript'>
							alert('Ghi chỉ số thành công.');
							window.location = '".asset('user/ghichisonuoc')."';</script>";
				}
		}
		return "<script type='text/javascript'>
							alert('Ghi chỉ số thất bại.');
							window.location = '".asset('user/ghichisonuoc')."';</script>";
	}

	public function getLichngatdien()
	{
		$data['lichcupdiens'] = Lichcupdien::orderBy('ngaycupdien', 'desc')->take(10)->get();
		return View::make("user/lichngatdien/lichngatdien",$data);
	}
	public function postLichngatdien()
	{
		$ngaycupdien = Input::get('ngaycupdien');
		$khuvuc = Input::get('khuvuc');
		$thoigian = Input::get('thoigian');
		$phamvi = Input::get('phamvi');
		$lydo = Input::get('lydo');

		$lichngatdien = new Lichcupdien;
		$lichngatdien->ngaycupdien = $ngaycupdien;
		$lichngatdien->khuvuc = $khuvuc;
		$lichngatdien->thoigiancup = $thoigian;
		$lichngatdien->phamvi = $phamvi;
		$lichngatdien->lydocup = $lydo;
		$lichngatdien->save();
		if($lichngatdien){
			return "<script type='text/javascript'>
							alert('Thêm lịch ngắt điện thành công.');
							window.location = '".asset('user/lichngatdien')."';</script>";
		}

		return "<script type='text/javascript'>
							alert('Thêm lịch ngắt điện không thành công.');
							window.location = '".asset('user/lichngatdien')."';</script>";
	}
	public function postSualichngatdien()
	{
		$ngaycupdien = Input::get('suangaycup');
		$khuvuc = Input::get('suakhuvuc');
		$thoigian = Input::get('suathoigian');
		$phamvi = Input::get('suaphamvi');
		$lydo = Input::get('sualydo');

		Lichcupdien::where('ngaycupdien',$ngaycupdien)
					->update(array('khuvuc'=>$khuvuc, 'thoigiancup'=>$thoigian, 'phamvi'=>$phamvi,'lydocup'=>$lydo));
		
			return "<script type='text/javascript'>
							alert('Cập nhật lịch ngắt điện thành công.');
							window.location = '".asset('user/lichngatdien')."';</script>";
	}
	public function postXoalichngatdien()
	{
		$ngaycupdien = Input::get('ngaycupdien_del_');
		DB::table('lichcupdiens')->where('ngaycupdien', $ngaycupdien)->delete();
		return "<script type='text/javascript'>
							alert('Xóa lịch ngắt điện thành công.');
							window.location = '".asset('user/lichngatdien')."';</script>";
	}
	public function getDongiadien()
	{
		$data['cogias'] = DB::table('cogias') ->join('dongias','cogias.stt','=','dongias.stt')
									 ->get();
		return View::make("user/dongia/dongiadien",$data);
	}

	public function postDongiadien()
	{
		$sh1 = Input::get('sh1');
		$sh2 = Input::get('sh2');
		$sh3 = Input::get('sh3');
		$sh4 = Input::get('sh4');
		$sh5 = Input::get('sh5');
		$sh6 = Input::get('sh6');
		$sh7 = Input::get('sh7');
		$sx8 = Input::get('sx8');
		$kd9 = Input::get('kd9');

		$stt1 = DB::table('dongias')
								->where('chisomin','=', 0)
								->where('chisomax','=', 50)
								->pluck('stt');
		$stt2 = DB::table('dongias')
								->where('chisomin','=', 51)
								->where('chisomax','=', 100)
								->pluck('stt');
		$stt3 = DB::table('dongias')
								->where('chisomin','=', 101)
								->where('chisomax','=', 150)
								->pluck('stt');
		$stt4 = DB::table('dongias')
								->where('chisomin','=', 151)
								->where('chisomax','=', 200)
								->pluck('stt');
		$stt5 = DB::table('dongias')
								->where('chisomin','=', 201)
								->where('chisomax','=', 300)
								->pluck('stt');
		$stt6 = DB::table('dongias')
								->where('chisomin','=', 301)
								->where('chisomax','=', 400)
								->pluck('stt');
		$stt7 = DB::table('dongias')
								->where('chisomin','=', 401)
								->pluck('stt');
		
		
		if($sh1 != '' && $sh2 != '' && $sh3 != '' && $sh4 != ''&& $sh5 != '' && $sh6 != '' && $sh7 != '' && $sx8 != '' && $kd9 != ''){
			$ngay = new Ngay();
		    $ngay->ngay = date('Y-m-d');
		    $ngay->save();

		    $mngay = DB::table('ngays')->max('ngay');
			DB::table('cogias')->insert(array(
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt1, 'co_gia'=> $sh1),
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt2, 'co_gia'=> $sh2),
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt3, 'co_gia'=> $sh3),
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt4, 'co_gia'=> $sh4),
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt5, 'co_gia'=> $sh5),
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt6, 'co_gia'=> $sh6),
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> $stt7, 'co_gia'=> $sh7),
			    array('tenht' => 'Sản xuất', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> 2, 'co_gia'=> $sx8),
			    array('tenht' => 'Kinh doanh', 'tenloai' => 'điện', 'ngay'=>$mngay, 'stt'=> 2, 'co_gia'=> $kd9),
			));
			return "<script type='text/javascript'>
							alert('Thêm đơn giá điện thành công.');
							window.location = '".asset('user/dongiadien')."';</script>";
		}
		return "<script type='text/javascript'>
							alert('Thêm đơn giá điện thất bại.');
							window.location = '".asset('user/dongiadien')."';</script>";
	}
	public function getDongianuoc()
	{
		$data['cogias'] = DB::table('cogias') ->join('dongias','cogias.stt','=','dongias.stt')
									 ->get();
		return View::make("user/dongia/dongianuoc",$data);
	}
	public function postDongianuoc()
	{
		$nsh = Input::get('nsh');
		$nsx = Input::get('nsx');
		$nkd = Input::get('nkd');
		if($nsh != '' && $nsx != '' && $nkd != ''){
			$ngay = new Ngay();
		    $ngay->ngay = date('Y-m-d');
		    $ngay->save();

		    $mngay = DB::table('ngays')->max('ngay');
			DB::table('cogias')->insert(array(
			    array('tenht' => 'Sinh hoạt', 'tenloai' => 'nước', 'ngay'=>date('Y-m-d'), 'stt'=> 1, 'co_gia'=> $nsh),
			    array('tenht' => 'Sản xuất', 'tenloai' => 'nước', 'ngay'=>date('Y-m-d'), 'stt'=> 1, 'co_gia'=> $nsx),
			    array('tenht' => 'Kinh doanh', 'tenloai' => 'nước', 'ngay'=>date('Y-m-d'), 'stt'=> 1, 'co_gia'=> $nkd),
			    ));
			return "<script type='text/javascript'>
							alert('Thêm đơn giá nước thành công.');
							window.location = '".asset('user/dongianuoc')."';</script>";
		}
		return "<script type='text/javascript'>
							alert('Thêm đơn giá nước thất bại.');
							window.location = '".asset('user/dongianuoc')."';</script>";
	}

	public function getGhihoadondien()
	{
		$hoadon = Hoadon::distinct()->groupBy('socongto')->get(); 
		return View::make('user/ghino/ghinokh')->with('hoadon', $hoadon);
	}
	public function postGhihoadondien(){
		$t = Input::get("attrib");
		if($t){
			$thanhtien = DB::table('hoadons')->where('stt_hd','=',$t)->pluck('thanhtien');
			Hoadon::where('stt_hd', $t)
	            ->update(array('no' => $thanhtien, 'thuhd'=> 0));
			return "<script type='text/javascript'>
							alert('Ghi nợ thành công.');
							window.location = '".asset('user/ghihoadondien')."';</script>";
		}
		return "<script type='text/javascript'>
							alert('Ghi nợ không thành công.');
							window.location = '".asset('user/ghihoadondien')."';</script>";
	}


	public function getXoanohoadon()
	{
		$hoadon = Hoadon::distinct()->groupBy('socongto')->get(); 
		return View::make('user/ghino/xoanokh')->with('hoadon', $hoadon);
	}
	public function postXoanohoadon(){
		$t = Input::get("attrib");
		if($t){
			$thanhtien = DB::table('hoadons')->where('stt_hd','=',$t)->pluck('thanhtien');
			Hoadon::where('stt_hd', $t)
	            ->update(array('no' => 0, 'thuhd'=> 1));
			return "<script type='text/javascript'>
							alert('Xóa nợ thành công.');
							window.location = '".asset('user/xoanohoadon')."';</script>";
		}
		return "<script type='text/javascript'>
							alert('Xóa nợ không thành công.');
							window.location = '".asset('user/xoanohoadon')."';</script>";
	}

	public function getXemhoadondien($id){
		$thang = DB::table('hoadons')->where('id',$id)->pluck('thang');


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
		->where('tieuthus.thang',$thang)
		->where('hoadons.id','=',$id)
		->distinct()
		->get();

		return View::make('user/ghino/xemhoadondien')->with('hoadon', $hoadon);
	}
	public function getBaocaodoanhthu(){
		return View::make('user/baocao/baocaodthu');
	}
	public function postBaocaodoanhthu(){
		$loai = Input::get('param1');
		$tuthang = Input::get('param2');
		$denthang = Input::get('param3');
		$date=strtotime($tuthang);
			$date = date('m', $date);

		$da=strtotime($denthang);
		$da = date('m', $da);

		$hoadon = DB::table('hoadons')
		->join('hopdongs', function($join)
		 	{
            $join->on('hoadons.socongto', '=', 'hopdongs.socongto');
        })
  //       ->where('hoadons.thang','>=',$tuthang)
		// ->where('hoadons.thang','<=',$denthang)
		->where('hopdongs.tenloai','=',$loai)
		->sum('hoadons.thanhtien');
		
		echo"<table class='table table-bordered table-hover' id='lichcup1'>
			<thead>
				<tr id='gianuoc1'>
					<th width='70%'>Tổng doanh thu của hóa đơn tiền ".$loai.": &nbsp </th>
					<th width='30%'>Số tiền</th>
				</tr>
			</thead>
			<tbody class='text-center'><tr >
			<td> Doanh thu</td>
			<td>".$hoadon."</td>
			</tr>
			</tbody>
			</table>";

		echo "<div id='xembc'>
		<div class='row'>
			<form action=''  accept-charset='utf-8'>
				<h1>Tổng doanh thu của hóa đơn tiền ".$loai.": &nbsp";
				echo $hoadon;
				echo "

			</form>
			
		</div>
	</div>";
	}
	public function getBaocaonohdon(){
		return View::make('user/baocao/baocaonohd');
	}
	public function postBaocaonohdon(){
		$loai = Input::get('param1');
		$tuthang = Input::get('param2');
		$denthang = Input::get('param3');
		$date=strtotime($tuthang);
			$date = date('m', $date);

		$da=strtotime($denthang);
		$da = date('m', $da);

		$hoadon = DB::table('hoadons')
		->join('hopdongs', function($join)
		 	{
            $join->on('hoadons.socongto', '=', 'hopdongs.socongto');
        })
        ->where('hoadons.thang','>=',$tuthang)
		->where('hoadons.thang','<=',$denthang)
		->where('hopdongs.tenloai','=',$loai)
		->sum('hoadons.no');
		
		echo"<table class='table table-bordered table-hover' id='lichcup1'>
			<thead>
				<tr id='gianuoc1'>
					<th width='70%'>Tổng nợ của hóa đơn tiền ".$loai.": &nbsp </th>
					<th width='30%'>Số tiền</th>
				</tr>
			</thead>
			<tbody class='text-center'><tr >
			<td> Cần thu</td>
			<td>".$hoadon."</td>
			</tr>
			</tbody>
			</table>";

		echo "<div id='xembc'>
		<div class='row'>
			<form action=''  accept-charset='utf-8'>
				<h1>Tổng doanh thu của hóa đơn tiền ".$loai.": &nbsp";
				echo $hoadon;
				echo "

			</form>
			
		</div>
	</div>";
	}

}


