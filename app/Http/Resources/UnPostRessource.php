<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnPostRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titre' => $this->titre,
            'slug' => $this->slug,
            'introduction' => $this->introduction,
            'image' => $this->image,
            'temps' => $this->temps,
            'type_id' => $this->type_id,
            'categorie_id' => $this->categorie_id,
            'user_id' => $this->user_id,
            'nature_id' => $this->nature_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'vues' => $this->vues,
            'total_reactions' => $this->total_reactions,
            'true_reactions' => $this->true_reactions,
            'false_reactions' => $this->false_reactions,
            'commentaires_count' => $this->commentaires_count,
            'favoris_count' => $this->favoris_count,
            'sections' => SectionResource::collection($this->whenLoaded('sections')),
            'reactions' => $this->whenLoaded('reactions'),
            'commentaires' => CommentaireResource::collection($this->whenLoaded('commentaires')),
            'categorie' => new CategorieRessource($this->whenLoaded('categorie')),
            'user' => new UserResource($this->whenLoaded('user')),
            'autres' => PostRessource::collection($this->whenLoaded('autres')),

        ];
    }
}
