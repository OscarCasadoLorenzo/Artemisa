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

        $pop->artworks()->saveMany(aux1, aux2, aux3);
        

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
        $aux6->dimensions = '64,4 x 75,5 cm';
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
        $aux8->dimensions = '203,5 x 134 cm';
        $aux8->save();

        
        $aux9 = new Artwork();
        $aux9->title = 'The Baptism of Christ';
        $aux9->genre = 'Pintura Religiosa';
        //$aux9->author = 'Hendrick Goltzius';
        $aux9->year = 1608;
        $aux9->dimensions = '203,5 x 132,5 cm';
        $aux9->save();

        $bar->artworks()->saveMany(aux1, aux2, aux3, aux4, aux5, aux6, aux7, aux8);
    }
}
