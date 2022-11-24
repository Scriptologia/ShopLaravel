<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Searchable;

    protected $searchFields = [
        'email', 'name', 'phone', 'deleted_at', 'created_at',  'surname', 'status',  'email_verified_at',  'country'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'role_id',
        'email',
        'password',
        'avatar',
        "phone",
        "status",
        "country",
        "shipping_info",
         'updated_at',
         'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'string',
        'created_at' => 'string',
        'deleted_at' => 'string',
        'status' => 'boolean',
        "shipping_info" => 'object'
    ];

    public $statusArr = [
        0 => "Block",
        1 => "Active"
    ];

    public function getStatusAttribute($value)
    {
        return $this->statusArr[$value];
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = array_search($value, $this->statusArr);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
