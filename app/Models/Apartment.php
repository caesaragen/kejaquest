<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Summary of Apartment
 */
class Apartment extends Model
{
    use HasFactory;

    /**
     * Summary of fillable
     * 
     * @var array
     */
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

    /**
     * Summary of location
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Summary of category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Summary of user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of reviews
     * 
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Summary of getFullAddressAttribute
     * 
     * @return string
     */
    public function getFullAddressAttribute(): string
    {
        return $this->location->full_address;
    }

    /**
     * Summary of getFullPriceAttribute
     * 
     * @return string
     */
    public function getFullPriceAttribute(): string
    {
        return 'Ksh. ' . number_format($this->price);
    }

    /**
     * Summary of getFullDescriptionAttribute
     * 
     * @return string
     */
    public function getFullDescriptionAttribute(): string
    {
        return substr($this->description, 0, 100) . '...';
    }
}
