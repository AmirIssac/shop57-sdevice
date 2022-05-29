<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'customer',
        'total_price',
    ];

/*
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
*/

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
