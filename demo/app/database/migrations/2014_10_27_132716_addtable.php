<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Addtable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
               
        //////////////////////////////////////////////////////////////
        
        Schema::create('taikhoans', function(Blueprint $table) {
            $table->increments('id');
             $table->string('taikhoan', 30)->unique();
            $table->string('matkhau', 255);
            $table->timestamps();
        });
        Schema::create('khachhangs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('makh')->unique();
            $table->string('tenkh', 30);
            $table->date('ngaysinh');
            $table->string('trinhdo', 30)->nullable();
            $table->string('diachi', 255)->nullable();
            $table->string('chucvu', 30)->nullable();
            $table->string('sodt_kh', 11)->nullable();
            $table->string('cmt', 9)->nullable();
            $table->date('ngaycap')->nullable();
            $table->string('noicap', 60)->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamps();
            
        });
        Schema::create('nhanviens', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('manv', 7)->unique();
            $table->string('taikhoan', 30);
            $table->string('hotennv', 30);
            $table->string('diachinv', 255);
            $table->string('sodt_nv', 11);
            $table->timestamps();
            
        });
        Schema::create('tt_taikhoans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('taikhoan', 30);
            $table->integer('makh');
            $table->string('cauhoi', 150)->nullable();
            $table->string('traloi', 50)->nullable();
            $table->timestamps();
            $table->foreign('taikhoan_id')
                  ->references('id')->on('taikhoans');
             $table->foreign('khachhang_id')
                  ->references('id')->on('khachhangs')
                  ->onDelete('cascade');
              $table->foreign('nhanvien_id')
                  ->references('id')->on('nhanviens');
        });
        
       Schema::create('ngays', function(Blueprint $table)
        {
            $table->increments('id');
            $table->date('ngay')->unique();
            $table->timestamps();
        });
       Schema::create('dongias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('stt')->unique();
            $table->integer('chisomin');
            $table->integer('chisomax');
            $table->timestamps();
        });
        Schema::create('loaihinhthucs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('tenloai')->unique();
            $table->timestamps();
        });
        Schema::create('htsds', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('tenht')->unique();
            $table->string('tenloai');
            $table->timestamps();
        });
        Schema::create('cogias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('tenht')->unique();
            $table->date('ngay')->unique();
            $table->integer('stt')->unique();
            $table->integer('co_gia');
            $table->timestamps();
            $table->foreign('ngay_id')
                  ->references('id')->on('ngays');
             $table->foreign('htst_id')
                  ->references('id')->on('htsds');
              $table->foreign('dongia_id')
                  ->references('id')->on('dongias');
        });
///////////////////////////////////////////////////////////////////////////////
         Schema::create('thangs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->date('thang')->unique();
            $table->timestamps();
        });
         Schema::create('ht_congtos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->smallInteger('kyhieu')->unique();
             $table->string('hesonhan');
            $table->timestamps();
        });
         Schema::create('congtos', function(Blueprint $table)
        {
            $table->increments('id');
             $table->integer('socongto')->unique();
            $table->smallInteger('kyhieu')->unique();
             $table->string('hangsanxuat')->nullable();
            $table->timestamps();
            $table->foreign('ht_congto_id')
                  ->references('id')->on('ht_congtos');
        });
          Schema::create('tieuthus', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('socongto')->unique();
            // $table->smallInteger('kyhieu')->unique();
            $table->date('thang')->unique();
            $table->string('hotennv', 30);
            $table->smallInteger('cscu');
            $table->smallInteger('cscm');
            $table->timestamps();
             $table->foreign('congto_id')
                  ->references('id')->on('congtos');
             $table->foreign('thang_id')
                  ->references('id')->on('thangs');
             $table->foreign('nhanvien_id')
                  ->references('id')->on('nhanviens');
        });
        Schema::create('hoadons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('stt_hd')->unique();
            $table->integer('socongto');
            // $table->smallInteger('kyhieu')->unique();
            $table->date('thang')->unique();
            $table->string('hotennv', 30);
            $table->smallInteger('cscu');
            $table->smallInteger('cscm');
            $table->float('thanhtien');
            $table->float('no');
            $table->smallInteger('thuegtgt');
            $table->timestamps();
            $table->foreign('tieuthu_id')
                  ->references('id')->on('tieuthus');
            $table->foreign('nhanvien_id')
                  ->references('id')->on('nhanviens');
        });
        Schema::create('hopdongs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('stt_hd')->unique();
            $table->string('tenloai');
            $table->string('tenht');
            $table->integer('socongto');
            $table->string('tenkh', 30);
            // $table->smallInteger('kyhieu')->unique();
            $table->date('ngayky');
            $table->text('noidung');
            $table->timestamps();
            $table->foreign('congto_id')
                  ->references('id')->on('congtos');
             $table->foreign('htsd_id')
                  ->references('id')->on('htsds');
             $table->foreign('khachhang_id')
                  ->references('id')->on('khachhangs');
            $table->foreign('hoadon_id')
                  ->references('id')->on('hoadons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
            

    }

}
