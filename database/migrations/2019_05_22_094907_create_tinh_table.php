<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinh', function (Blueprint $table) {
            $table->increments('matinh');

            $table->string('tentinh');
              $table->integer('quocgia')->unsigned();

                $table->foreign('quocgia')
                      ->references('maquocgia')
                      ->on('quocgia')
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
        Schema::dropIfExists('tinh');
    }
}
