<?php

use Illuminate\Database\Seeder;
use App\Artwork;
use App\Collection;
use App\Museum;
use App\Author;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

///////////////////////AUTORES///////////////////////
        $aut1 = new Author();
        $aut1->name = 'Johan Barthold Jongkind';
        $aut1->nacionality = 'Holandés';
        $aut1->birth_date = '1819';
        $aut1->movement = 'Impresionismo, Realismo';
        $aut1->imgRoute = 'images/authors/johan_barthold_jongkind.png';
        $aut1->save();

        $aut2 = new Author();
        $aut2->name = 'Jacob-Abraham-Camille Pissarro';
        $aut2->nacionality = 'Francés';
        $aut2->birth_date = '1830';
        $aut2->movement = 'Impresionismo, Neoimpresionismo';
        $aut2->imgRoute = 'images/authors/jacob_abraham_camille_pissarro.png';
        $aut2->save();

        $aut3 = new Author();
        $aut3->name = 'León Ferrari';
        $aut3->nacionality = 'Argentino';
        $aut3->birth_date = '1920';
        $aut3->movement = 'Arte Conceptual';
        $aut3->imgRoute = 'images/authors/leon_ferrari.png';
        $aut3->save();

        $aut4 = new Author();
        $aut4->name = 'Ion Bitzan';
        $aut4->nacionality = 'Rumano';
        $aut4->birth_date = '1924';
        $aut4->movement = 'Arte Conceptual';
        $aut4->imgRoute = 'images/authors/ion_bitzan.png';
        $aut4->save();

        $aut4 = new Author();
        $aut4->name = 'Wayne Thiebaud';
        $aut4->nacionality = 'Americano';
        $aut4->birth_date = '1920';
        $aut4->movement = 'Arte Pop';
        $aut4->imgRoute = 'images/authors/wayne_thiebaud.png';
        $aut4->save();

        $aut5 = new Author();
        $aut5->name = 'Paul Brill';
        $aut5->nacionality = 'Flamenco';
        $aut5->birth_date = '1554';
        $aut5->movement = 'Barroco';
        $aut5->imgRoute = 'images/authors/paul_brill.png';
        $aut5->save();

        $aut6 = new Author();
        $aut6->name = 'Caravaggio';
        $aut6->nacionality = 'Italiano';
        $aut6->birth_date = '1571';
        $aut6->movement = 'Barroco';
        $aut6->imgRoute = 'images/authors/caravaggio.png';
        $aut6->save();

        $aut7 = new Author();
        $aut7->name = 'Hendrick Goltzius';
        $aut7->nacionality = 'Flamenco';
        $aut7->birth_date = '1558';
        $aut7->movement = 'Manierismo, Barroco';
        $aut7->imgRoute = 'images/authors/hendrick_goltzius.png';
        $aut7->save();

        $aut8 = new Author();
        $aut8->name = 'Jean-Baptiste-Camille Corot';
        $aut8->nacionality = 'Francés';
        $aut8->birth_date = '1796';
        $aut8->movement = 'Realismo';
        $aut8->imgRoute = 'images/authors/jean_baptiste_camille_corot.png';
        $aut8->save();

        $aut9 = new Author();
        $aut9->name = 'George Catlin';
        $aut9->nacionality = 'Americano';
        $aut9->birth_date = '1796';
        $aut9->movement = 'Realismo';
        $aut9->imgRoute = 'images/authors/george_catlin.png';
        $aut9->save();

        $aut10 = new Author();
        $aut10->name = 'Alekséi Venetsiánov';
        $aut10->nacionality = 'Ruso';
        $aut10->birth_date = '1780';
        $aut10->movement = 'Realismo';
        $aut10->imgRoute = 'images/authors/aleksei_venetsianov.png';
        $aut10->save();
/////////////////////////////////////////////////////


        $m1 = new Museum();
        $m1->name = 'El Prado';
        $m1->address = 'Calle de Ruiz de Alarcón';
        $m1->location = 'Madrid, España';
        $m1->save();

        $m2 = new Museum();
        $m2->name = 'El Louvre';
        $m2->address = 'Rue de Rivoli';
        $m2->location = 'Paris, Francia';
        $m2->save();


        /*==========================================
        ==========COLECCIONES DEL PRADO=============
        ===========================================*/
        //IMPRESIONISMO

        $impre = new Collection();
        $impre->name = "Impresionismo";
        $impre->museum()->associate($m1);
        $impre->save();

        $aux = new Artwork();
        $aux->title = 'View of a square in Avignon, with a hardware store';
        $aux->author()->associate($aut1);
        $aux->year = 1880;
        $aux->genre = 'Paisaje Urbano';
        $aux->collection()->associate($impre);
        $aux->movement = 'Impresionismo';
        $aux->dimensions = '27 x 37,1 cm';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'View of Rotterdam';
        $aux->author()->associate($aut1);
        $aux->year = 1867;
        $aux->genre = 'Paisaje Urbano';
        $aux->collection()->associate($impre);
        $aux->movement = 'Impresionismo';
        $aux->dimensions = '24,5 x 37,5 cm';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'Entrée de port, Honfleur';
        $aux->author()->associate($aut1);
        $aux->year = 1866;
        $aux->genre = 'Marina';
        $aux->collection()->associate($impre);
        $aux->movement = 'Impresionismo';
        $aux->dimensions = '42,5 x 56 cm';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'The Pont Royal and the Pavillon de Flore';
        $aux->author()->associate($aut2);
        $aux->year = 1903;
        $aux->genre = 'Paisaje Urbano';
        $aux->collection()->associate($impre);
        $aux->movement = 'Impresionismo';
        $aux->dimensions = '54 x 65 cm';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'The Treasury and the Academy, Gray Weather';
        $aux->author()->associate($aut2);
        $aux->year = 1903;
        $aux->genre = 'Paisaje Urbano';
        $aux->collection()->associate($impre);
        $aux->movement = 'Impresionismo';
        $aux->dimensions = '46 x 38 cm';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'The Malaquais Quay in the Morning, Sunny Weather';
        $aux->author()->associate($aut2);
        $aux->year = 1903;
        $aux->genre = 'Paisaje Urbano';
        $aux->collection()->associate($impre);
        $aux->movement = 'Impresionismo';
        $aux->dimensions = '41 x 33 cm';
        $aux->save();

        //Arte conceptual
        $concep = new Collection();
        $concep->name = "Arte Conceptual";
        $concep->museum()->associate($m1);
        $concep->save();

        $aux = new Artwork();
        $aux->title = 'Peces coloridos y bichos de Comfer';
        $aux->author()->associate($aut3);
        $aux->year = 1994;
        $aux->genre = 'Instalación';
        $aux->collection()->associate($concep);
        $aux->movement = 'Arte Conceptual';
        $aux->dimensions = '';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'Western Christian Civilization';
        $aux->author()->associate($aut3);
        $aux->year = 1965;
        $aux->genre = 'Instalación';
        $aux->collection()->associate($concep);
        $aux->movement = 'Arte Conceptual';
        $aux->dimensions = '';
        $aux->save();

        $aux = new Artwork();
        $aux->title = "Noah's Ark";
        $aux->author()->associate($aut3);
        $aux->year = 1964;
        $aux->genre = 'Pintura Fugitiva';
        $aux->collection()->associate($concep);
        $aux->movement = 'Arte Conceptual';
        $aux->dimensions = '';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'The Magic Square';
        $aux->author()->associate($aut4);
        $aux->year = 1975;
        $aux->genre = 'Pintura Fugitiva';
        $aux->collection()->associate($concep);
        $aux->movement = 'Arte Conceptual';
        $aux->dimensions = '';
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'The Fairies';
        $aux->author()->associate($aut4);
        $aux->year = 1996;
        $aux->genre = 'Instalación';
        $aux->collection()->associate($concep);
        $aux->movement = 'Arte Conceptual';
        $aux->dimensions = '';
        $aux->save();


        /*==========================================
        ==========COLECCIONES DEL LOUVRE=============
        ===========================================*/

        //ARTE POP
        $pop = new Collection();
        $pop->name = "Arte Pop";
        $pop->museum()->associate($m2);
        $pop->save();

        $aux1 = new Artwork();
        $aux1->title = 'Two Candy Sticks';
        $aux1->genre = 'Arte Pop';
        $aux1->author()->associate($aut4);
        $aux1->movement = 'Arte Pop';
        $aux1->collection()->associate($pop);
        $aux1->year = 2004;
        $aux1->dimensions = '25.4 × 35.6 cm';
        $aux1->save();

        $aux2 = new Artwork();
        $aux2->title = 'Jolly Cones';
        $aux2->genre = 'Naturaleza Muerta';
        $aux2->author()->associate($aut4);
        $aux2->movement = 'Arte Pop';
        $aux2->collection()->associate($pop);
        $aux2->year = 2002;
        $aux2->dimensions = '14.25 X 12.25 cm';
        $aux2->save();

        $aux3 = new Artwork();
        $aux3->title = 'Neapolitan Cupcakes';
        $aux3->genre = 'Naturaleza Muerta';
        $aux3->author()->associate($aut4);
        $aux3->movement = 'Arte Pop';
        $aux3->collection()->associate($pop);
        $aux3->year = 2008;
        $aux3->dimensions = '30.5 x 40 cm';
        $aux3->save();

        // $pop->artworks()->saveMany($aux1);
        // $pop->artworks()->saveMany($aux2);
        // $pop->artworks()->saveMany($aux3);



//Barroco

        $bar = new Collection();
        $bar->name = "Barroco";
        $bar->museum()->associate($m2);
        $bar->save();

        $aux1 = new Artwork();
        $aux1->title = 'Landscape with Roman Ruins';
        $aux1->genre = 'Vedutismo';;
        $aux1->author()->associate($aut5);
        $aux1->movement = 'Barroco';
        $aux1->collection()->associate($bar);
        $aux1->year = 1580;
        $aux1->dimensions = '29.5 x 21.5';
        $aux1->save();

        $aux2 = new Artwork();
        $aux2->title = 'The Port';
        $aux2->genre = 'Marina';
        $aux2->author()->associate($aut5);
        $aux2->movement = 'Barroco';
        $aux2->collection()->associate($bar);
        $aux2->year = 1611;
        $aux2->dimensions = '105 x 150 cm';
        $aux2->save();

        $aux3 = new Artwork();
        $aux3->title = 'Self-Portrait';
        $aux3->genre = 'Autorretrato';
        $aux3->author()->associate($aut5);
        $aux3->movement = 'Barroco';
        $aux3->collection()->associate($bar);
        $aux3->year = 1600;
        $aux3->dimensions = '71 x 78 cm';
        $aux3->save();

        $aux4 = new Artwork();
        $aux4->title = 'Baco enfermo';
        $aux4->genre = 'Pintura Mitológica';
        $aux4->author()->associate($aut6);
        $aux4->movement = 'Barroco';
        $aux4->collection()->associate($bar);
        $aux4->year = 1593;
        $aux4->dimensions = '67 x 53 cm';
        $aux4->save();

        $aux5 = new Artwork();
        $aux5->title = 'El amor victorioso';
        $aux5->genre = 'Pintura Mitológica';
        $aux5->author()->associate($aut6);
        $aux5->movement = 'Barroco';
        $aux5->collection()->associate($bar);
        $aux5->year = 1602;
        $aux5->dimensions = '156 x 113 cm';
        $aux5->save();

        $aux6 = new Artwork();
        $aux6->title = 'Fanciullo che monda un pomo';
        $aux6->genre = 'Retrato';
        $aux6->author()->associate($aut6);
        $aux6->movement = 'Barroco';
        $aux6->collection()->associate($bar);
        $aux6->year = 1592;
        $aux6->dimensions = '64.4 x 75.5 cm';
        $aux6->save();

        $aux7 = new Artwork();
        $aux7->title = 'Cadmus Slays The Dragon';
        $aux7->genre = 'Pintura Mitológica';
        $aux7->author()->associate($aut7);
        $aux7->movement = 'Barroco';
        $aux7->collection()->associate($bar);
        $aux7->year = 1600;
        $aux7->dimensions = '189 x 248 cm';
        $aux7->save();

        $aux8 = new Artwork();
        $aux8->title = 'Adam and Eve (The Fall of Man)';
        $aux8->genre = 'Pintura Religiosa';
        $aux8->author()->associate($aut7);
        $aux8->movement = 'Barroco';
        $aux8->collection()->associate($bar);
        $aux8->year = 1608;
        $aux8->dimensions = '203.5 x 134 cm';
        $aux8->save();

        $aux9 = new Artwork();
        $aux9->title = 'The Baptism of Christ';
        $aux9->genre = 'Pintura Religiosa';
        $aux9->author()->associate($aut7);
        $aux9->movement = 'Barroco';
        $aux9->collection()->associate($bar);
        $aux9->year = 1608;
        $aux9->dimensions = '203.5 x 132.5 cm';
        $aux9->save();

        // $bar->artworks()->saveMany($aux1, $aux2, $aux3, $aux4, $aux5, $aux6, $aux7, $aux8);

        // $m1->collection()->saveMany($pop, $bar);


//REALISMO

        $real = new Collection();
        $real->name = "Realismo";
        $real->museum()->associate($m2);
        $real->save();

        $aux1 = new Artwork();
        $aux1->title = 'Woman Reading in a Landscape';
        $aux1->genre = 'Retrato';
        $aux1->author()->associate($aut7);
        $aux1->movement = 'Realismo';
        $aux1->collection()->associate($real);
        $aux1->year = 1869;
        $aux1->dimensions = '54.3 x 37.5 cm';
        $aux1->save();

        $aux2 = new Artwork();
        $aux2->title = 'The Woman with a Pearl';
        $aux2->genre = 'Retrato';
        $aux2->author()->associate($aut7);
        $aux2->movement = 'Realismo';
        $aux2->collection()->associate($real);
        $aux2->year = 1869;
        $aux2->dimensions = '70 x 55 cm';
        $aux2->save();

        $aux3 = new Artwork();
        $aux3->title = 'Ah-yaw-ne-tak-oár-ron, a Warrior';
        $aux3->genre = 'Retrato';
        $aux3->author()->associate($aut7);
        $aux3->movement = 'Realismo';
        $aux3->collection()->associate($real);
        $aux3->year = 1831;
        $aux3->dimensions = '53.7 x 41.9 cm';
        $aux3->save();


        $aux4->title = 'Hól-te-mál-te-téz-te-néek-ee, Sam Perryman (Creek Chief)';
        $aux4->genre = 'Retrato';
        $aux4->author()->associate($aut7);
        $aux4->movement = 'Realismo';
        $aux4->collection()->associate($real);
        $aux4->year = 1834;
        $aux4->dimensions = '73.7 x 60.9 cm';
        $aux4->save();

        $aux5->title = 'Mó-sho-la-túb-bee, He Who Puts Out and Kills, Chief of the Tribe';
        $aux5->genre = 'Retrato';
        $aux5->author()->associate($aut7);
        $aux5->movement = 'Realismo';
        $aux5->collection()->associate($real);
        $aux5->year = 1834;
        $aux5->dimensions = '73.7 x 60.9 cm';
        $aux5->save();

        $aux6->title = 'Sleeping Herd-Boy';
        $aux6->genre = 'Retrato';
        $aux6->author()->associate($aut7);
        $aux6->movement = 'Realismo';
        $aux6->collection()->associate($real);
        $aux6->year = 1824;
        $aux6->dimensions = '76.2 x 55.88 cm';
        $aux6->save();

        $aux7->title = 'Meeting at the Well';
        $aux7->genre = 'Retrato';
        $aux7->author()->associate($aut7);
        $aux7->movement = 'Realismo';
        $aux7->collection()->associate($real);
        $aux7->year = 1843;
        $aux7->dimensions = '75.5 x 62.0 cm';
        $aux7->save();

        $aux8->title = 'Peasant Children in the Field';
        $aux8->genre = 'Retrato';
        $aux8->author()->associate($aut7);
        $aux8->movement = 'Realismo';
        $aux8->collection()->associate($real);
        $aux8->year = 1876;
        $aux8->dimensions = '48.5 × 64.5 cm';
        $aux8->save();

        // $real->artworks()->saveMany($aux1, $aux2, $aux3, $aux4, $aux5, $aux6, $aux7, $aux8);

        // $m2->collection()->saveMany($real);

    }
}
