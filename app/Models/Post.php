<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */

    use HasFactory;
    protected $fillable = [
        'titre',
        'slug',
        'introduction',
        'contenu',
        'image',
        'temps',
        'type_id',
        'categorie_id',
        'user_id',
        'nature_id',
        'status',
        'vues'
    ];
   
    protected $appends = ['image'];

    public function getImageAttribute()
{
    if ($this->attributes['image']) {
        return env('APP_URL') . '/storage/' . $this->attributes['image'];
    }
    return null;
}
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function nature()
    {
        return $this->belongsTo(Nature::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function reactions()
{
    return $this->hasMany(Reaction::class);
}
public function commentaires(){
    return $this->hasMany(Commentaire::class);
}
public function favoris(){
    return $this->hasMany(Favori::class);
}
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function imageUrl()
{
    // Vérifie si l'image commence déjà par http ou https
    if (str_starts_with($this->image, 'http')) {
        return $this->image;
    }
    
    // Sinon, retourne l'URL avec Storage
    return Storage::disk('public')->url($this->image);
}

    public function incrementViewsCount()
    {
        $this->vues++;
        $this->save();
    }
    
}
