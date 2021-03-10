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
        
        $usu = new User();
        $usu->nombre = 'Luis';
        $usu->apellido1 = 'Girona';
        $usu->apellido2 = 'Perez';
        $usu->fecha_nac = '1998-03-28';
        $usu->dni = '12345678A';
        $usu->email = 'correo@corre.es';
        $usu->password = "#12341234_asdf";
        $usu->localidad = 'alicante';
        $usu->save();

        $usu = new User();
        $usu->nombre = 'Oscar';
        $usu->apellido1 = 'Casado';
        $usu->apellido2 = 'Lorenzo';
        $usu->fecha_nac = '2000-03-15';
        $usu->dni = '122323532A';
        $usu->email = 'oscar@correo.es';
        $usu->password = "@9876543";
        $usu->localidad = 'albacete';
        $usu->save();

        $usu = new User();
        $usu->nombre = 'Raul';
        $usu->apellido1 = 'Ripoll';
        $usu->apellido2 = 'Perez';
        $usu->fecha_nac = '1997-10-26';
        $usu->dni = '1234546478A';
        $usu->email = 'correo@email.es';
        $usu->password = "#12341234_asdf";
        $usu->localidad = 'alicante';
        $usu->save();
        
        $usu = new User();
        $usu->nombre = 'Josemi';
        $usu->apellido1 = 'Carrion';
        $usu->apellido2 = 'Pinedo';
        $usu->fecha_nac = '1999-03-24';
        $usu->dni = '1111111Z';
        $usu->email = 'asdfgh@corre.es';
        $usu->password = "#12341234_asdf";
        $usu->localidad = 'alicante';
        $usu->save();
    }
}
