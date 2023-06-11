<?php

namespace App\Models\Especifications;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Especification extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'product_id',
        'descripcion',
    ];

    //Media
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products_especifications')
            ->useDisk('products_especifications')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
