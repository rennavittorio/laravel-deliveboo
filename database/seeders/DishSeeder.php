<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish; //model
use App\Models\Restaurant; //model
use Faker\Generator as Faker; //faker

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Piatti
        $dishes = [
            [
                'name' => 'Pizza Margherita',
                'img' => 'https://shorturl.at/cemwE',
                'description' => 'Pizza classica',
                'price' => 5.00,
                'is_visible' => 1,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Polpo con patate',
                'img' => 'https://shorturl.at/agrG0',
                'description' => 'Polpo con le patate',
                'price' => 7.00,
                'is_visible' => 1,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Nigiri al salmone',
                'img' => 'https://shorturl.at/ijCNR',
                'description' => 'Nigiri al salmone',
                'price' => 6.00,
                'is_visible' => 1,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Ramen',
                'img' => 'https://shorturl.at/rxDL4',
                'description' => 'Ramen con carne',
                'price' => 10.00,
                'is_visible' => 1,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Empanadas',
                'img' => 'https://shorturl.at/aiwWY',
                'description' => 'Empanadas di carne',
                'price' => 6.50,
                'is_visible' => 1,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Carne con patate',
                'img' => 'https://shorturl.at/dmCM7',
                'description' => 'Carne con contorno di patate',
                'price' => 12.00,
                'is_visible' => 1,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Escargot',
                'img' => 'https://shorturl.at/uwy79',
                'description' => 'Lumache',
                'price' => 4.00,
                'is_visible' => 1,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Omelette',
                'img' => 'https://shorturl.at/sLNYZ',
                'description' => 'Omelette',
                'price' => 6.50,
                'is_visible' => 1,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Gyoza',
                'img' => 'https://shorturl.at/uOSTY',
                'description' => 'Ravioli di carne',
                'price' => 4.50,
                'is_visible' => 1,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Riso alla cantonese',
                'img' => 'https://shorturl.at/hkmJT',
                'description' => 'Riso alla cantonese',
                'price' => 6,
                'is_visible' => 1,
                'restaurant_id' => 5
            ],
        ];
        //Ciclo
        foreach ($dishes as $dish) {
            $newDish = new Dish(); //nuovo piatto
            $newDish->name = $dish['name']; //nome del piatto
            $newDish->img = $dish['img']; //immagine del piatto
            $newDish->description = $dish['description']; //descrizione del piatto
            $newDish->price = $dish['price']; //prezzo del piatto
            $newDish->is_visible = $dish['is_visible']; //visibilità del piatto
            $newDish->restaurant_id = $dish['restaurant_id']; //id del ristorante
            $newDish->save(); //invio i dati al database
        }
    }
}
