<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  ["id"=> $this->id,
        "titre"=> $this->titre,
        "slug" => $this->slug,
        "introduction"=> $this->introduction,
        "image"=> $this->image,
        "temps"=> $this->temps,
        "type_id"=> $this->type_id,
        "categorie_id" => $this-> categorie_id,
        "user_id"=> $this->user_id,
        "nature_id"=> $this->nature_id,];
    }
}
