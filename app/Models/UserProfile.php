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
