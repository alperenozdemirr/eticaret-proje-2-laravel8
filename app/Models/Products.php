<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsTo(Categories::class,'category');
    }
    public function baskets(){
        return $this->hasMany(Baskets::class,'id');
    }
    public function images(){
        return $this->belongsTo(ProductImages::class);
    }
}
