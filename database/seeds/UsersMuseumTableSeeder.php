<?php

use Illuminate\Database\Seeder;
use App\UsersMuseum;

class UsersMuseumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $um = new UsersMuseum();
        $um->museum_id = 1;
        $um->user_id = 1;
        $um->save();

        $um = new UsersMuseum();
        $um->museum_id = 1;
        $um->user_id = 2;
        $um->save();

        $um = new UsersMuseum();
        $um->museum_id = 2;
        $um->user_id = 3;
        $um->save();
    }
}
