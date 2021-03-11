<?php
namespace Tests\Units;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function UserNameTest(){
        $usu = new User();
        $usu->nombre = 'Test';
        $usu->apellido1 = '';
        $usu->apellido2 = '';
        $usu->fecha_nac = '2021-01-01';
        $usu->dni = '12345678A';
        $usu->email = 'test@prueba.com';
        $usu->password = "#12341234_asdf";
        $usu->localidad = 'prueba';
        $usu->save();

        $this->assertEquals($usu->nombre, 'Test');
        $this->assertEquals($usu->email, 'test@prueba.com');
        $this->assertEquals($usu->fecha_nac, '2021-01-01');
    }
}

