<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('no_daftar')->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', [1, 2])->comment('1 = male, 2 = female');
            // $table->string('no_hp')->default(0);
            $table->enum('agama', [1, 2, 3, 4, 5])->comment('1 = Islam, 2 = Kristen, 3 = Katolik, 4 = Hindu, 5 = Budha');
            $table->string('asal_smp');
            // $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
