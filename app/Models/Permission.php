<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory, SoftDeletes, SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['model', 'slug', 'description'];

    public static $permissionArr = [
        'view-all', 'view', 'edit', 'create', 'delete' , 'restore'
    ];

    public function roles ()
    {
        return $this->belongsToMany(Role::class);
    }

    public function setModelAttribute($value)
    {
        $this->attributes['model'] = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = mb_strtolower($value);
    }
}
