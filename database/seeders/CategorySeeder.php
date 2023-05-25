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
                'image' => 'public/storage/food-categories/italiano.jpg'
            ],
            [
                'name' => 'Francese',
                'image' => 'public/storage/food-categories/francese.jpg'
            ],
            [
                'name' => 'Cinese',
                'image' => 'public/storage/food-categories/cinese.jpg'
            ],
            [
                'name' => 'Giapponese',
                'image' => 'public/storage/food-categories/giapponese.jpg'
            ],
            [
                'name' => 'Indiano',
                'image' => 'public/storage/food-categories/indiano.jpg'
            ],
            [
                'name' => 'Messicano',
                'image' => 'public/storage/food-categories/messicano.jpg'
            ],
            [
                'name' => 'Argentino',
                'image' => 'public/storage/food-categories/argentina.jpg'
            ],
            [
                'name' => 'Internazionale',
                'image' => 'public/storage/food-categories/internazionale.jpg'
            ],
            [
                'name' => 'Pesce',
                'image' => 'public/storage/food-categories/pesce.jpg'
            ],
            [
                'name' => 'Carne',
                'image' => 'public/storage/food-categories/carne.jpg'
            ],
            [
                'name' => 'Pizza',
                'image' => 'public/storage/food-categories/pizza.jpg'
            ],
            [
                'name' => 'Sushi',
                'image' => 'public/storage/food-categories/sushi.jpg'
            ]
        ];
        //Ciclo
        foreach($categories as $category) {
            $newCategory = new Category(); //nuova categoria
            $newCategory->name = $category; //nome della categoria
            $newCategory->save(); //invio i dati dal database
        }
    }
}
