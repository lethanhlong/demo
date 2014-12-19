<?php
class Tieuthu extends Eloquent {
	protected $table = 'tieuthus';
	public static function save_tt($socongto, $thang){
		$tieuthu = new Tieuthu();
		$tieuthu->socongto = $socongto;
		$tieuthu->thang = $thang;
		$tieuthu->save();
	}
}