<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiadanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diadanh', function (Blueprint $table) {
            $table->increments('id');
             $table->string('tendiadanh');
             $table->double('gia');
              $table->text('noidung');
               $table->string('hinhanh');
               $table->integer('tinh')->unsigned();

                $table->foreign('tinh')
                      ->references('id')
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
        Schema::dropIfExists('diadanh');
    }
}
