<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RessourcePostAll extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "titre"=> $this->titre,
            "slug" => $this->slug,
            "introduction"=> $this->introduction,
            "image"=> $this->image,
            "temps"=> $this->temps,
            "type_id"=> $this->type_id,
            "categorie_id" => $this-> categorie_id,
            "user_id"=> $this->user_id,
            "nature_id"=> $this->nature_id,
            "status"=> $this->status,
            "created_at"=> $this->created_at,
            "vues"=> $this->vues,
            "total_reactions"=> $this->total_reactions,
            "true_reactions"=> $this->true_reactions,
            "false_reactions"=> $this->false_reactions,
            "commentaires_count"=> $this->commentaires_count,
            "favoris_count"=> $this->favoris_count,
            "sections"=> $this->sections->map(function($section) {
                return [
                    "id"=> $section->id,
                    "post_id"=> $section->post_id,
                    "titre"=> $section->titre,
                    "contenu"=> $section->contenu,
                    "image" => $section->image,
                ];
            }),
            "reactions"=> $this->reactions->map(function($reaction) {
                return [
                    "id"=> $reaction->id,
                    "user_id"=> $reaction->user_id,
                    "post_id"=> $reaction->post_id,
                    "reaction"=> $reaction->reaction,
                ];
            }),
            "commentaires"=> $this->commentaires->map(function($commentaire) {
                return [
                    "id"=> $commentaire->id,
                    "contenu"=> $commentaire->contenu,
                    "user_name"=> $commentaire->user->name,
                    "post_id"=> $commentaire->post_id,
                    "created_at"=> $commentaire->created_at,
                    "updated_at"=> $commentaire->updated_at,
                ];
            }),
            "categorie"=>
            [
              "id"=> $this->categorie->id,
              "name"=> $this->categorie->name,
              "description"=> $this->categorie->description,
              "icon"=> $this->categorie->icon
            ]
        ];
    }
}
