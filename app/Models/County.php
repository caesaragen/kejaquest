<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function subCounties()
    {
        return $this->hasMany(SubCounty::class);
    }

    public function locations()
    {
        return $this->hasManyThrough(Location::class, SubCounty::class);
    }

    public function apartments()
    {
        return $this->hasManyThrough(Apartment::class, Location::class);
    }
}
