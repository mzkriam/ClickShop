<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['name', 'description', 'parent_id', 'status'];
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
