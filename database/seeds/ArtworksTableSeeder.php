<?php

use Illuminate\Database\Seeder;
use App\Artwork;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aux = new Artwork();
        $aux->title = 'La noche estrellada';
        $aux->author = 'Vincent Van Gogh';
        $aux->year = 1889;
        $aux->museum_id = 1;
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'El beso';
        $aux->author = 'Gustav Klimt';
        $aux->year = 1908;
        $aux->museum_id = 1;
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'Guernica';
        $aux->author = 'Pablo Picasso';
        $aux->year = 1937;
        $aux->museum_id = 1;
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'Las meninas';
        $aux->author = 'Diego Velazquez';
        $aux->year = 1656;
        $aux->museum_id = 1;
        $aux->save();

        $aux = new Artwork();
        $aux->title = 'La joven de la perla';
        $aux->author = 'Johannes Vermeer';
        $aux->year = 1665;
        $aux->museum_id = 1;
        $aux->save();

    }
}
