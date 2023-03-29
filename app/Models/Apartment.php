<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location_id',
        'price',
        'user_id',
        'category_id',
        'image',
        'type',
        // 'bedrooms',
        // 'bathrooms',
        // 'toilets',
        // 'garages',
        // 'floor_area',
        // 'land_area',
        // 'status',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute()
    {
        return $this->location->full_address;
    }

    public function getFullPriceAttribute()
    {
        return 'Ksh. ' . number_format($this->price);
    }

    public function getFullDescriptionAttribute()
    {
        return substr($this->description, 0, 100) . '...';
    }
    
}
