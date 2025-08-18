<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Store extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'whatsapp',
        'address',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productCount(): int
    {
        return $this->products()->count();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('store_images')
            ->useFallbackUrl(asset('assets/images/placeholder.jpeg'))
            ->singleFile();
    }
}
