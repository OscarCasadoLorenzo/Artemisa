<?php

use Illuminate\Database\Seeder;
use App\Museum;

class MuseumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aux = new Museum();
        $aux->name = 'El Prado';
        $aux->adress = 'Calle de Ruiz de Alarcón';
        $aux->capacity = '438';
        $aux->codpost = '28014';
        $aux->province = 'Madrid';
        $aux->save();

        $aux = new Museum();
        $aux->name = 'El Louvre';
        $aux->adress = 'Rue de Rivoli';
        $aux->capacity = '6000';
        $aux->codpost = '75001';
        $aux->province = 'Paris';
        $aux->save();
    }
}
