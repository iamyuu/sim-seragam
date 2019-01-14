<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'order';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'no_faktur';

    protected $dates = ['order_date'];

    protected $fillable = [
        'student_id', 'uniform_id', 'model',
        'amount_paid', 'grand_total', 'order_date',
    ];

    public function detail()
    {
        return $this->hasMany(DetailOrder::class, 'order_id', 'no_faktur');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function model()
    {
        if ($this->model == 1) {
            return 'Pendek';
        } else {
            return 'Panjang';
        }
    }
}
