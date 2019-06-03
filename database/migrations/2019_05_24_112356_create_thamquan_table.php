<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThamquanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thamquan', function (Blueprint $table) {
            $table->increments('id_thamquan');

               $table->string('ten_thamquan');
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
        Schema::dropIfExists('thamquan');
    }
}
