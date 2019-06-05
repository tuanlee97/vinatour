<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachsanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachsan', function (Blueprint $table) {
            $table->increments('makhachsan');
             $table->string('tenkhachsan');
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
        Schema::dropIfExists('khachsan');
    }
}
