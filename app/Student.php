<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'siswa';
    public $timestamps = false;
    public $incrementing = false;
	protected $primaryKey = 'no_daftar';
    protected $fillable = [
        'no_daftar', 'nama_lengkap', 'jenis_kelamin', 'agama', 'asal_smp',
    ];

    public function gender()
    {
    	if ($this->jenis_kelamin == 1) {
    	   return 'Laki - laki';
    	} else {
            return 'Perempuan';
    	}
    }

    public function religion()
    {
        if ($this->agama == 1) {
            return 'Islam';
        } elseif ($this->agama == 2) {
            return 'Kristen';
        } elseif ($this->agama == 3) {
            return 'Katolik';
        } elseif ($this->agama == 4) {
            return 'Hindu';
        } else {
            return 'Budha';
        }
    }
}
