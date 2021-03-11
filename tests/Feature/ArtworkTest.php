<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Artwork;
class ArtworkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function artworkBasicTest()
    {
        $aux = new Artwork();

        $aux->id = 23;
        $aux->title = 'La noche estrellada';
        $aux->author = 'Vincent Van Gogh';
        $aux->year = 1889;
        $aux->save();

        $this->assertEquals($aux->id, 23);
        $this->assertEquals($aux->title, 'La noche estrellada');
        $this->assertEquals($aux->author, 'Vincent Van Gogh');
        $this->assertEquals($aux->year, 1889);

    }
}
