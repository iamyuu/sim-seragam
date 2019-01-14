<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->string('no_faktur')->unique();
            $table->string('student_id');
            $table->enum('model', [1, 2])->comment('1 = short, 2 = long');
            $table->string('amount_paid');
            $table->string('grand_total');
            $table->string('refund');
            $table->timestampTz('order_date')->useCurrent();
            // $table->timestampsTz();

            // $table->foreign('student_id')->references('id')
            //        ->on('students')->onDelete('cascade');
            // $table->foreign('uniform_id')->references('id')
            //        ->on('uniforms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
