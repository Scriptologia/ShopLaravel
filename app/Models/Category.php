<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Translatable;


class Category extends Model
{
    use HasFactory, SoftDeletes, Searchable, Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $searchFields = [
         'name', 'slug', 'description'
    ];

    protected $fillable = [ 'slug', 'img'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = mb_strtolower(Str::slug($this->name, '-'));
    }
}
