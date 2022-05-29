<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'price',
        'image',
    ];

    /*
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    */

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
