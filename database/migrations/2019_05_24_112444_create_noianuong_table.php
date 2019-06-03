<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoianuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noianuong', function (Blueprint $table) {
            $table->increments('id_noianuong');
               $table->string('ten_noianuong');
               $table->double('gia');
               $table->integer('khuvuc')->unsigned();

                $table->foreign('khuvuc')
                      ->references('id_diemden')
                      ->on('diemden')
                      ->onDelete('cascade');
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
        Schema::dropIfExists('noianuong');
    }
}
