<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $u1 = new User();
        $u1->name = 'Luis';
        $u1->surname1 = 'Girona';
        $u1->surname2 = 'Perez';
        $u1->birth_date = '1998-03-28';
        $u1->email = 'correo@corre.es';
        $u1->password = "#12341234_asdf";
        $u1->location = 'Alicante';
        $u1->save();

        $u2 = new User();
        $u2->name = 'Oscar';
        $u2->surname1 = 'Casado';
        $u2->surname2 = 'Lorenzo';
        $u2->birth_date = '2000-03-15';
        $u2->email = 'oscar@correo.es';
        $u2->password = "@9876543";
        $u2->location = 'Albacete';
        $u2->type = 'admin';
        $u2->save();

        $u3 = new User();
        $u3->name = 'Raul';
        $u3->surname1 = 'Ripoll';
        $u3->surname2 = 'Perez';
        $u3->birth_date = '1997-10-26';
        $u3->email = 'correo@email.es';
        $u3->password = "#12341234_asdf";
        $u3->location = 'Alicante';
        $u3->save();
        
        $u4 = new User();
        $u4->name = 'Josemi';
        $u4->surname1 = 'Carrion';
        $u4->surname2 = 'Pinedo';
        $u4->birth_date = '1999-03-24';
        $u4->email = 'asdfgh@corre.es';
        $u4->password = "#12341234_asdf";
        $u4->location = 'Alicante';
        $u4->save();
    }
}
