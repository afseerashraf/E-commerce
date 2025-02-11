<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image', 'categorie'];


    protected function orders()
    {
        $this->hasMany(Order::class);
    }
}
