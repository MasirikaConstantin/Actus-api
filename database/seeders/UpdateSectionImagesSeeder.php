<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateSectionImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'posts/0wEHk2n0yt8yLujtnOK7gbUt1dQbc93TdwNF02VB.png',
            'posts/2FZiRkC7sQ53qYPQ5IkXmJ2kvhmplWvvMsinDsJH.jpg',
            'posts/46XVLpwroQDxByAnwFmbpXh7V3BbtSk7CA7pdxmt.svg',
            'posts/8ouPX7DonfEx2gzNTQaU3GoXh5pXWhyk5j89xbwE.png',
            'posts/8Z0o1dxdmIVNvJqyycJh1i2ppkMSwfYA2N6yw1GH.jpg',
            'posts/admBy7iSLYuimoM1THdAjR7lujEPk6k2nyLoP8BV.jpg',
            'posts/dgKbW9MeviaJijyXrPVLat617aEkR415A6B02ymd.png',
            'posts/DQN1p5zk0piO3OmpeSpWZWz2JmS7aTTYKHYT7ip0.png',
            'posts/EavY0napMfO6L61424wYuhGMi1ErFKVx7FUHCPUb.png',
            'posts/enEX6BkfifdhODOFLIQ9DVV6ldewrNRLKIw7dcez.png',
            'posts/dgKbW9MeviaJijyXrPVLat617aEkR415A6B02ymd.png',
            'posts/DQN1p5zk0piO3OmpeSpWZWz2JmS7aTTYKHYT7ip0.png',
            'posts/EavY0napMfO6L61424wYuhGMi1ErFKVx7FUHCPUb.png',
            'posts/enEX6BkfifdhODOFLIQ9DVV6ldewrNRLKIw7dcez.png',
            'posts/dgKbW9MeviaJijyXrPVLat617aEkR415A6B02ymd.png',
            'posts/DQN1p5zk0piO3OmpeSpWZWz2JmS7aTTYKHYT7ip0.png',
            'posts/EavY0napMfO6L61424wYuhGMi1ErFKVx7FUHCPUb.png',
            'posts/enEX6BkfifdhODOFLIQ9DVV6ldewrNRLKIw7dcez.png',
            'posts/fj5j06hRDyytnbTK5sL02KGnTyYPyIJPFINQ0rsD.jpg',
            'posts/gVyAuFFymnhdfPxAg71qyHlqD3xCrLLetder7hXD.png',
            'posts/HldoSnw0WJ93bZi7Sa3RGIPTRAUvX2Fk583uKMKd.jpg',
            
            'posts/N3wJvMTA3wgyJBeYpt46meq7U3CSyRhf3Kxjo4s4.png',
            'posts/Nu808NDnATgPxkA5Capr4zW0uG9L6FNsaSJzgL83.jpg',
            'posts/ou0AKBIRJn8xjuNY2GPHtzFiZWrwuJCil0cQV57e.jpg',
            'posts/OuEpM9srv47k8Q718bjZ3GfWflMcEld0qD719gXS.png',
            'posts/KnW7svcOoyRYMwnZFetJb3N9vDavHXfgtTh7F8Fw.png',
            'posts/HldoSnw0WJ93bZi7Sa3RGIPTRAUvX2Fk583uKMKd.jpg',
            'posts/KnW7svcOoyRYMwnZFetJb3N9vDavHXfgtTh7F8Fw.png',
            'posts/IOhGwO8Vwd32iP3jEh2r27tknMDnRKilioiF26yY.png',
            'posts/PO3FDfQGVJUsUrKhHgpADRonZrb4dUD3ZcmCS1j3.jpg',
            'posts/SwHs0aMQm6YFK5mjXaZmnAXebZzUoB3WThNKrhum.jpg',
            'posts/TaMI30WWP5PklDusJcxymhqJyUP76gGc8EE3XfOt.png',
            'posts/v6YDPfJdXwDhAHC02132qULBaf1AjvmCDd84FE7a.jpg',
            'posts/XWdCaNO3ekCZIZ7mRcbg94MGrDuNW36Dt7nqIREI.png',
        ];

        // Récupérer tous les posts
        $sections = DB::table('sections')->get();

        // Parcourir chaque post et mettre à jour l'image de manière aléatoire
        foreach ($sections as $section) {
            $randomImage = $images[array_rand($images)]; // Sélectionner une image aléatoire
            DB::table('sections')
                ->where('id', $section->id)
                ->update(['image' => $randomImage]);
        }
    }
}
