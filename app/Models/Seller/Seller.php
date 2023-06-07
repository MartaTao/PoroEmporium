<?php

namespace App\Models\Seller;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
    ];

    public function product(): HasMany
    {
        return $this->hasmany(Product::class);
    }
}
