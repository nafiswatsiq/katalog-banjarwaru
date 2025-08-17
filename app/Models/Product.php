<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    protected $fillable = [
        'store_id',
        'name',
        'slug',
        'description',
        'price',
        'original_price',
        'category_id',
        'is_featured',
        'features',
        'specifications',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl(asset('assets/images/placeholder.jpeg'))
            ->singleFile();
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->category ? $this->category->name : 'Uncategorized';
    }

    public function getFeatureListAttribute(): array
    {
        $features = $this->features ? json_decode($this->features, true) : [];
        return array_column($features, 'name');
    }

    public function getSpecificationListAttribute(): array
    {
        return $this->specifications ? json_decode($this->specifications, true) : [];
    }

    public function getMediaCollection(): MediaCollection
    {
        return $this->getMedia('images');
    }
}
