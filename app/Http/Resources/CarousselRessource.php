<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarousselRessource extends JsonResource
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
            "introduction"=>$this->introduction,
            "image"=>$this->image,
            "categorie_id"=>$this->categorie_id,
            "total_reactions"=>$this->total_reactions,
            "true_reactions"=>$this->true_reactions,
            "false_reactions"=>$this->false_reactions,
            "categorie"=>
                [
                    "id"=>$this->categorie->id,
                    "name"=>$this->categorie->name
                ],
            "commentaires_count"=>$this->commentaires_count

        ];
    }
}
