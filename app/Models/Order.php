<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'date'];

    protected function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
