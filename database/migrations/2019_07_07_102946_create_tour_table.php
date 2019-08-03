<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
          $table->increments('id');
          $table->boolean('in_out');
          $table->string('tentour');
          $table->integer('songay');
          $table->integer('sodem');
          $table->string('diemxuatphat');
          $table->text('noidung');
          $table->string('hinhanh');
          $table->integer('review');
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
        Schema::dropIfExists('tour');
    }
}
