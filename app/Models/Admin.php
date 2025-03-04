<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'image'];



    protected function casts(): array
    {
        return [
           
            'password' => 'hashed',
        ];
    }
}
