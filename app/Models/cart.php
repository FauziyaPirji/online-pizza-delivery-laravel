<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'view_cart';
    protected $primaryKey = 'cartItemId';
    
    protected $fillable = [
        'pizzaId',
        'itemQuantity',
        'userId',
    ];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizzaId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
