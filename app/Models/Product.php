<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\MediaLibraryTrait;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
       'nombre',
       'descripcion',
       'precio',
       'cantidad',
    ];
}
