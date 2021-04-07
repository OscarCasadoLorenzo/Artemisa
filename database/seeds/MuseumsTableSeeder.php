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
        $m1 = new Museum();
        $m1->name = 'El Prado';
        $m1->adress = 'Calle de Ruiz de Alarcón';
        $m1->location = 'Madrid, España';
        $m1->save();

        $m2 = new Museum();
        $m2->name = 'El Louvre';
        $m2->adress = 'Rue de Rivoli';
        $m2->location = 'Paris, Francia';
        $m2->save();
    }
}
