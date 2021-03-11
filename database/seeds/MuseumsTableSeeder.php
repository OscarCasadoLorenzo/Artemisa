<?php

use Illuminate\Database\Seeder;

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
        $aux->capacity = '438';
        $aux->codpost = '11660';
        $aux->province = 'Madrid';
        $aux->save();

        $aux = new Museum();
        $aux->name = 'El Louvre';
        $aux->capacity = '6000';
        $aux->codpost = '75001';
        $aux->province = 'Paris';
        $aux->save();


    }
}
