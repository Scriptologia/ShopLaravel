<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory, SoftDeletes, SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['name', 'slug', 'description'];

    public function permissions ()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = mb_strtolower(Str::slug($this->name, '-'));
    }
}
