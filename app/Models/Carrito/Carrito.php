<?php

namespace App\Models\Carrito;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\models\Product;
use App\models\User;

class Carrito extends Model
{
    protected $table = 'carrito';

    use HasFactory;

    protected $fillable=['producto','cantidad','total'];

    public function cliente():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function producto():HasMany{
        return $this->HasMany(Product::class);
    }

        
}
