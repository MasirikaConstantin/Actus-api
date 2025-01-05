<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'post_id' => $this->post_id,
            'titre' => $this->titre,
            'contenu' => $this->contenu,
            'image' => $this->image,
            'created_at' => $this->created_at,
        ];
    }
}
