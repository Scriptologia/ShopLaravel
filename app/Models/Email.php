<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    public $fillable = ['email', 'user_id', 'subscribed', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'created_at' => 'string',
        'deleted_at' => 'string',
        'subscribed' => 'boolean',
        ];

    protected $searchFields = [
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
