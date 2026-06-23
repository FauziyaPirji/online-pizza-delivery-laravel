<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'orderId';
    use HasFactory;

    protected $fillable = [
        'userId',
        'address',
        'zipCode',
        'phoneNo',
        'amount',
        'paymentMode',
        'orderStatus',
        'OrderDate'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'orderId', 'orderId');
    }
}
