<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function cam_afters()
    {
        return $this->hasOne(CamAfter::class, 'product_id');
    }

    public function cam_befors()
    {
        return $this->hasOne(CamBefor::class, 'product_id');
    }

    public function categories()
    {
        return $this->hasOne(Categories::class, 'product_id');
    }

    public function cpu()
    {
        return $this->hasOne(CPU::class, 'product_id');
    }

    public function ram()
    {
        return $this->hasOne(Ram::class, 'product_id');
    }

    public function pin()
    {
        return $this->hasOne(Pin::class, 'product_id');
    }

    public function sim()
    {
        return $this->hasOne(Sim::class, 'product_id');
    }

    public function memory()
    {
        return $this->hasOne(Memory::class, 'product_id');
    }

    public function display()
    {
        return $this->hasOne(Display::class, 'product_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'product_id');
    }

    public function opera()
    {
        return $this->hasOne(Operator::class, 'product_id');
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
