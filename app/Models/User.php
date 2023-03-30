<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define User Roles for the application here admin and regular user
    public const ROLES = [
        'admin',
        'user',
    ];


    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }


    public function apartments() : HasMany
    {
        return $this->hasMany(Apartment::class);
    }

    public function locations()
    {
        return $this->hasManyThrough(Location::class, Apartment::class);
    }

    public function subCounties() 
    {
        return $this->hasManyThrough(SubCounty::class, Apartment::class);
    }

    public function counties()
    {
        return $this->hasManyThrough(County::class, Apartment::class);
    }

    public function categories()
    {
        return $this->hasManyThrough(Category::class, Apartment::class);
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }
    
}
