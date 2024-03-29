<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Museum;
use App\User;

class UserMuseum extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $usu = new User();
        $usu->nombre = 'relacion';
        $usu->apellido1 = 'test';
        $usu->apellido2 = 'test';
        $usu->fecha_nac = '2021-01-01';
        $usu->dni = '12345678A';
        $usu->email = 'prueba@relacion.com';
        $usu->password = "#12341234_asdf";
        $usu->localidad = 'prueba'; 
        $usu->save();

        $museo = new Museum();
        $museo->name = 'Museo de Rojales';
        $museo->capacity = '30';
        $museo->address = 'Plaza de España';
        $museo->codpost = '03170';
        $museo->province = 'Alicante';
        $museo->save();

        $museo->users()->save($usu);

        $this->assertEquals($museo->users[0]->nombre, $usu->nombre);
        $this->assertEquals($usu->museums[0]->name, $museo->name);

        $museo->delete();
        $usu->delete();        
    }
}
