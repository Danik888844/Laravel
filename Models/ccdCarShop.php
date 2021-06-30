<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ccdCarShop extends Model
{
    protected $fillable =[
        'carName','price','tax','maxSpeed'
    ];
}
