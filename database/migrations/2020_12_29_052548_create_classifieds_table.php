<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifieds', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('tittle',128);
            $table->string('body',6000);
            $table->string('img',200);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
           ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classifieds');
    }
}
