<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aut1 = new Author();
        $aut1->name('Johan Barthold Jongkind');
        $aut1->nacionality('Holandés');
        $aut1->birth_date('1819');
        $aut1->movement('Impresionismo, Realismo');
        $aut1->save();

        $aut2 = new Author();
        $aut2->name('Jacob-Abraham-Camille Pissarro');
        $aut2->nacionality('Francés');
        $aut2->birth_date('1830');
        $aut2->movement('Impresionismo, Neoimpresionismo');
        $aut2->save();

        $aut3 = new Author();
        $aut3->name('León Ferrari');
        $aut3->nacionality('Argentino');
        $aut3->birth_date('1920');
        $aut3->movement('Arte Conceptual');
        $aut3->save();  
        
        $aut4 = new Author();
        $aut4->name('Ion Bitzan');
        $aut4->nacionality('Rumano');
        $aut4->birth_date('1924');
        $aut4->movement('Arte Conceptual');
        $aut4->save(); 

        $aut4 = new Author();
        $aut4->name('Wayne Thiebaud');
        $aut4->nacionality('Americano');
        $aut4->birth_date('1920');
        $aut4->movement('Arte Pop');
        $aut4->save();      
        
        $aut5 = new Author();
        $aut5->name('Paul Brill');
        $aut5->nacionality('Flamenco');
        $aut5->birth_date('1554');
        $aut5->movement('Barroco');
        $aut5->save(); 

        $aut6 = new Author();
        $aut6->name('Caravaggio');
        $aut6->nacionality('Italiano');
        $aut6->birth_date('1571');
        $aut6->movement('Barroco');
        $aut6->save();
        
        $aut7 = new Author();
        $aut7->name('Hendrick Goltzius');
        $aut7->nacionality('Flamenco');
        $aut7->birth_date('1558');
        $aut7->movement('Manierismo, Barroco');
        $aut7->save(); 

        $aut8 = new Author();
        $aut8->name('Jean-Baptiste-Camille Corot');
        $aut8->nacionality('Francés');
        $aut8->birth_date('1796');
        $aut8->movement('Realismo');
        $aut8->save(); 

        $aut9 = new Author();
        $aut9->name('George Catlin');
        $aut9->nacionality('Americano');
        $aut9->birth_date('1796');
        $aut9->movement('Realismo');
        $aut9->save(); 

        $aut8 = new Author();
        $aut8->name('Alekséi Venetsiánov');
        $aut8->nacionality('Ruso');
        $aut8->birth_date('1780');
        $aut8->movement('Realismo');
        $aut8->save();
    }
}
