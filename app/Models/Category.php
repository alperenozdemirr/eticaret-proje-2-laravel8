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
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }
}
