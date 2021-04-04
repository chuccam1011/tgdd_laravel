<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

//    public function __construct(array $attributes = [],$context =)
//    {
//        parent::__construct($attributes);
//    }

//    public static function  getAll()
//    {
//        return $this->queryCustom()->where('is_default', '=', 1);
//    }
    public function cam_afters()
    {
        return $this->hasOne(CamAfter::class, 'id', 'category_id');

    }

    public function cam_befors()
    {
        return $this->hasOne(CamBefor::class, 'id', 'category_id');

    }

    public function categories()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function cpu()
    {
        return $this->hasOne(CPU::class, 'id', 'category_id');

    }

    public function ram()
    {
        return $this->hasOne(Ram::class, 'id', 'category_id');

    }

    public function pin()
    {
        return $this->hasOne(Pin::class, 'id', 'category_id');

    }

    public function sim()
    {
        return $this->hasOne(Sim::class, 'id', 'category_id');

    }

    public function memory()
    {
        return $this->hasOne(Memory::class, 'id', 'category_id');

    }

    public function display()
    {
        return $this->hasOne(Display::class, 'id', 'category_id');

    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'category_id');

    }

    public function operators()
    {
        return $this->hasOne(Operator::class, 'id', 'category_id');

    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'product_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');

    }

}
