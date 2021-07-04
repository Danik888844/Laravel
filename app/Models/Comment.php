<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'content'
    ];

    protected $with = [
      'user'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function ccdcarshops(){
        return $this->belongsTo(ccdCarShop::class);
    }
}
