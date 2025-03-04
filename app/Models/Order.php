<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = ['customer_id', 'product_id', 'date', 'name', 'phone', 'address'];


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }    

    public function product() 
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

  
}
