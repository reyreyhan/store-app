<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'phone', 'address', 'product_id', 'invoice', 'total', 'quantity'
    ];

    public function product() {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
