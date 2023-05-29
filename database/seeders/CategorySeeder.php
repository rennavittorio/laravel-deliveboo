<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Categorie
        $categories = [
            [
                'name' => 'Italiano',
                'img' => 'italiano.jpg'
            ],
            [
                'name' => 'Francese',
                'img' => 'francese.jpg'
            ],
            [
                'name' => 'Cinese',
                'img' => 'cinese.jpg'
            ],
            [
                'name' => 'Giapponese',
                'img' => 'giapponese.jpg'
            ],
            [
                'name' => 'Indiano',
                'img' => 'indiano.jpg'
            ],
            [
                'name' => 'Messicano',
                'img' => 'messicano.jpg'
            ],
            [
                'name' => 'Argentino',
                'img' => 'argentina.jpg'
            ],
            [
                'name' => 'Internazionale',
                'img' => 'international.jpg'
            ],
            [
                'name' => 'Pesce',
                'img' => 'pesce.jpg'
            ],
            [
                'name' => 'Carne',
                'img' => 'carne.jpg'
            ],
            [
                'name' => 'Pizza',
                'img' => 'pizza.jpg'
            ],
            [
                'name' => 'Sushi',
                'img' => 'sushi.jpg'
            ],
            [
                'name' => 'Pasta',
                'img' => 'pasta.jpg'
            ],
            [
                'name' => 'Arabo',
                'img' => 'arab.jpg'
            ]
        ];
        //Ciclo
        foreach($categories as $category) {
            $newCategory = new Category(); //nuova categoria
            $newCategory->img = $category['img']; //nome della categoria
            $newCategory->name = $category['name']; //nome della categoria
            $newCategory->save(); //invio i dati dal database
        }
    }
}
