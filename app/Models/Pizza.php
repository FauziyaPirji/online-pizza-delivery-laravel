<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'pizzaId';
    protected $fillable = ['pizzaName', 'pizzaPrice', 'pizzaDesc', 'pizzaCategorieId', 'pizzaPhoto', 'pizzaPubliceDate'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'pizzaCategorieId');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'pizzaId');
    }
}
