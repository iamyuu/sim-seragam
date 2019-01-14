<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->unsignedInteger('uniform_id');
            $table->unsignedInteger('size_id');
            $table->integer('qty')->default(1);
            $table->string('total');
            // $table->timestampsTz();

            // $table->foreign('order_id')->references('id')
            //       ->on('order')->onDelete('cascade');
            // $table->foreign('uniform_id')->references('id')
            //       ->on('seragam')->onDelete('cascade');
            // $table->foreign('size_id')->references('id')
            //       ->on('ukuran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_order');
    }
}
