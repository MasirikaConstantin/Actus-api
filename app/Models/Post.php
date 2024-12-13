<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
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
        'status'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imageUrl(){
        //return $this->image ? asset('storage/' . $this->image) : null;
        return Storage::disk('public')->url($this->image); 
    }
}
