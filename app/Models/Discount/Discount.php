<?php

namespace App\Models\Discount;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
       'descuento',
       'precio',
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
