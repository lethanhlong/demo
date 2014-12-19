<?php
class Hopdong extends Eloquent {
	protected $table = 'hopdongs';
	public static function save_hopdong($tenloai, $tenht,$makh, $tenkh, $cmt){
		$hop=new Hopdong();
		$hop->tenloai = $tenloai;
		$hop->tenht = $tenht;
		$hop->tenkh = $tenkh;
		$hop->makh	= $makh;
		$hop->cmt = $cmt;
		$hop->ngayky = date('Y-m-d');
		$hop->save();

	}
}