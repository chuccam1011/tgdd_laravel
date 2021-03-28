<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProduct extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasOne('products','id');
    }
}
