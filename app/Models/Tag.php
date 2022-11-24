<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
{
    use HasFactory, SoftDeletes, Searchable, Translatable;

    public $translatedAttributes = ['name'];

    protected $searchFields = [
        'name', 'slug'
    ];

    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = mb_strtolower(Str::slug($this->name, '-'));
    }
}
