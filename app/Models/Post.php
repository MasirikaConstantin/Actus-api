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

    public function imageUrl(){
        //return $this->image ? asset('storage/' . $this->image) : null;
        return Storage::disk('public')->url($this->image); 
    }

    public function incrementViewsCount()
    {
        $this->vues++;
        $this->save();
    }
}
