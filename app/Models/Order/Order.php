<?php

namespace App\Models\Order;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        return $this->hasOne(User::class);
    }

    public function products(): BelongsToMany
    {   
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('cantidad');
    }
}
