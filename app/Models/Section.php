<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'contenu', 'image', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function imageUrl(){
        //return $this->image ? asset('storage/' . $this->image) : null;
        return Storage::disk('public')->url($this->image); 
    }
    public function getImageAttribute()
{
    if ($this->attributes['image']) {
        return config('app.url') . '/storage/' . $this->attributes['image'];
    }
    return null;
}

}
