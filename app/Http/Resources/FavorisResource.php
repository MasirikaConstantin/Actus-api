<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavorisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "titre"=>$this->titre,
            "slug"=>$this->slug,
            "introduction"=>$this->introduction,
            "image"=>$this->image,
            "temps"=>$this->temps,
            
            "creer"=>$this->created_at,
            "vues"=>$this->vues,
            "categorie"=>[
                "name"=>$this->categorie->name,
                "id"=>$this->categorie->id,
            ],
            "nature"=>[
                "name"=>$this->nature->name,
                "id"=>$this->nature->id,
            ]
        ];
    }
}
