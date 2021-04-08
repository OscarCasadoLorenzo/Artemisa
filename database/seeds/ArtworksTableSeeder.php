<?php

use Illuminate\Database\Seeder;
use App\Artwork;
use App\Collection;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //inicializacion de colecciones
        $pop = new Collection();
        $pop->name = "Arte Pop";
        $pop->save();
    //Arte Pop
        $aux1 = new Artwork();
        $aux1->title = 'Two Candy Sticks';
        $aux1->genre = 'Arte Pop';
        //$aux1->author = 'Wayne Thiebaud';
        // $aux1->movement = 'Arte Pop';
        $aux1->collection()->associate($pop);
        $aux1->year = 2004;
        $aux1->dimensions = '25.4 × 35.6 cm';
        $aux1->save();

        $aux2 = new Artwork();
        $aux2->title = 'Jolly Cones';
        $aux2->genre = 'Naturaleza Muerta';
        //$aux2->author = 'Wayne Thiebaud';
        // $aux2->movement = 'Arte Pop';
        $aux2->collection()->associate($pop);
        $aux2->year = 2002;
        $aux2->dimensions = '14.25 X 12.25 cm';
        $aux2->save();

        $aux3 = new Artwork();
        $aux3->title = 'Neapolitan Cupcakes';
        $aux3->genre = 'Naturaleza Muerta';
        //$aux3->author = 'Wayne Thiebaud';
        // $aux3->movement = 'Arte Pop';
        $aux3->collection()->associate($pop);
        $aux3->year = 2008;
        $aux3->dimensions = '30.5 x 40 cm';
        $aux3->save();

        $pop->artworks()->saveMany($aux1, $aux2, $aux3);


//Barroco

        $bar = new Collection();
        $bar->name = "Barroco";
        $bar->save();

        $aux1 = new Artwork();
        $aux1->title = 'Landscape with Roman Ruins';
        $aux1->genre = 'Vedutismo';
        //$aux1->author = 'Paul Brill';
        // $aux1->movement = 'Barroco';
        $aux1->collection()->associate($bar);
        $aux1->year = 1580;
        $aux1->dimensions = '29.5 x 21.5';
        $aux1->save();

        $aux2 = new Artwork();
        $aux2->title = 'The Port';
        $aux2->genre = 'Marina';
        //$aux2->author = 'Paul Brill';
        // $aux2->movement = 'Barroco';
        $aux2->collection()->associate($bar);
        $aux2->year = 1611;
        $aux2->dimensions = '105 x 150 cm';
        $aux2->save();

        $aux3 = new Artwork();
        $aux3->title = 'Self-Portrait';
        $aux3->genre = 'Autorretrato';
        //$aux3->author = 'Paul Brill';
        // $aux3->movement = 'Barroco';
        $aux3->collection()->associate($bar);
        $aux3->year = 1600;
        $aux3->dimensions = '71 x 78 cm';
        $aux3->save();

        $aux4 = new Artwork();
        $aux4->title = 'Baco enfermo';
        $aux4->genre = 'Pintura Mitológica';
        //$aux4->author = 'Caravaggio';
        // $aux4->movement = 'Barroco';
        $aux4->collection()->associate($bar);
        $aux4->year = 1593;
        $aux4->dimensions = '67 x 53 cm';
        $aux4->save();

        $aux5 = new Artwork();
        $aux5->title = 'El amor victorioso';
        $aux5->genre = 'Pintura Mitológica';
        //$aux5->author = 'Caravaggio';
        // $aux5->movement = 'Barroco';
        $aux5->collection()->associate($bar);
        $aux5->year = 1602;
        $aux5->dimensions = '156 x 113 cm';
        $aux5->save();

        $aux6 = new Artwork();
        $aux6->title = 'Fanciullo che monda un pomo';
        $aux6->genre = 'Retrato';
        //$aux6->author = 'Caravaggio';
        // $aux6->movement = 'Barroco';
        $aux6->collection()->associate($bar);
        $aux6->year = 1592;
        $aux6->dimensions = '64.4 x 75.5 cm';
        $aux6->save();

        $aux7 = new Artwork();
        $aux7->title = 'Cadmus Slays The Dragon';
        $aux7->genre = 'Pintura Mitológica';
        //$aux7->author = 'Hendrick Goltzius';
        // $aux7->movement = 'Barroco';
        $aux7->collection()->associate($bar);
        $aux7->year = 1600;
        $aux7->dimensions = '189 x 248 cm';
        $aux7->save();

        $aux8 = new Artwork();
        $aux8->title = 'Adam and Eve (The Fall of Man)';
        $aux8->genre = 'Pintura Religiosa';
        //$aux8->author = 'Hendrick Goltzius';
        $aux8->collection()->associate($bar);
        $aux8->year = 1608;
        $aux8->dimensions = '203.5 x 134 cm';
        $aux8->save();


        $aux9 = new Artwork();
        $aux9->title = 'The Baptism of Christ';
        $aux9->genre = 'Pintura Religiosa';
        //$aux9->author = 'Hendrick Goltzius';
        $aux9->year = 1608;
        $aux9->dimensions = '203.5 x 132.5 cm';
        $aux9->save();

        $bar->artworks()->saveMany($aux1, $aux2, $aux3, $aux4, $aux5, $aux6, $aux7, $aux8);


//REALISMO

        $real = new Collection();
        $real->name = "Realismo";
        $real->save();
        $aux1 = new Artwork();
        $aux1->title = 'Woman Reading in a Landscape';
        $aux1->genre = 'Retrato';
        //$aux1->author = 'Wayne Thiebaud';
        // $aux1->movement = 'Realismo';
        $aux1->collection()->associate($real);
        $aux1->year = 1869;
        $aux1->dimensions = '54.3 x 37.5 cm';
        $aux1->save();

        $aux2 = new Artwork();
        $aux2->title = 'The Woman with a Pearl';
        $aux2->genre = 'Retrato';
        //$aux2->author = 'Wayne Thiebaud';
        // $aux2->movement = 'Realismo';
        $aux2->collection()->associate($real);
        $aux2->year = 1869;
        $aux2->dimensions = '70 x 55 cm';
        $aux2->save();

        $aux3 = new Artwork();
        $aux3->title = 'Ah-yaw-ne-tak-oár-ron, a Warrior';
        $aux3->genre = 'Retrato';
        //$aux3->author = 'Wayne Thiebaud';
        // $aux3->movement = 'Realismo';
        $aux3->collection()->associate($real);
        $aux3->year = 1831;
        $aux3->dimensions = '53.7 x 41.9 cm';
        $aux3->save();



        $aux4->title = 'Hól-te-mál-te-téz-te-néek-ee, Sam Perryman (Creek Chief)';
        $aux4->genre = 'Retrato';
        //$aux4->author = 'Wayne Thiebaud';
        // $aux4->movement = 'Realismo';
        $aux4->collection()->associate($real);
        $aux4->year = 1834;
        $aux4->dimensions = '73.7 x 60.9 cm';
        $aux4->save();

        $aux5->title = 'Mó-sho-la-túb-bee, He Who Puts Out and Kills, Chief of the Tribe';
        $aux5->genre = 'Retrato';
        //$aux5->author = 'Wayne Thiebaud';
        // $aux5->movement = 'Realismo';
        $aux5->collection()->associate($real);
        $aux5->year = 1834;
        $aux5->dimensions = '73.7 x 60.9 cm';
        $aux5->save();

        $aux6->title = 'Sleeping Herd-Boy';
        $aux6->genre = 'Retrato';
        //$aux6->author = 'Wayne Thiebaud';
        // $aux6->movement = 'Realismo';
        $aux6->collection()->associate($real);
        $aux6->year = 1824;
        $aux6->dimensions = '76.2 x 55.88 cm';
        $aux6->save();

        $aux7->title = 'Meeting at the Well';
        $aux7->genre = 'Retrato';
        //$aux7->author = 'Wayne Thiebaud';
        // $aux7->movement = 'Realismo';
        $aux7->collection()->associate($real);
        $aux7->year = 1843;
        $aux7->dimensions = '75.5 x 62.0 cm';
        $aux7->save();

        $aux8->title = 'Peasant Children in the Field';
        $aux8->genre = 'Retrato';
        //$aux8->author = 'Wayne Thiebaud';
        // $aux8->movement = 'Realismo';
        $aux8->collection()->associate($real);
        $aux8->year = 1876;
        $aux8->dimensions = '48.5 × 64.5 cm';
        $aux8->save();

        $real->artworks()->saveMany($aux1, $aux2, $aux3, $aux4, $aux5, $aux6, $aux7, $aux8);

    }
}
