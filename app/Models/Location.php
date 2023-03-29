<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub_county_id',
    ];

    public function subCounty()
    {
        return $this->belongsTo(SubCounty::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function county()
    {
        return $this->subCounty->county;
    }

    public function getFullAddressAttribute()
    {
        return $this->name . ', ' . $this->subCounty->name . ', ' . $this->subCounty->county->name;
    }
    
}
