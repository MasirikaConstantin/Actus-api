<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'contenu', 'image', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
