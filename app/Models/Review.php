<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRatingStarsAttribute()
    {
        $stars = '';
        for ($i = 0; $i < $this->rating; $i++) {
            $stars .= '<i class="fas fa-star"></i>';
        }
        return $stars;
    }

    public function getRatingStarsHtmlAttribute()
    {
        return $this->ratingStars;
    }

    public function getRatingStarsTextAttribute()
    {
        $stars = '';
        for ($i = 0; $i < $this->rating; $i++) {
            $stars .= '⭐';
        }
        return $stars;
    }
}
