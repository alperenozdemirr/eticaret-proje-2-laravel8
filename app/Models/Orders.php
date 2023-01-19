<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function details(){
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
    public function products()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    public function images(){
        return $this->hasMany(ProductImages::class,'product_id','product_id');
    }
    public function cities(){
        return $this->hasOne(Cities::class,'city');
    }
}
