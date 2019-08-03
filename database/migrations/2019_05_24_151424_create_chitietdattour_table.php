<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdattourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdattour', function (Blueprint $table) {
            $table->increments('ma_ctt');
            $table->integer('madattour')->unsigned();
              $table->foreign('madattour')
                      ->references('madattour')
                      ->on('dattour')
                      ->onDelete('cascade');
             $table->string('tendichvu');
             $table->double('giadichvu');
             $table->double('tonggia');
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
        Schema::dropIfExists('chitietdattour');
    }
}
