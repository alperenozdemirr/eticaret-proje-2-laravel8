<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baskets extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    public function images(){
        return $this->hasMany(ProductImages::class,'product_id','product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function basketCount(){
        return $this->hasMany(Baskets::class,'user_id');
    }

}
