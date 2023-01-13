<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table="order_details";
    public function product()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    public function images(){
        return $this->hasMany(ProductImages::class,'product_id','product_id');
    }
}
