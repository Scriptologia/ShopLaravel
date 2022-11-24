<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $searchFields = [
        'amount', 'payment_status', 'delivery_status', 'payment_method', 'created_at', 'country',  'deleted_at'
    ];

    protected $fillable = ['user_id', 'amount', 'payment_status', 'delivery_status', 'payment_method', 'country'];

    protected $casts = [
        'delivery_status' => 'integer',
        'payment_status' => 'integer',
        'created_at' => 'string',
        'deleted_at' => 'string',
    ];

    public static $deliveryStatus = [
        0 => "Pending",
        1 => "Inprogress",
        2 => "Pickups",
        3 => "Delivered",
        4 => "Cancelled",
        5 => "Returns"
    ];

    public static $paymentStatus = [
        0 => "unpaid",
        1 => "paid",
        2 => "refund",
        3 => "chargeback"
    ];

    public static $paymentMethod = [
        0 => "Mastercard",
        1 => "Visa",
        2 => "COD",
        3 => "Paypal"
    ];

    public function user (){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function products (){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function getPaymentStatusAttribute($value)
    {
        return Order::$paymentStatus[$value];
    }

    public function setPaymentStatusAttribute($value)
    {
        $this->attributes['payment_status'] = $value * 1;
    }

    public function getDeliveryStatusAttribute($value)
    {
        return Order::$deliveryStatus[$value];
    }

    public function setDeliveryStatusAttribute($value)
    {
        $this->attributes['delivery_status'] = $value * 1;
    }
}
