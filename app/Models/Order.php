<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rice_item_id',
        'quantity_kg',
        'total_price',
        'payment_status'
    ];

    // Optional: define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function riceItem()
    {
        return $this->belongsTo(RiceItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

