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
}
