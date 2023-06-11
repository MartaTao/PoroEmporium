<?php

namespace App\Models\Especifications;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Especifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'descripcion',
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
