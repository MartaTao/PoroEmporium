<?php

namespace App\Models;

use App\Models\Carrito\Carrito;
use App\Models\Especifications\Especification;
use App\Models\Especifications\Especifications;
use App\Models\Order\Order;
use App\Models\Seller\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\MediaLibraryTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'seller_id',
       'nombre',
       'categoria',
       'descripcion',
       'precio',
       'cantidad',
    ];

    //Media
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products_avatar')
            ->singleFile()
            ->useDisk('products_avatar')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);

            $this->addMediaCollection('products_images')
            ->useDisk('products_images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }
    //Relacion con comentarios y valoración
    public function comment(): HasMany
    {
        return $this->hasmany(Comment::class);
    }
//Relación con el proveedor
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    //Relación con los pedidos
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
    }
     //Relacion con especificacioens
     public function especificaciones(): HasMany
     {
         return $this->hasmany(Especification::class);
     }
}
