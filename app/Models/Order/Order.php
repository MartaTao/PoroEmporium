<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'price',
        'total',
        'status',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(user::class);
    }

    public function product():HasMany{
        return $this->HasMany(Product::class);
    }


}
