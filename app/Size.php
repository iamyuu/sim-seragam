<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $table = 'ukuran';
    public $timestamps = false;
    protected $fillable = [
        'student_id', 'uniform_id', 'size',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function uniform()
    {
    	return $this->belongsTo(Uniform::class);
    }
}
