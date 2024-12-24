<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_surname',
        'second_surname',
        'adress',
        'birthdate',
        'mobile',
    ];

    //Relacion con usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //Media
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users_avatar')
            ->singleFile()
            ->useDisk('users_avatar')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }
}
