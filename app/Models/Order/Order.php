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
        'status',
    ];

    public function cliente(): HasOne
    {
        return $this->hasOne(cliente::class);
    }

    public function producto():HasMany{
        return $this->HasMany(Product::class);
    }


}
