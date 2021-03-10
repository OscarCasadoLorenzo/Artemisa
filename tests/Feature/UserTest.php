<?php
namespace Tests\Units;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

        $this->assertEquals($user->nombre, 'Test');
        $this->assertEquals($user->email, 'test@prueba.com');
        $this->assertEquals($user->fecha_nac, '2021-01-01');
    }
}

?>