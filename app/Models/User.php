<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;  // Ajoutez cette ligne
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "image"
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $appends = ['image'];

    public function getImageAttribute()
{
    if ($this->attributes['image']) {
        return config('app.url') . '/storage/' . $this->attributes['image'];
    }
    return null;
}
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
    

    public function favoriss()
    {
        return $this->hasMany(Favori::class);
    }
    public function favoris()
{
    return $this->belongsToMany(Post::class, 'favoris')->withTimestamps();
}

}
