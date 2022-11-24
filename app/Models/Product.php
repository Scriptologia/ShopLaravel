<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable, Translatable;

    public $translatedAttributes = ['name', 'description','description_seo', 'title_seo', 'keywords'];

protected $fillable = [
    'category_id', 'slug' ,'prise', 'size', 'ths', 'cbd', 'sku',
    'discount', 'discount_enable','img_main', 'images', 'plant_type', 'effects', 'rating', 'is_published'
];

    protected $casts = [
        'images' => 'array',
        'discount_enable' => 'boolean'
    ];

    protected $searchFields = [
        'name',
        'description',
        'price',
//        'discount'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders ()
    {
        return $this->belongsToMany(Order::class);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = mb_strtolower(Str::slug($this->name, '-'));
    }
}
