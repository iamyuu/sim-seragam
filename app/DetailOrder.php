<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    public $table = 'detail_order';
    public $timestamps = false;
    
    protected $fillable = [
        'order_id', 'uniform_id', 'size_id', 'qty', 'total',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'no_faktur');
    }

    public function uniform()
    {
    	return $this->belongsTo(Uniform::class);
    }

    public function size()
    {
    	return $this->belongsTo(Size::class);
    }
}
