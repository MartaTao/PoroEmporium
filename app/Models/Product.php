<?php

namespace App\Models;

use App\Models\Carrito\Carrito;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\MediaLibraryTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function comment(): HasMany
    {
        return $this->hasmany(Comment::class);
    }
}
