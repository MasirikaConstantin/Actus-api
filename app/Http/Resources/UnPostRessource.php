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
            {
                "post": {
                    "id": 13,
                    "titre": "Alias labore facilis adipisci consequatur sed fuga.",
                    "slug": "ut-ipsa-dolore-dolor",
                    "introduction": "Delectus magnam nisi harum sed sunt. Perferendis aperiam dolorum voluptatem voluptatem. Dolor animi non et repellendus facere. Voluptatem natus voluptatem voluptates et officiis.",
                    "image": null,
                    "temps": 52,
                    "type_id": 2,
                    "categorie_id": 3,
                    "user_id": 6,
                    "nature_id": 3,
                    "status": 1,
                    "created_at": "2024-04-18T11:35:19.000000Z",
                    "updated_at": "2024-12-31T17:05:13.000000Z",
                    "deleted_at": "2024-10-27 19:56:47",
                    "vues": 2704,
                    "total_reactions": 0,
                    "true_reactions": 0,
                    "false_reactions": 0,
                    "commentaires_count": 3,
                    "favoris_count": 1,
                    "sections": [
                        {
                            "id": 8,
                            "post_id": 13,
                            "titre": "Repellat quam aut inventore ut voluptatem.",
                            "contenu": "Esse voluptas quis sunt laudantium corrupti accusantium quasi. Itaque autem unde voluptas aperiam atque et nisi. Eaque blanditiis suscipit necessitatibus sed natus minima sit nam.\n\nQuasi fuga et adipisci ipsam blanditiis veritatis. Dolores quae consequuntur quisquam amet omnis et tempore. Est ut sed sint tempora distinctio a.\n\nEarum est inventore ut magnam fugit. Iste ut aut aut quos libero. Excepturi aut distinctio consectetur amet sed animi. Molestias deserunt sapiente dolor reiciendis quo ipsa harum.",
                            "image": "https://via.placeholder.com/640x480.png/0044ff?text=sections+Section+Image+neque",
                            "created_at": "2024-03-30T02:14:05.000000Z",
                            "updated_at": "2024-06-27T14:58:37.000000Z"
                        },
                        {
                            "id": 24,
                            "post_id": 13,
                            "titre": "Et a id repudiandae.",
                            "contenu": "Incidunt voluptate doloremque ut magnam rerum. Rerum voluptas esse vel rem accusantium. Quia impedit quibusdam ut ut aut.\n\nQuisquam deserunt aut quo sequi ex deleniti. Similique in non et in itaque est. In fuga necessitatibus minus modi magnam suscipit aut impedit.\n\nReiciendis commodi culpa eveniet amet architecto sint. Ipsam voluptatum occaecati sequi qui numquam. Qui autem inventore cupiditate expedita autem.",
                            "image": "https://via.placeholder.com/640x480.png/004488?text=sections+Section+Image+sunt",
                            "created_at": "2024-12-13T03:37:51.000000Z",
                            "updated_at": "2024-11-22T00:28:38.000000Z"
                        },
                        {
                            "id": 26,
                            "post_id": 13,
                            "titre": "Consequatur voluptatem aut quidem dicta aspernatur quia.",
                            "contenu": "Eaque est aspernatur iste. Occaecati deleniti sit nulla autem quod qui dolorem repellat. Est ipsa quia nesciunt.\n\nQuaerat beatae aliquid omnis suscipit ut ut. Eum minus nulla id cupiditate recusandae a pariatur. Error quo deserunt excepturi neque nostrum odio repellat minus. Quae aliquam aut dolore molestiae et et possimus. Fugit consequuntur illo distinctio.\n\nEius tenetur ea perspiciatis numquam. Totam aut rerum ipsum.",
                            "image": "https://via.placeholder.com/640x480.png/000033?text=sections+Section+Image+laudantium",
                            "created_at": "2024-07-12T16:31:35.000000Z",
                            "updated_at": "2024-07-18T06:09:59.000000Z"
                        },
                        {
                            "id": 56,
                            "post_id": 13,
                            "titre": "Sed repudiandae iusto rem iusto quis placeat.",
                            "contenu": "Necessitatibus culpa a voluptatibus sed et ipsum. Adipisci consequatur aut nostrum possimus expedita. Reprehenderit molestiae occaecati ab et. Nisi eos dicta adipisci aut alias optio unde. Soluta ut quo soluta nemo.\n\nTempora dolor corporis consequuntur assumenda. Molestias expedita natus inventore odit ut quo. Ut et rerum voluptatem ea est nostrum nihil. Est et totam voluptates qui et.\n\nExercitationem ad qui ullam cumque quasi vero. Iusto eius laboriosam provident ea nostrum reiciendis ut qui. Quas aut rerum dolorem incidunt qui qui in.",
                            "image": null,
                            "created_at": "2024-10-03T05:02:27.000000Z",
                            "updated_at": "2024-11-26T19:33:04.000000Z"
                        },
                        {
                            "id": 131,
                            "post_id": 13,
                            "titre": "Commodi ut soluta eveniet sunt quod.",
                            "contenu": "Aut ipsa dolor magnam quia quibusdam itaque. Ab consequatur quo omnis commodi non rerum voluptas sit. Iusto qui cupiditate laudantium magnam et architecto numquam.\n\nVel repellat dolore magnam sunt perferendis ex. Porro consectetur placeat vitae dolor sequi facilis ab. Qui ex natus est et.\n\nAssumenda ullam reiciendis commodi voluptas quam minima. Dolores et ut ea et quae.",
                            "image": null,
                            "created_at": "2024-07-30T14:34:41.000000Z",
                            "updated_at": "2024-06-23T13:39:34.000000Z"
                        }
                    ],
                    "reactions": [],
                    "commentaires": [
                        {
                            "id": 10,
                            "contenu": "erhbfe rgezrgiezg ezrigbiez gezurg",
                            "user_id": 1,
                            "post_id": 13,
                            "created_at": "2024-12-31T16:02:03.000000Z",
                            "updated_at": "2024-12-31T16:02:03.000000Z",
                            "user": {
                                "id": 1,
                                "name": "Exemple Utilisateur 0",
                                "email": "coco0@gmail.com",
                                "email_verified_at": null,
                                "created_at": "2024-12-19T18:55:19.000000Z",
                                "updated_at": "2024-12-19T18:55:19.000000Z",
                                "terms": 1,
                                "role": 1
                            }
                        },
                        {
                            "id": 11,
                            "contenu": "erhbfe rgezrgiezg ezrigbiez gezurg",
                            "user_id": 1,
                            "post_id": 13,
                            "created_at": "2024-12-31T16:02:05.000000Z",
                            "updated_at": "2024-12-31T16:02:05.000000Z",
                            "user": {
                                "id": 1,
                                "name": "Exemple Utilisateur 0",
                                "email": "coco0@gmail.com",
                                "email_verified_at": null,
                                "created_at": "2024-12-19T18:55:19.000000Z",
                                "updated_at": "2024-12-19T18:55:19.000000Z",
                                "terms": 1,
                                "role": 1
                            }
                        },
                        {
                            "id": 12,
                            "contenu": "erhbfe rgezrgiezg ezrigbiez gezurg",
                            "user_id": 1,
                            "post_id": 13,
                            "created_at": "2024-12-31T16:02:07.000000Z",
                            "updated_at": "2024-12-31T16:02:07.000000Z",
                            "user": {
                                "id": 1,
                                "name": "Exemple Utilisateur 0",
                                "email": "coco0@gmail.com",
                                "email_verified_at": null,
                                "created_at": "2024-12-19T18:55:19.000000Z",
                                "updated_at": "2024-12-19T18:55:19.000000Z",
                                "terms": 1,
                                "role": 1
                            }
                        }
                    ],
                    "categorie": {
                        "id": 3,
                        "name": "Home Appliances",
                        "description": "Kitchen and home essentials",
                        "icon": "🏠",
                        "created_at": "2024-12-19T18:55:11.000000Z",
                        "updated_at": "2024-12-19T18:55:11.000000Z"
                    },
                    "user": {
                        "id": 6,
                        "name": "Exemple Utilisateur 5",
                        "email": "coco5@gmail.com",
                        "email_verified_at": null,
                        "created_at": "2024-12-19T18:55:21.000000Z",
                        "updated_at": "2024-12-19T18:55:21.000000Z",
                        "terms": 1,
                        "role": 1
                    }
                }
            }
        ];
    }
}
