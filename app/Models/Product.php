<?php

namespace App\Models;

use App\Models\Carrito\Carrito;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\MediaLibraryTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
       'nombre',
       'categoria',
       'descripcion',
       'precio',
       'cantidad',
    ];

    public function carrito():BelongsToMany{
        return $this->belongsToMany(Carrito::class);
    }
}
