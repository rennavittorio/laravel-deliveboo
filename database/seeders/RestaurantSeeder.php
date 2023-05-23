<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Ristoranti
        $restaurants = [
            [
                'name' => 'Pizzeria Catullo',
                'user_id' => 1,
                'img' => 'https://shorturl.at/suzY9',
                'slug' => Str::slug('Pizzeria Catullo' . '-' . 'Corso Moncalieri, 176, 10133 Torino TO'),
                'address' => 'Corso Moncalieri, 176, 10133 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [1, 9, 10, 11]
            ],
            [
                'name' => 'Miyo Sushi',
                'user_id' => 2,
                'img' => 'https://shorturl.at/yGHY0',
                'slug' => Str::slug('Miyo Sushi' . '-' . 'Via Paolo Sacchi, 63, 10125 Torino TO'),
                'address' => 'Via Paolo Sacchi, 63, 10125 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [4, 9, 12]
            ],
            [
                'name' => 'La Taba',
                'user_id' => 3,
                'img' => 'https://shorturl.at/ryTX6',
                'slug' => Str::slug('La Taba' . '-' . 'Via dei Quartieri, 2, 10122 Torino TO'),
                'address' => 'Via dei Quartieri, 2, 10122 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [7, 10]
            ],
            [
                'name' => 'Fondoo',
                'user_id' => 4,
                'img' => 'https://shorturl.at/mOSUV',
                'slug' => Str::slug('Fondoo' . '-' . 'Via Maria Vittoria, 11/L, 10123 Torino TO'),
                'address' => 'Via Maria Vittoria, 11/L, 10123 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [2, 10]
            ],
            [
                'name' => 'Zheng Yang',
                'user_id' => 5,
                'img' => 'https://shorturl.at/kyDRZ',
                'slug' => Str::slug('Zheng Yang' . '-' . 'Via Principi d\'Acaja, 61, 10100 Torino TO'),
                'address' => 'Via Principi d\'Acaja, 61, 10100 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [3, 9, 10]
            ]
        ];
        //Ciclo
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant(); //creo un nuovo ristorante
            $newRestaurant->name = $restaurant['name']; //nome ristorante
            $newRestaurant->img = $restaurant['img']; //immagine del ristorante
            $newRestaurant->address = $restaurant['address']; //indirizzo del ristorante
            $newRestaurant->slug = $restaurant['slug']; //slug del ristorante
            $newRestaurant->vat =  $restaurant['vat']; //partita iva del ristorante
            $newRestaurant->user_id = $restaurant['user_id']; //id dell'utente
            $newRestaurant->save(); //salvo i dati nel database
            $newRestaurant->categories()->attach($restaurant['category_ids']); //associo la categoria al ristorante
            //pivot table seeding - attach 1/2 categories to restaurant
        }
    }
}
