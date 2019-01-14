<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uniform extends Model
{
    public $table = 'seragam';
	public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'status',
    ];

    public function status()
    {
    	if ($this->status == 1) {
    		return 'Laki-laki';
    	} elseif ($this->status == 2) {
    		return 'Perempuan';
    	} else {
    		return 'Umum';
    	}
    }
}
