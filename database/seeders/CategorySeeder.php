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
            'Italiano', 
            'Francese',
            'Cinese', 
            'Giapponese', 
            'Indiano', 
            'Messicano',
            'Argentino', 
            'Internazionale', 
            'Pesce', 
            'Carne',
            'Pizza',
            'Sushi',
            'Pasta',
            'Arabo'
        ];
        //Ciclo
        foreach($categories as $category) {
            $newCategory = new Category(); //nuova categoria
            $newCategory->name = $category; //nome della categoria
            $newCategory->save(); //invio i dati dal database
        }
    }
}
