<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDattourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dattour', function (Blueprint $table) {
            $table->increments('madattour');

            $table->double('tonggia');
             $table->integer('makh')->unsigned();

                $table->foreign('makh')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
            $table->datetime('ngaydat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dattour');
    }
}
