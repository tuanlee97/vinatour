<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhahangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhahang', function (Blueprint $table) {
            $table->increments('manhahang');
              $table->string('tennhahang');
            $table->double('gia');
            $table->string('hinhanh');
            $table->integer('tinh')->unsigned();
                $table->foreign('tinh')
                      ->references('matinh')
                      ->on('tinh')
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
        Schema::dropIfExists('nhahang');
    }
}
