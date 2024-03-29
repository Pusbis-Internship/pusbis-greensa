<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
