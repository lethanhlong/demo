<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Gioithieus extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gioithieus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('tieude');
            $table->date('ngaydang');
            $table->text('noidung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gioithieus');
    }

}
