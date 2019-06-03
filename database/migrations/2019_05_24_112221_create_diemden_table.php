<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diemden', function (Blueprint $table) {
            $table->increments('id_diemden');
            $table->string('tendiemden');
                  $table->integer('matour')->unsigned();

                $table->foreign('matour')
                      ->references('matour')
                      ->on('tour')
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
        Schema::dropIfExists('diemden');
    }
}
