<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function mainCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }
    public function products(){
        return $this->hasMany(Products::class,'category','id');
    }//laptop,cep telefonu hatalı
}
