<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukuran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->integer('uniform_id');
            $table->string('size');
            // $table->timestampsTz();

            // $table->foreign('student_id')->references('id')
            //       ->on('students')->onDelete('cascade');
            // $table->foreign('uniform_id')->references('id')
            //       ->on('uniforms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ukuran');
    }
}
